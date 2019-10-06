<?php
	class Text {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function getTexts($lang_id = 1){
			$this->db->query('SELECT *, a.id as textId 
							  FROM texts a
							  INNER JOIN texts_desc b ON
							  a.id=b.texts_id
							  WHERE b.lang_id =:lang_id
							');

			$this->db->bind(':lang_id', $lang_id);

			return $this->db->resultSet();
		}

		public function getTextById($id){
			$this->db->query('SELECT a.*, b.* FROM texts a
							  INNER JOIN texts_desc b ON
							  a.id=b.texts_id
							  INNER JOIN languages c ON
							  c.id=b.lang_id
							  WHERE a.id =:id
							  ORDER BY c.sort_order
							');

			$this->db->bind(':id', $id);

			return $this->db->resultSet();
		}

		public function addText($data){
			try {
			    // From this point and until the transaction is being committed every change to the database can be reverted
			    $this->db->beginTransaction();    
			    $this->db->query('INSERT INTO texts () VALUES ()');
			    // $this->db->bind(':image', '');
			    $this->db->execute();
			    
			    // Get the generated `texts_id`
			    $textId = $this->db->getLastInsertId();

			    // Construct the query for inserting the products of the order
			    $textDescQuery = 'INSERT INTO texts_desc (texts_id, lang_id, title, body) VALUES';

			    $count = 0;
			    foreach ($data['title'] as $langId => $title){
			        $textDescQuery .= ' (:texts_id' . $count . ', :lang_id' . $count . ', :title' . $count . ', :body'.$count.'),';    
			        ++$count;
			    }

			    $textDescQuery = substr($textDescQuery, 0, -1) . ';';
			    $this->db->query($textDescQuery);

			    //bind
			    $c = 0;
			     foreach ($data['title'] as $langId => $title){
			    	$this->db->bind(':texts_id'.$c, (int)$textId);
			    	$this->db->bind(':lang_id'.$c, (int)$langId);
			    	$this->db->bind(':title'.$c, (string)$title);
			    	$this->db->bind(':body'.$c, (string)$data['body'][$langId]);
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

		public function updateText($data){
			try {
				$this->db->beginTransaction();    

			    $sql = 'UPDATE texts_desc SET title =:title, body = :body WHERE lang_id = :lang_id AND texts_id = :texts_id';
			    $this->db->query($sql);

			    // Loop and execute
			    foreach ($data['title'] as $langId => $title){
			    	$this->db->bind(':title', $title);
			    	$this->db->bind(':body', $data['body'][$langId]);
			    	$this->db->bind(':lang_id', $langId);
			    	$this->db->bind(':texts_id', $data['id']);
			    	$this->db->execute();
			    }
			   // Commit Transaction
			    $this->db->commitTransaction();

			    return true;

			} catch (PDOException $e) {

			    // Rollback Transaction
			    $this->db->rollbackTransaction();

			    // make sense of an exception thrown
			    throw $e;

			    die();

			}
		}

		public function deleteText($id){
			$this->db->query('DELETE FROM texts WHERE id = :id');
			// Bind values
			$this->db->bind(':id', $id);

			// Execute
			if($this->db->execute()){
				return true;
			}else {
				return false;
			}	
		}
	}
