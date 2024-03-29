<?php 
	class User {
		private $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function isValidAdminPass($password){
			$this->db->query('SELECT * FROM admin WHERE id=:id');
			$this->db->bind(':id', 1);

			$row = $this->db->single();
			$adminHash =  $row->pass;

			if(password_verify($password, $adminHash)){
				return true;
			}else {
				return false;
			}
		}


		// Register user
		public function register($data){
			$this->db->query('INSERT INTO users (name, email, password, users_roles_id) VALUES (:name, :email, :password, :role)');
			// Bind values
			$this->db->bind(':name', $data['name']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':role', 2);

			// Execute
			if($this->db->execute()){
				return true;
			}else {
				return false;
			}
		}

		// Login User
		public function login($email, $password){
			$this->db->query('SELECT * FROM users WHERE email = :email');
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			$hashed_password = $row->password;
			if(password_verify($password, $hashed_password)){
				return $row;	
			}else {
				return false;
			}
		}

		// Find user by email
		public function findUserByEmail($email){
			$this->db->query('SELECT * FROM users WHERE email= :email');
			// Bind value
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0){
				return true;
			}else {
				return false;
			}

		}
	}
