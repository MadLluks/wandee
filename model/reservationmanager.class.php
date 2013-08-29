<?php
namespace model;

class ReservationManager {

	protected $db;

	public function __construct (\PDO $db) {
		$this->db = $db;
	}

	public function addReservation (Reservation $new) {
		$requete = $this->db->prepare('INSERT INTO reservation (name, surname, email, number, date, moment) 
			VALUES (:name, :surname, :email, :number, :date, :moment)');

		$name = $new->getName();
		$surname = $new->getSurname();
		$email = $new->getEmail();
		$number = $new->getNumber();
		$date = $new->getDate();
		$moment = $new->getMoment();
		$requete->bindValue(':name', $name);
		$requete->bindValue(':surname', $surname);
		$requete->bindValue(':email', $email);
		$requete->bindValue(':number', $number);
		$requete->bindValue(':date', $date);
		$requete->bindValue(':moment', $moment);
		$requete->execute();
	}

	public function getId() {
		$requete = $this->db->prepare('SELECT MAX(id) as id FROM reservation');
		$requete->execute();
		$res = $requete->fetch();
		return $res['id'];
	}

	/*public function removeFood ($id) {

	}

	public function updateFood (Food $new) {

	}
*/
	/*public function getList ($type) {
		return $this->{$type.'List'};*/
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

/*	}

	public function getUnique ($id) {
		$requete = $this->db->prepare('SELECT * FROM plat WHERE id=:id');

		$requete->bindValue(':id', $id);
		$requete->execute();

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , '\Library\Food');

		return $requete->fetch ();
	}*/
}

?>