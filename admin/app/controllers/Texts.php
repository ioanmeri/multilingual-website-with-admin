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

		public function add(){
			$languages = $this->languageModel->getLanguages();
			$title = [];
			$body = [];

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Sanitize POST array
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$title_err = [];
				$body_err = [];

				// Get multilingual data
				foreach ($languages as $language) {
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
						flash('text_message', 'Text Added');
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

	}
