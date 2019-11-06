<?php
	
	use App\Config;
	use App\Models\News;
	use App\Models\User;
	
	require __DIR__ . '/autoload.php';
	
	
	$user = new User();
	$user->name = 'Vasya';
	$user->email = 'test@test.com';
	$id = $user->insert();
	
	$news = News::getByCount(3);
	include __DIR__ . '/App/templates/news.php';