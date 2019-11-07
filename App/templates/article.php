<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Новость</title>
	<style>
		* {
			font-family: "Fira Code Light";
		}
		div {
			margin-bottom: 15px;
			padding: 10px;
			border: 1px dotted green;
		}
	</style>
</head>
<body>
<article>
	<h2><?php echo trim($article->title); ?></h2>
	<div><?php echo trim($article->content); ?></div>
	
	<a href="javascript:history.back()">
		Назад
	</a>
	<?php if (!empty($article->author)) : ?>
		<div class="author">Автор: <?php echo $article->author->name; ?></div>
	<?php endif; ?>
	
</article>
</body>
</html>