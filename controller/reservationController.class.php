<?php
namespace controller;

class reservationController extends \Library\backcontroller
{  
  public function executeShow() {
  	$this->page->addVar('reservation', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/reservationView.php');
  }
}

?>