<?php
	
	require __DIR__ . '/autoload.php';
	
	$db = new \App\Db();
	//echo \App\Models\User::$table;
	$users = \App\Models\User::findAll();
	var_dump($users);
	