<?php
namespace controller;

class menuController extends \Library\backcontroller
{  
  public function executeShow() {
  	$this->page->addVar('carte', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }

   public function executeShowEntrees() {
  	$this->page->addVar('carte', 'id="active"');
  	$this->page->addVar('entrees', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }

   public function executeShowPlats() {
  	$this->page->addVar('carte', 'id="active"');
  	$this->page->addVar('plats', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }

   public function executeShowDesserts() {
  	$this->page->addVar('carte', 'id="active"');
  	$this->page->addVar('desserts', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }

   public function executeShowBoissons() {
  	$this->page->addVar('carte', 'id="active"');
  	$this->page->addVar('boissons', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }

}

?>