<?php
	
	
	namespace App\Controllers;
	
	
	use App\Exceptions\Exception404;
	use App\MultiException;
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
			if (!$this->view->article = \App\Models\News::findById($id)){
				$e = new MultiException();
				$e[] = new \Exception('Новость отсутствует');
				throw $e;
			};
			$this->view->title = $this->view->article->title;
			$this->view->display(__DIR__ . '/../templates/article.php');
		}

	}