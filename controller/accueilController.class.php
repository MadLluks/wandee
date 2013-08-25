<?php
namespace controller;

class accueilController extends \Library\backcontroller
{  
	public function executeIndex() {
		var_dump('i');
		$this->page->addVar('test', 'index');
		$this->page->setContentFile(__DIR__.'/../view/coverView.php');
	}
	public function executeShow() {
		$this->page->addVar('accueil', 'id="active"');
		$this->page->addVar('test', 'show');
		$this->page->setContentFile(__DIR__.'/../view/accueilView.php');
	}
}

?>