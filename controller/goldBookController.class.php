<?php
namespace controller;

class goldBookController extends \Library\backcontroller
{  
  public function executeShow() {
  	$this->page->addVar('livre', 'id="active"');
    $this->page->addVar('test', 'show');
    $this->page->setContentFile(__DIR__.'/../view/goldBookView.php');
  }
}

?>