<?php
	
	use App\Models\News;
	use App\View;
	
	require __DIR__ . '/autoload.php';
	
	$view = new View;
	$view->article = News::findById($_GET['id']);
	$view->title = $view->article->title;
	$view->display(__DIR__ . '/App/templates/article.php');