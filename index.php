<?php
	
	var_dump($_SERVER['REQUEST_URI']);
	die;
	use App\Controllers\News;
	
	require __DIR__ . '/autoload.php';
	
	$controller = new News();
	if (!empty($_GET)){
		$action = $_GET['action'];
	} else {
		$action = 'Index';
	}
	$controller->action($action);