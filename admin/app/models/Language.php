<?php
	class Language {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getLanguages(){
			$this->db->query('SELECT * FROM languages ORDER BY native  DESC');

			return $this->db->resultSet();
		}
	}
