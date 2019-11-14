<?php
	
	use App\Exceptions\Db;
	use App\Exceptions\Exception404;
	
	require __DIR__ . '/autoload.php';
	$url = explode('/', $_SERVER['REQUEST_URI']);
	$ctrlRequest = !empty($url[1]) ? $url[1] : 'News';
	$ctrlClassName = '\App\Controllers\\' . ucfirst($ctrlRequest);
	//var_dump($ctrlClassName);
	$controller = new $ctrlClassName;
	$actionRequest = !empty($url[2]) ? $url[2] : 'Index';
	//var_dump($actionRequest);
	$actionName = ucfirst($actionRequest);
	//var_dump($actionName);
	try {
		$controller->action($actionName);
	} catch (\App\MultiException $e) {
		$err = new \App\View();
		$err->errors = $e;
		$err->display(__DIR__ . '/App/templates/error.php');
	}
	