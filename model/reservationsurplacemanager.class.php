<?php
namespace model;

class ReservationSurPlaceManager {

	protected $db;

	public function __construct (\PDO $db) {
		$this->db = $db;
	}

	public function addReservation (ReservationSurPlace $new) {
		$requete = $this->db->prepare('INSERT INTO reservationsurplace (name, number, date, moment, nb) 
			VALUES (:name, :number, :date, :moment, :nb)');

		$name = $new->getName();
		$nb = $new->getNb();
		$number = $new->getNumber();
		$date = $new->getDate();
		$moment = $new->getMoment();
		$requete->bindValue(':name', $name);
		$requete->bindValue(':nb', $nb);
		$requete->bindValue(':number', $number);
		$requete->bindValue(':date', $date);
		$requete->bindValue(':moment', $moment);
		$requete->execute();
	}

}

?>