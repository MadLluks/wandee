<?php
namespace controller;

class reservationController extends \Library\backcontroller
{  
  public function executeShow() {
  	$this->page->addVar('reservation', 'id="active"');
    $this->page->addVar('test', 'show');

    $db = new \Library\DB;
    $manager = new \model\FoodManager($db->getInstance());

    $list['Entrées'] = $manager->getList('entrees');
    $list['Plats'] = $manager->getList('plats');
    $list['Desserts'] = $manager->getList('desserts');
    $list['Boissons'] = $manager->getList('boissons');

    $this->page->addVar('list', $list);
    /*$this->page->addVar('listPlats', $listPlats);
    $this->page->addVar('listDesserts', $listDesserts);
    $this->page->addVar('listBoissons', $listBoissons);*/

    $this->page->setContentFile(__DIR__.'/../view/reservationView.php');
  }

  public function executeReserver() {
    $this->page->addVar('reservation', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->addVar('recapitulatif', 'true');
    
    $this->page->setContentFile(__DIR__.'/../view/reservationView.php');
  }
}

?>