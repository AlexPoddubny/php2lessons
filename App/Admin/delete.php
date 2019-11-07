<?php
	
	use App\Models\News;
	
	require __DIR__ . '/../../autoload.php';
	
	$article = News::findById($_GET['id']);
	
	var_dump($article);
	//$article->delete();
	
	header("Refresh:0");