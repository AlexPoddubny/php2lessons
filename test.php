<?php
	
	use App\Collection;
	
	require __DIR__ . '/autoload.php';
	$a = new Collection;
	$a[1] = 1;
	$a[11] = 11;
	$a[2] = 22;
	foreach ($a as $el){
		echo $el;
	}