<?php
namespace Library;

class DB {
	protected $db;

	public function __construct () {
		try {
			$this->db = new \PDO('mysql:host=127.0.0.1;dbname=wandee', 'root', '');
		}
		catch (PDOException $e) {
			echo 'Connexion échouée : ' . $e->getMessage();
		}
	}

	public function getInstance() {
		return $this->db;
	}


}

?>