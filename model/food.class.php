<?php
namespace model;

class Food {
	protected $id;
	protected $name;
	protected $type;
	protected $price;
	protected $imageLink;

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

	public function setPrice ($valeur) {
		$this->price = (float) $valeur;
	}

	public function setImageLink ($valeur) {
		$this->imageLink = $valeur;
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

	public function getPrice () {
		return $this->price;
	}

	public function getImageLink () {
		return $this->imageLink;
	}
}

?>