<?php
	
	use App\Models\News;
	
	require __DIR__ . '/autoload.php';
	$news = News::findAll();
	var_dump($news[0]->author);
