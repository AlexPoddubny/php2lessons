<?php
	
	use App\Models\News;
	
	require __DIR__ . '/../../autoload.php';
	
	if (!empty($_GET)){
		$article = News::findById($_GET['id']);
		$article->delete();
	}
	
	$news = News::findAll();
	include __DIR__ . '/../../App/templates/admin/index.php';