<?php
	
	require __DIR__ . '/../../autoload.php';
	
	use App\Models\News;
	
	if (!empty($_GET)){
		if ('new' == $_GET['id']){
			$article = new News();
		} else {
			$article = News::findById($_GET['id']);
		}
		include __DIR__ . '/../../App/templates/admin/edit.php';
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
	