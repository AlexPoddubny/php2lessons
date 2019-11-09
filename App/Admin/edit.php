<?php
	
	require __DIR__ . '/../../autoload.php';
	
	use App\Models\News;
	use App\View;
	
	$view = new View();
	if (!empty($_GET)){
		if ('new' == $_GET['id']){
			$view->article = new News();
			$view->title = 'Добавить';
		} else {
			$view->article = News::findById($_GET['id']);
			$view->title = 'Редактировать';
		}
		$view->display(__DIR__ . '/../../App/templates/admin/edit.php');
	}
	
	if (!empty($_POST)){
		$article = new News();
		if (!empty($_POST['id'])){
			$article->id = $_POST['id'];
		}
		$article->title = trim($_POST['title']);
		$article->content = trim($_POST['content']);
		$article->save();
		header('Location:/App/Admin/admin.php');
	}
	