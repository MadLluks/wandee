<?php
namespace controller;

class contactController extends \Library\backcontroller
{  
  public function executeShow()
  {
  	$this->page->addVar('contact', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/contactView.php');
  }
}

?>