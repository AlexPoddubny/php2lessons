<?php
	
	require __DIR__ . '/autoload.php';
	
	use App\Models\News;
	use App\Models\User;
	use App\View;
	
	/*
	use App\Config;
	use App\Models\News;
	
	
	
	
	
	$user = User::findById(3);
	
	/*
	$user->name = 'Vasiliska';
	$user->email = 'test1@test.com';
	
	if ($user){
		$user->delete();
	}
	$users = User::findAll();
	
	$news = News::findAll();
	include __DIR__ . '/App/templates/news.php';
	
	
	$view = new View;
	$view->users = User::findAll();
	$view->title = 'Пользователи';
	$view->display(__DIR__ . '/App/templates/news.php');
	*/
	$view = new View;
	$view->news = News::findAll();
	$view->title = 'Top ' . count($view->news) . ' news';
	$view->display(__DIR__ . '/App/templates/news.php');