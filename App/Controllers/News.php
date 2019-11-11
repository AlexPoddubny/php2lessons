<?php
	
	
	namespace App\Controllers;
	
	
	use App\View;
	
	class News
	{
		
		protected $view;
		
		public function __construct()
		{
			$this->view = new View;
		}
		
		protected function beforeAction()
		{
			//echo 'Счетчик';
		}
		
		protected function actionIndex()
		{
			$this->view->news = \App\Models\News::findAll();
			$this->view->title = 'Top ' . count($this->view->news) . ' news';
			$this->view->display(__DIR__ . '/../templates/news.php');
		}
		
		protected function actionOne()
		{
			$id = (int)$_GET['id'];
			$this->view->article = \App\Models\News::findById($id);
			$this->view->title = $this->view->article->title;
			$this->view->display(__DIR__ . '/../templates/article.php');
		}
		
		public function action($action)
		{
			$methodName = 'action' . $action;
			$this->beforeAction();
			return $this->$methodName();
		}
	}