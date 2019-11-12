<?php
	
	
	namespace App\Controllers;
	
	
	use App\Models\News;
	
	class Admin
		extends Base
	{
		protected function actionIndex()
		{
			$this->view->news = \App\Models\News::findAll();
			$this->view->title = 'Панель администрирования';
			$this->view->display(__DIR__ . '/../../App/templates/admin/news.php');
		}
		
		protected function actionNew()
		{
			$this->view->article = new News();
			$this->view->title = 'Добавить';
			$this->actionShow();
		}
		
		protected function actionEdit()
		{
			if (!empty($_GET['id'])){
				$this->view->article = News::findById($_GET['id']);
				$this->view->title = 'Редактировать';
				$this->actionShow();
			}
		}
		
		protected function actionShow()
		{
			$this->view->title .= ' новость';
			$this->view->display(__DIR__ . '/../../App/templates/admin/edit.php');
		}
		
		protected function actionSave()
		{
			if (!empty($_POST)){
				$article = new News();
				if (!empty($_POST['id'])){
					$article->id = $_POST['id'];
				}
				$article->title = $_POST['title'];
				$article->content = $_POST['content'];
				$article->save();
				header('Location:/Admin/');
			}
		}
		
		protected function actionDelete()
		{
			$this->view->article = News::findById($_GET['id']);
			$this->view->article->delete();
			header('Location:/Admin/');
		}
	}