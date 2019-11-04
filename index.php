<?php
	
	require __DIR__ . '/autoload.php';
	
	$db = new \App\Db();
	$user = new \App\Models\User();
	$users = $user->findAll();
	var_dump($users);
	