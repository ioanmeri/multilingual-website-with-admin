<?php
	class Tables extends Controller {
		public function __construct(){
			// $this->postModel = $this->model('Post');
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

			if($_SERVER['REQUEST_METHOD'] == 'POST'){

			}else {
				$this->view('tables/add');
			}
		}
	}
