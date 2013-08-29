<?php
namespace model;

class ReservationSurPlace {
	protected $id;
	protected $name;
	protected $number;
	protected $date;
	protected $moment;
	protected $nb;

	public function __construct ($name, $number, $date, $moment, $nb) {
		$this->name = $name;
		$this->number = $number;
		$this->date = $date;
		$this->moment = $moment;
		$this->nb = $nb;
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

	public function setNb ($valeur) {
		$this->nb = (int)($valeur);
	}

	public function setNumber ($valeur) {
		$this->number = htmlentities($valeur);
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

	public function getNb () {
		return $this->nb;
	}

	public function getNumber () {
		return $this->number;
	}

	public function getDate () {
		return $this->date;
	}

	public function getMoment () {
		return $this->moment;
	}
}

?>