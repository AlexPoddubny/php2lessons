<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Новость</title>
	
</head>
<body>
<article>
	<h2><?php echo $article->title; ?></h2>
	<p><?php echo $article->content; ?></p>
	<a href="javascript:history.back()">
		Назад
	</a>
	<?php if (!empty($article->author)) : ?>
		<div class="author">Автор: <?php echo $article->author->name; ?></div>
	<?php endif; ?>
</article>
</body>
</html>