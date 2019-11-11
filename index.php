<?php
	
	require __DIR__ . '/autoload.php';
	
	use App\Models\News;
	use App\Models\User;
	use App\View;
	
	$controller = new \App\Controllers\News();
	$controller->action('Index');