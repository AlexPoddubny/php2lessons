<?php
	
	require __DIR__ . '/autoload.php';
	
	$db = new \App\Db();
	$users = \App\Models\User::findAll();
	var_dump($users);
	