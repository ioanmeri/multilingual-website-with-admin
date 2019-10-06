<?php
	class Language {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getLanguages(){
			$this->db->query('SELECT * FROM languages ORDER BY sort_order');

			return $this->db->resultSet();
		}

		public function getActiveLanguages(){
			$this->db->query('SELECT * FROM languages WHERE active =1 ORDER BY sort_order');

			return $this->db->resultSet();
		}

		public function getLanguageById($language_id){
			$this->db->query('SELECT * FROM languages WHERE id=:language_id');
			$this->db->bind(':language_id', $language_id);

			return $row = $this->db->single();;
		}

		public function updateLanguage($data){
			$sql = 'UPDATE languages SET code =:code, active = :active, sort_order = :sort_order, title =:title WHERE id = :language_id ';
			$this->db->query($sql);

			$this->db->bind(':code', $data['language']->code);
			$this->db->bind(':active', $data['language']->active);
			$this->db->bind(':sort_order', $data['language']->sort_order);
			$this->db->bind(':title', $data['language']->title);
			$this->db->bind(':language_id', $data['language']->id);

			$this->db->execute();

			return true;
		}

	}
