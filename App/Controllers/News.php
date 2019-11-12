<?php
	
	
	namespace App\Controllers;
	
	
	use App\View;
	
	class News
		extends Base
	{
		
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
		
	}