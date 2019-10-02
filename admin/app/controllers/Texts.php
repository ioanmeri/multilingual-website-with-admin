<?php
	class Texts extends Controller {
		public function __construct(){
			$this->textModel = $this->model('Text');
		}

		public function index(){
			$texts = $this->textModel->getTexts();

			$data = [
				// 'title' => 'Welcome',
				'texts' => $texts
			];

			

			$this->view('texts/index', $data);
		}

	}
