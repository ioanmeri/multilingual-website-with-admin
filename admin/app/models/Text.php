<?php
	class Text {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getTexts($lang_id = 1){
			$this->db->query('SELECT * FROM texts a
							  INNER JOIN texts_desc b ON
							  a.id=b.text_id
							  WHERE b.lang_id =:lang_id
							');

			$this->db->bind(':lang_id', $lang_id);

			return $this->db->resultSet();
		}
	}
