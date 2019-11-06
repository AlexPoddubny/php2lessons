<?php
	
	use App\Config;
	use App\Models\News;
	use App\Models\User;
	
	require __DIR__ . '/autoload.php';
	
	
	//$user = User::findById(6);
	/*
	
	$user->name = 'Vasiliska';
	$user->email = 'test1@test.com';
	
	$user->delete();
	$users = User::findAll();
	var_dump($users);
	*/
	$news = News::getByCount(3);
	include __DIR__ . '/App/templates/news.php';
	
	