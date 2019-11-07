<?php
	
	use App\Models\News;
	
	require __DIR__ . '/../../autoload.php';
	
	$news = News::findAll();
	include __DIR__ . '/../../App/templates/admin/index.php';