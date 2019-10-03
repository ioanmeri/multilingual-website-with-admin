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

		public function addText($data){
			try {
			    // From this point and until the transaction is being committed every change to the database can be reverted
			    $this->db->beginTransaction();    
			    $this->db->query('INSERT INTO texts () VALUES ()');
			    // $this->db->bind(':image', '');
			    $this->db->execute();
			    
			    // Get the generated `text_id`
			    $textId = $this->db->getLastInsertId();

			    // Construct the query for inserting the products of the order
			    $textDescQuery = 'INSERT INTO texts_desc (text_id, lang_id, title, body) VALUES';

			    $count = 0;
			    foreach ($data['languages'] as $productId => $language ) {
			        $textDescQuery .= ' (:text_id' . $count . ', :lang_id' . $count . ', :title' . $count . ', :body'.$count.'),';    
			        ++$count;
			    }

			    $textDescQuery = substr($textDescQuery, 0, -1) . ';';
			    $this->db->query($textDescQuery);

			    //bind
			    $c = 0;
			    foreach ($data['languages'] as $productId => $language ) {
			    	$this->db->bind(':text_id'.$c, (int)$textId);
			    	$this->db->bind(':lang_id'.$c, (int)$language->id);
			    	$this->db->bind(':title'.$c, (string)$data['title'][$language->code]);
			    	$this->db->bind(':body'.$c, (string)$data['body'][$language->code]);
			    	++$c;
			    }

			    $this->db->execute();
			    
			    // Make the changes to the database permanent
			    $this->db->commitTransaction();
			    return true;
			}
			catch ( PDOException $e ) { 
			    // Failed to insert the order into the database so we rollback any changes
			    $this->db->rollbackTransaction();
			    throw $e;
			    return false;
			}
		}
	}
