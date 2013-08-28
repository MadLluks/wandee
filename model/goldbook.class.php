<?php
namespace model;

class GoldBook {
	protected $id;
	protected $message;
	protected $note;

	public function __construct ($message, $note) {
		$this->message = $message;
		$this->note = $note;
	}

	//SETTERS
	public function setMessage ($valeur) {
		$this->message = $valeur;
	}

	public function setNote ($valeur) {
		$this->note = (int)$valeur;
	}

	//GETTERS
	public function getMessage () {
		return $this->message;
	}

	public function getNote () {
		return $this->note;
	}

	public function getId () {
		return $this->id;
	}
}

?>