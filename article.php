<?php
	
	require __DIR__ . '/autoload.php';
	$article = \App\Models\News::findById($_GET['id']);
	var_dump($article);
	include __DIR__ . '/App/templates/article.php';
