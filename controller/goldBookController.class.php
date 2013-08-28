<?php
namespace controller;

class goldBookController extends \Library\backcontroller
{  
  public function executeShow() {
  	$this->page->addVar('livre', 'id="active"');
    $this->page->addVar('test', 'show');

    $db = new \Library\DB;
    $manager = new \model\GoldBookManager($db->getInstance());
    $list = $manager->getAll();
    $this->page->addVar('list', $list);

    $this->page->setContentFile(__DIR__.'/../view/goldBookView.php');
  }

  public function executeAjouter() {
    if (! (isset($_POST['note']) || isset($_POST['message']))) {
      $this->executeShow();
      return;
    }
    if (!isset($_POST['note'])) {
      $error['note'] = "Veuillez saisir une note.";
    }
    if (isset($_POST['message']) && trim($_POST['message']) == "") {
      $error['message'] = "Vous ne pouvez pas soumettre un commentaire vide.";
    }
    if (isset($error)) {
      $this->page->addVar('error', $error);
      $this->executeShow();
      return;
    }
    $db = new \Library\DB;
    $manager = new \model\GoldBookManager($db->getInstance());
    $comment = new \model\GoldBook($_POST['message'], $_POST['note']);
    $manager->add($comment);
    $this->page->addVar('confirmation', 'Votre commentaire a bien été enregistré.');
    $this->executeShow();
  }
}

?>