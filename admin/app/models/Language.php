<?php
	class Language {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getLanguages($language_id = 1){
			$this->db->query('SELECT * FROM languages');
			$this->db->bind(':language_id', $language_id);

			return $this->db->resultSet();
		}

		public function getLanguageById($language_id){
			$this->db->query('SELECT * FROM languages WHERE id=:language_id');
			$this->db->bind(':language_id', $language_id);

			return $row = $this->db->single();;
		}

	}
