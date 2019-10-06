<?php
	class Languages extends Controller {
		public function __construct(){
			$this->languageModel = $this->model('Language');
		}

		public function index(){
			$languages = $this->languageModel->getLanguages();

			$data = [
				'languages' => $languages
			];

			$this->view('languages/index', $data);
		}

		public function show($id){
			$language = $this->languageModel->getLanguageById($id);
			$data = [
				'language' => $language
			];

			$this->view('languages/show', $data);
		}


		public function edit($id){
			$language = $this->languageModel->getLanguageById($id);

			$data = [
				'language' => $language,
				'title_err' => '',
				'code_err' => '',
				'sort_order_err' => '',
			];


			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Sanitize POST array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data['language']->title =  trim($_POST['title']);
				$data['language']->code =  trim($_POST['code']);
			

				if(empty($data['language']->title)){
					$data['title_err'] = 'Title cannot be empty';
				}
				if(empty($data['language']->code)){
					$data['code_err'] = 'Code cannot be empty';
				}
				if(isset($_POST['activeLanguage']) && $_POST['activeLanguage'] == 'on'){
					$data['language']->active = 1;
				}else{
					$data['language']->active = 0;
				}
				if($_POST['sort_order'] == NULL){
					$data['sort_order_err'] = 'Sort order cannot be empty';
				}else{
						$data['language']->sort_order =  trim($_POST['sort_order']);
				}

				if(empty($data['title_err']) && empty($data['code_err']) && empty($data['sort_order_err'])){
					unset($data['language']->image);
					if($this->languageModel->updateLanguage($data)){
						flash('text_message', 'Language Updated', 'alert alert-success mt-4 mb-0 hide-2');
						redirect('languages/show/' . $data['language']->id);
					}else{
						die('Something went wrong');
					}
				}else{
						$this->view('languages/edit', $data);
				}
			}else{
				$this->view('languages/edit', $data);
			}
		}

		public function add(){

			$data = [
				'title' => '',
				'code' => '',
				'sort_order' => '',
				'active' => 0,
				'title_err' => '',
				'code_err' => '',
				'sort_order_err' => '',
			];


			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Sanitize POST array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data['title'] =  trim($_POST['title']);
				$data['code'] =  trim($_POST['code']);
			

				if(empty($data['title'])){
					$data['title_err'] = 'Title cannot be empty';
				}
				if(empty($data['code'])){
					$data['code_err'] = 'Code cannot be empty';
				}
				if(isset($_POST['activeLanguage']) && $_POST['activeLanguage'] == 'on'){
					$data['active'] = 1;
				}else{
					$data['active'] = 0;
				}
				if($_POST['sort_order'] == NULL){
					$data['sort_order_err'] = 'Sort order cannot be empty';
				}else{
						$data['sort_order'] =  trim($_POST['sort_order']);
				}

				if(empty($data['title_err']) && empty($data['code_err']) && empty($data['sort_order_err'])){
					if($this->languageModel->addLanguage($data)){
						flash('text_message', 'Language Added', 'alert alert-success mt-4 mb-0 hide-2');
						redirect('languages');
					}else{
						die('Something went wrong');
					}
				}else{
						$this->view('languages/add', $data);
				}
			}else{
				$this->view('languages/add', $data);
			}
		}

	}
