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
			SET nom=:nom, type=:type, description=:description, price=:price, imageLink=:imageLink');

		$requete->bindValue(':nom', $new->getNom());
		$requete->bindValue(':type', $new->getType());
		$requete->bindValue(':description', $new->getDescription());
		$requete->bindValue(':price', $new->getPrice());
		$requete->bindValue(':imageLink', $new->getImageLink());
	}

	public function removeFood ($id) {

	}

	public function updateFood (Food $new) {

	}

	public function getAll() {
		$requete = $this->db->prepare('SELECT * FROM plat');
		$requete->execute();
		return $requete->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getById($id) {
		$requete = $this->db->prepare('SELECT * FROM plat WHERE id=:id');

		$requete->bindValue(':id', $id);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');
		return $requete->fetch();
	}
	
	public function getList ($type) {
		return $this->{$type.'List'};
		/*$list = $this->{$type.'List'};

		$phpImage = '<ul class=\'carroussel\' id=\'imageLink\'>';
		$phpTitre = '<ul class=\'carroussel\' id=\'titre\'>';
		$phpPrice1 = '<ul class=\'carroussel\' id=\'price1\'>';
		$phpPrice2 = '<ul class=\'carroussel\' id=\'price2\'>';
		$phpPrice3 = '<ul class=\'carroussel\' id=\'price3\'>';
		$phpDescription = '<ul class=\'carroussel\' id=\'desc\'>';

		foreach ($list as $value) {
			$phpImage .= '<li><img id=\''.$value->getId().'\' src=\'/wandee/images/'.$value->getImageLink().'\'/ ></li>';
			$phpTitre .= '<li>'.$value->getName().'</li>';
			$phpPrice1 .= '<li>'.$value->getPrice1().'</li>';
			$phpPrice2 .= '<li>'.$value->getPrice2().'</li>';
			$phpPrice3 .= '<li>'.$value->getPrice3().'</li>';
			$phpDescription .= '<li>'.$value->getDescription().'</li>';
		}

		$phpImage .= '</ul>';
		$phpTitre .= '</ul>';
		$phpPrice1 .= '</ul>';
		$phpPrice2 .= '</ul>';
		$phpPrice3 .= '</ul>';		
		$phpDescription .= '</ul>';

		return $phpImage . $phpTitre . $phpPrice1 . $phpPrice2 . $phpPrice3 . $phpDescription;*/

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