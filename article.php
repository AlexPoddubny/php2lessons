<?php
	
	include __DIR__ . '/App/templates/article.php';
	$article = \App\Models\News::findById($id);
