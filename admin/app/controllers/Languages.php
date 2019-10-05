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

	}
