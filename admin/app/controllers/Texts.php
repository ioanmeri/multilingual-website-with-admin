<?php
	class Texts extends Controller {
		public function __construct(){
			$this->textModel = $this->model('Text');
			$this->languageModel = $this->model('Language');
		}

		public function index(){
			$texts = $this->textModel->getTexts();

			$data = [
				'texts' => $texts
			];

			$this->view('texts/index', $data);
		}


		public function show($id){
			$languages = $this->languageModel->getLanguages();
			$text = $this->textModel->getTextById($id);

			$data = [
				'text' => $text,
				'languages' => $languages
			];

			$this->view('texts/show', $data);
		}


		public function add(){
			$languages = $this->languageModel->getLanguages();
			$title = [];
			$body = [];

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Sanitize POST array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				//Init multilingual errors e.g. $data['title_err']['en'] = '' ...
				$title_err = [];
				$body_err = [];

				// Get multilingual data
				foreach ($languages as $key => $language) {
					$title[$language->code] =  trim($_POST['title_' . $language->code]);
					$body[$language->code] =  trim($_POST['body_' . $language->code]);
					$title_err[$language->code] = '';
					$body_err[$language->code] = '';
				}
			
				$data = [
					'title' => $title,
					'body' => $body,
					'user_id' => $_SESSION['user_id'],
					'title_err' => $title_err,
					'body_err' => $body_err,
					'languages' => $languages
				];


				// Validate data
				foreach ($languages as $language) {
					if(empty($data['title'][$language->code])){
						$data['title_err'][$language->code] = 'Please enter title';
					}

					if(empty($data['body'][$language->code])){
						$data['body_err'][$language->code] = 'Please enter description';
					}
				}

				$title_err = 0;
				$body_err = 0;

				foreach ($languages as $language) {
					if(!empty($data['title_err'][$language->code])){
						$title_err = 1;
					}

					if(!empty($data['body_err'][$language->code])){
						$body_err = 1;
					}
				}

				// Make sure no errors
				if(!$title_err && !$body_err){
					//Validated
					if($this->textModel->addText($data)){
						flash('text_message', 'Text Added', 'alert alert-success mt-4 ml-3 mr-3 mb-0 hide-2');
						redirect('texts');
					}else {
						die('Something went wrong');
					}
				}else {
					// Load the view with errors
					$this->view('texts/add', $data);
				}

			}else{

				foreach ($languages as $language) {
					$title[$language->code] = '';
					$body[$language->code] = '';
				}

				$data = [
					'title' => $title,
					'body' => $body,
					'languages' => $languages
				];

				$this->view('texts/add', $data);
			}
		}


		public function edit($id){
			$text = $this->textModel->getTextById($id);
			$languages = $this->languageModel->getLanguages();

			// Init Data
			$data = [
				'id' => $text[0]->text_id,
				'languages' => $languages,
				'user_id' => $_SESSION['user_id'],
			];
			foreach ($languages as $language) {
				$data['title_err'][$language->id] = '';
				$data['body_err'][$language->id] = '';
			}

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Sanitize POST array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				// Get multilingual data
				foreach ($languages as $language) {
					$data['title'][$language->id] =  trim($_POST['title_' . $language->id]);
					$data['body'][$language->id] =  trim($_POST['body_' . $language->id]);
				}
			
				// Validate data
				foreach ($languages as $language) {
					if(empty($data['title'][$language->id])){
						$data['title_err'][$language->id] = 'Please enter title';
					}
					if(empty($data['body'][$language->id])){
						$data['body_err'][$language->id] = 'Please enter description';
					}
				}

				$title_err = 0;
				$body_err = 0;

				foreach ($languages as $language) {
					if(!empty($data['title_err'][$language->id])){
						$title_err = 1;
					}
					if(!empty($data['body_err'][$language->id])){
						$body_err = 1;
					}
				}

				// Make sure no errors
				if(!$title_err && !$body_err){
					//Validated, no need to send languages
					unset($data['languages']);

					if($this->textModel->updateText($data)){
						flash('text_message', 'Text Updated', 'alert alert-success mt-4 ml-3 mr-3 mb-0 hide-2');
						redirect('texts/show/' . $data['id']);
					}else {
						die('Something went wrong');
					}
				}else {
					// Load the view with errors
					$this->view('texts/edit', $data);
				}

			}else{

				$c = 0;
				foreach ($languages as $language) {
					$data['title'][$language->id] =  $text[$c]->title;
					$data['body'][$language->id] =  $text[$c]->body;
					++$c;
				}

				$this->view('texts/edit', $data);
			}
		}

	}
