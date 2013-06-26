<?php

/**
* 
*/
class Registery
{
	
	private $vars = array();

	function __construct(argument)
	{
		# code...
	}


	public function __set($index, $value){
		$this->vars[$index] = value;
	}

	public function __get($index){
		return $this->vars[$index];
	}
}

?>