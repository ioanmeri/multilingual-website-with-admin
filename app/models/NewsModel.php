<?php
	class NewsModel {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getNews(){
			$sql = "
				SELECT * FROM news n
				INNER JOIN news_desc nd ON
				n.id=nd.news_id
				WHERE nd.lang_id = '" .LANG_ID. "'
			";

			$this->db->query($sql);

			return $this->db->resultSet();
		}
	}
