<?php
	
	use App\Logger;
	use \App\MultiException;
	use \App\View;
	
	require __DIR__ . '/autoload.php';
	$url = explode('/', $_SERVER['REQUEST_URI']);
	$ctrlRequest = !empty($url[1]) ? $url[1] : 'News';
	$ctrlClassName = '\App\Controllers\\' . ucfirst($ctrlRequest);
	$controller = new $ctrlClassName;
	$actionRequest = !empty($url[2]) ? $url[2] : 'Index';
	$actionName = ucfirst($actionRequest);
	try {
		$controller->action($actionName);
	} catch (MultiException $e) {
		$err = new View();
		$err->errors = $e;
		Logger::logError($e);
		$err->display(__DIR__ . '/App/templates/error.php');
	}
	