<?php
	
	
	namespace App\Controllers;
	
	
	use App\Models\News;
	use App\MultiException;
	
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
				try {
					$article = new News();
					$article->fill($_POST);
					$article->save();
					header('Location:/Admin/');
				} catch (MultiException $e){
					$this->view->errors = $e;
					$this->view->display(__DIR__ . '/../../App/templates/error.php');
				}
			}
		}
		
		protected function actionDelete()
		{
			$this->view->article = News::findById($_GET['id']);
			$this->view->article->delete();
			header('Location:/Admin/');
		}
	}