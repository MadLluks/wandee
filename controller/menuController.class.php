<?php
namespace controller;

class menuController extends \Library\backcontroller
{  
  public function executeShow() {
  	$this->page->addVar('carte', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/menuView.php');
  }
}

?>