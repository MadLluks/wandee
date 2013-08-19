<?php
namespace model;

class FoodManager {

	protected $db;
	protected $entreesList;
	protected $platsList;
	protected $dessertsList;
	protected $boissonsList;

	public function __construct (\PDO $db) {
		$this->db = $db;

		$requete = $this->db->prepare('SELECT * FROM plat WHERE type=:type');

		$requete->bindValue(':type', 'entree');
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');
		$this->entreesList = $requete->fetchAll();
		

		$requete->bindValue(':type', 'plat');
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');
		$this->platsList = $requete->fetchAll();

		$requete->bindValue(':type', 'dessert');
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');
		$this->dessertsList = $requete->fetchAll();

		$requete->bindValue(':type', 'boisson');
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');
		$this->boissonsList = $requete->fetchAll();
}

	public function addFood (Food $new) {
		$requete = $this->db->prepare('INSERT INTO plat 
			SET nom=:nom, type=:type, description=:description, price1=:price1, price2=:price2, price3=:price3, imageLink=:imageLink');

		$requete->bindValue(':nom', $new->getNom());
		$requete->bindValue(':type', $new->getType());
		$requete->bindValue(':description', $new->getDescription());
		$requete->bindValue(':price1', $new->getPrice1());
		$requete->bindValue(':price2', $new->getPrice2());
		$requete->bindValue(':price3', $new->getPrice3());
		$requete->bindValue(':imageLink', $new->getImageLink());
	}

	public function removeFood ($id) {

	}

	public function updateFood (Food $new) {

	}

	public function getList ($type) {
		return $this->{$type.'List'};
	}

	public function getUnique ($id) {
		$requete = $this->db->prepare('SELECT * FROM plat WHERE id=:id');

		$requete->bindValue(':id', $id);
		$requete->execute();

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');

		return $requete->fetch ();
	}
}

?>