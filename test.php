<?php
	
	$prefix = 'project';
	$f = function ($name) use ($prefix){
		return $prefix . '_' . $name;
	};
	echo $f('users');
	$prefix = 'table';
	echo $f('users');