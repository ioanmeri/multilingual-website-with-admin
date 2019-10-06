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


		public function addLanguage($data){
			try {
				$this->db->beginTransaction();

				// insert language and get inserted id
				$this->db->query('INSERT INTO languages (code, active, sort_order, title) VALUES (:code, :active, :sort_order, :title)');
				$this->db->bind(':code', $data['code']);
				$this->db->bind(':active', $data['active']);
				$this->db->bind(':sort_order', $data['sort_order']);
				$this->db->bind(':title', $data['title']);
				$this->db->execute();

				$languageId = $this->db->getLastInsertId();

				$this->db->query('SELECT title FROM ml_tables');
				$data_ml_tables = $this->db->resultSet();

				// for each id in multilingual base table e.g (each id in text)
				// add a row in text_desc with values ($language_id, $texts_id)
				foreach ($data_ml_tables as $table_name) {
					$this->db->query("SELECT id FROM $table_name->title");
					$table = $this->db->resultSet();

					foreach ($table as $row) {
						$table_desc = $table_name->title.'_desc';
						$table_id = $table_name->title.'_id';

						$this->db->query("INSERT INTO $table_desc (lang_id, $table_id) VALUES (:language_id, :table_id)");
						$this->db->bind(':language_id', $languageId);
						$this->db->bind(':table_id', $row->id);
						$this->db->execute();
					}
				}

 				$this->db->commitTransaction();
			  return true;
			}catch ( PDOException $e ) { 
			    $this->db->rollbackTransaction();
			    throw $e;
			    return false;
			}
		}

	}
