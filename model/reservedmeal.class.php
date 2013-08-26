<?php
namespace model;

class ReservedMeal {
	protected $idReservation;
	protected $idPlat;
	protected $quantity;

	public function __construct ($idReservation, $idPlat, $quantity) {
		$this->idReservation = $idReservation;
		$this->idPlat = $idPlat;
		$this->quantity = $quantity;
	}

	//SETTERS
	public function setIdReservation ($valeur) {
		$this->idReservation = (int)$valeur;
	}

	public function setIdPlat ($valeur) {
		$this->idPlat = (int)$valeur;
	}

	public function setQuantity ($valeur) {
		$this->quantity = (int)$valeur;
	}

	//GETTERS
	public function getIdReservation () {
		return $this->idReservation;
	}

	public function getIdPlat () {
		return $this->idPlat;
	}

	public function getQuantity () {
		return $this->quantity;
	}
}

?>