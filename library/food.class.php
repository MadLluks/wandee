<?php
namespace Library;

class Food {
	protected $id;
	protected $name;
	protected $type;
	protected $price1;
	protected $price2;
	protected $price3;
	protected $imageLink;
	protected $description;

	public function __construct ($valeurs = array()) {
		if(!empty($valeurs)) {
			$this->hydrate($valeurs);
		}
	}

	public function hydrate ($donnees) {
		foreach ($donnees as $attribut => $valeur) {
			$methode = 'set' . ucfirst($attribut);

			if ( is_callable($methode) ) {
				$this->$methode($valeur);
			}
		}
	}

	//SETTERS
	public function setId ($valeur) {
		$this->id = (int)$valeur;
	}

	public function setName ($valeur) {
		if ( !is_string($valeur) || empty($valeur) ) {
			$this->name = "No_Name";
		}
		else {
			$this->name = $valeur;
		}
	}

	public function setPrice1 ($valeur) {
		$this->price1 = (float) $valeur;
	}

	public function setPrice2 ($valeur) {
		$this->price2 = (float) $valeur;
	}

	public function setPrice3 ($valeur) {
		$this->price3 = (float) $valeur;
	}

	public function setImageLink ($valeur) {
		$this->imageLink = $valeur;
	}

	public function setDescription($valeur) {
		$this->description = $valeur;
	}

	//GETTERS
	public function getId () {
		return $this->id;
	}

	public function getName () {
		return $this->name;
	}

	public function getType () {
		return $this->type;
	}

	public function getPrice1 () {
		return $this->price1;
	}

	public function getPrice2 () {
		return $this->price2;
	}

	public function getPrice3 () {
		return $this->price3;
	}

	public function getImageLink () {
		return $this->imageLink;
	}

	public function getDescription () {
		return $this->description;
	}
}

?>