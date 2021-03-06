<?php
namespace model;

class Reservation {
	protected $id;
	protected $name;
	protected $surname;
	protected $number;
	protected $email;
	protected $date;
	protected $moment;

	public function __construct ($name, $surname, $number, $email, $date, $moment) {
		$this->name = $name;
		$this->surname = $surname;
		$this->number = $number;
		$this->email = $email;
		$this->date = $date;
		$this->moment = $moment;
		/*if(!empty($valeurs)) {
			$this->hydrate($valeurs);
		}*/
	}
/*
	public function hydrate ($donnees) {
		foreach ($donnees as $attribut => $valeur) {
			$methode = 'set' . ucfirst($attribut);

			if ( is_callable($methode) ) {
				$this->$methode($valeur);
			}
		}
	}*/

	//SETTERS
	public function setId ($valeur) {
		$this->id = (int)$valeur;
	}

	public function setName ($valeur) {
		$this->name = htmlentities($valeur);
	}

	public function setSurname ($valeur) {
		$this->surname = htmlentities($valeur);
	}

	public function setNumber ($valeur) {
		$this->number = htmlentities($valeur);
	}

	public function setEmail ($valeur) {
		$this->email = htmlentities($valeur);
	}

	public function setDate ($valeur) {
		$this->date = htmlentities($valeur);
	}

	public function setMoment ($valeur) {
		$this->moment = $valeur;
	}

	//GETTERS
	public function getId () {
		return $this->id;
	}

	public function getName () {
		return $this->name;
	}

	public function getSurname () {
		return $this->surname;
	}

	public function getNumber () {
		return $this->number;
	}

	public function getEmail () {
		return $this->email;
	}

	public function getDate () {
		return $this->date;
	}

	public function getMoment () {
		return $this->moment;
	}
}

?>