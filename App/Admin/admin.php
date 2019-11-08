<?php
	
	use App\Models\News;
	use App\View;
	
	require __DIR__ . '/../../autoload.php';
	
	if (!empty($_GET)){
		$article = News::findById($_GET['id']);
		$article->delete();
	}
	
	$view = new View;
	$view->news = News::findAll();
	$view->title = 'Админка';
	$view->display(__DIR__ . '/../../App/templates/admin/news.php');