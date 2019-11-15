<?php

function autoloader($class)
{
	$file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
	if (file_exists($file)){
		include $file;
	} return false;
	
}

spl_autoload_register('autoloader');

spl_autoload_register(function ($class){
	$file = __DIR__ . '/' . str_replace(['\\', 'App'], ['/', 'lib'], $class) .
		'.php';
	if (file_exists($file)){
		include $file;
	} return false;
});