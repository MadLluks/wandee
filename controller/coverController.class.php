<?php
namespace controller;

class coverController extends \Library\backcontroller
{  
	public function executeIndex() {
		$this->page = new  \Library\Page($this->app);
		$this->page->setLayout('coverLayout');

		$dom = new \DomDocument();
		$dom->load(__DIR__ . '/../config/text.xml');

		$nodes = $dom->getElementsByTagName( "cover" );  

		$coverText = $nodes->item(0)->nodeValue;

		$this->page->addVar('text', $coverText);
		
		$this->page->setContentFile(__DIR__.'/../view/coverView.php');
	}
}
?>