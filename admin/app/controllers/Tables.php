<?php
	class Tables extends Controller {
		public function __construct(){
			$this->tableModel = $this->model('Table');
		}

		public function index(){
			// $posts = $this->postModel->getPosts();
			$data = [
			];

			$this->view('tables/index', $data);
		}

		public function show(){

		}

		public function add(){
			$data = [
				'prefix' => '',
				'prefix_err' => ''
			];

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



				$data['prefix'] = trim($_POST['prefix']);



				if(empty($data['prefix'])){
					$data['prefix_err'] = 'Table Prefix cannot be empty';
				}

				
				if(empty($data['prefix_err'])){
					die('success');
					if($this->model->addTable($data)){

					}else{
						die('Something went wrong');
					}
				}else {
					$this->view('tables/add', $data);
				}

			}else {
				$this->view('tables/add', $data);
			}
		}
	}
