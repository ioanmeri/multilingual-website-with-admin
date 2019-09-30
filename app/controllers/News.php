<?php
	class News extends Controller {
		public function __construct(){
			// echo 'Pages loaded';
			$this->newsModel = $this->model('NewsModel');
		}


		public function index(){
			$news= $this->newsModel->getNews();

			$data = [
				'news' => $news
			];

			$this->view('pages/news', $data);
		}
	}
