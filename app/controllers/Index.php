<?php
	class Index extends Controller {
		public function __construct(){
			// echo 'Pages loaded';
			$this->postModel = $this->model('Post');
			$this->newsModel = $this->model('NewsModel');
		}


		public function index(){
			$posts = $this->postModel->getPosts();
			$news = $this->newsModel->getNews();

			$data = [
				'title' => 'Home Page',
				'posts' => $posts,
				'news' => $news,
			];

			$this->view('pages/index', $data);
		}
	}
