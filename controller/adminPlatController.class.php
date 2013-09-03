<?php
namespace controller;

class adminPlatController extends \Library\backcontroller
{  
	public function executeShow() {
		$db = new \Library\DB;
		$manager = new \model\FoodManager($db->getInstance());

		$list = $manager->getAll();
		$this->page->addVar('list', $list);
		$this->page->setContentFile(__DIR__.'/../view/adminPlatView.php');
	}

	public function executeGetInfo() {
		$id = $_POST['id'];
		$db = new \Library\DB;
		$manager = new \model\FoodManager($db->getInstance());
		$data['info'] = $manager->getById($id);
		header('Content-Type: application/json', true);
		echo json_encode($data);
	}
	public function executeAdd() {
		var_dump($_POST);
		/* 'name' => string 'n' (length=1)
  'type' => string 'entree' (length=6)
  'description' => string 'desc' (length=4)
  'price' => string '1.3' (length=3)
  'spice' => string '5' (length=1)
  'envoyer' => string 'Envoyer' (length=7)*/
  if(isset($_FILES['file'])) { 
  	$dossier = 'images/';
  	$fichier = basename($_FILES['file']['name']);
  	if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier)) {
  		echo 'Upload effectué avec succès !';
  	} else {
  		echo 'Echec de l\'upload !';
  	}
  }
  $this->page->setContentFile(__DIR__.'/../view/adminPlatView.php');
}

public function executeModify() {
	echo "modifier";
	$this->page->setContentFile(__DIR__.'/../view/adminPlatView.php');
}

public function executeDelete() {
	echo "supprimer";
	$this->page->setContentFile(__DIR__.'/../view/adminPlatView.php');
}
}

?>