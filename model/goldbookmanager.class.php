<?php
namespace model;

class GoldBookManager {

	protected $db;

	public function __construct (\PDO $db) {
		$this->db = $db;
	}

	public function add (GoldBook $new) {
		$requete = $this->db->prepare('INSERT INTO goldbook (message, note) 
			VALUES (:message, :note)');

		$message = $new->getMessage();
		$note = $new->getNote();
		$requete->bindValue(':message', $message);
		$requete->bindValue(':note', $note);
		$requete->execute();
	}

	public function getAll() {
		$requete = $this->db->prepare('SELECT * FROM goldbook order by date desc');
		$requete->execute();
		return $requete->fetchAll(\PDO::FETCH_ASSOC);
	}

}

?>