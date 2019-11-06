<?php
	
	use App\Models\News;
	
	require __DIR__ . '/autoload.php';
	$article = News::findById($_GET['id']);
	include __DIR__ . '/App/templates/article.php';
