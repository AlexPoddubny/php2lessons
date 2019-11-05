<?php
	
	require __DIR__ . '/autoload.php';
	
	//$db = new \App\Db();
	//echo \App\Models\User::$table;
	//$users = \App\Models\User::findById(2);
	//$users = \App\Models\User::getByCount(2);
	$news = \App\Models\News::getByCount(3);
	
	include __DIR__ . '/App/templates/news.php';
	