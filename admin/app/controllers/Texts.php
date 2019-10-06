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
			$languages = $this->languageModel->getActiveLanguages();
			$text = $this->textModel->getTextById($id);

			$data = [
				'text' => $text,
				'languages' => $languages
			];

			$this->view('texts/show', $data);
		}


		public function add(){
			$languages = $this->languageModel->getActiveLanguages();

			// Init Data
			$data = [
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

				$err = 0;

				// Get multilingual data
				foreach ($languages as $language) {
					$data['title'][$language->id] =  trim($_POST['title_' . $language->id]);
					$data['body'][$language->id] =  trim($_POST['body_' . $language->id]);

					// Validate data
					if(empty($data['title'][$language->id])){
						$data['title_err'][$language->id] = 'Please enter title';
						$err = 1;
					}
					if(empty($data['body'][$language->id])){
						$data['body_err'][$language->id] = 'Please enter description';
						$err = 1;
					}
				}

				// Make sure no errors
				if(!$err){
					//Validated
					unset($data['languages']);
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

				$c = 0;
				foreach ($languages as $language) {
					$data['title'][$language->id] =  '';
					$data['body'][$language->id] =  '';
					++$c;
				}

				$this->view('texts/add', $data);
			}
		}


		public function edit($id){
			$text = $this->textModel->getTextById($id);
			$languages = $this->languageModel->getActiveLanguages();

			// Init Data
			$data = [
				'id' => $text[0]->texts_id,
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

				$err = 0;

				// Get multilingual data
				foreach ($languages as $language) {
					$data['title'][$language->id] =  trim($_POST['title_' . $language->id]);
					$data['body'][$language->id] =  trim($_POST['body_' . $language->id]);

					// Validate data
					if(empty($data['title'][$language->id])){
						$data['title_err'][$language->id] = 'Please enter title';
						$err = 1;
					}
					if(empty($data['body'][$language->id])){
						$data['body_err'][$language->id] = 'Please enter description';
						$err = 1;
					}
				}

				// Make sure no errors
				if(!$err){
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


		public function delete($id){
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if($this->textModel->deleteText($id)){
					flash('text_message', 'Text Removed', 'alert alert-success mt-4 ml-3 mr-3 mb-0 hide-2');
					redirect('texts');
				}else {
					die('Something went wrong');
				}
			}else {
				redirect('texts');
			}
		}
	}
