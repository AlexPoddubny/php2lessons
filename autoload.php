<?php

function autoloader($class)
{
	$file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
	if (file_exists($file)){
		require $file;
	} return false;
	
}

spl_autoload_register('autoloader');