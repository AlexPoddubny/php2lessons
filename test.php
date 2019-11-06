<?php
	
	use App\Singleton;
	
	require __DIR__ . '/autoload.php';
	$s = Singleton::instance();
	$s->counter = 1;
	var_dump($s);
	$s = Singleton::instance();
	var_dump($s);