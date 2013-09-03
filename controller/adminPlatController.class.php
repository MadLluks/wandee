<?php
namespace controller;

class adminPlatController extends \Library\backcontroller
{  
	public function executeShow() {
		//$this->page->addVar('accueil', 'id="active"');
		//$this->page->addVar('test', 'show');
		$this->page->setContentFile(__DIR__.'/../view/adminPlatView.php');
	}
}

?>