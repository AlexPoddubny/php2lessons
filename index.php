<?php
	
	
	$url = explode('/', $_SERVER['REQUEST_URI']);
	var_dump($_SERVER['REQUEST_URI'], $url);
	
	$ctrlRequest = !empty($url[1]) ? $url[1] : 'News';
	var_dump($ctrlRequest);
	$ctrlClassName = '\App\Controllers\\' . ucfirst($ctrlRequest);
	var_dump($ctrlClassName);
	require __DIR__ . '/autoload.php';
	
	$controller = new $ctrlClassName;
	
	if (!empty($_GET)){
		$action = $_GET['action'];
	} else {
		$action = 'Index';
	}
	$controller->action($action);