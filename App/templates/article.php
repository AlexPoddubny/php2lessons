<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Новость</title>
	
</head>
<body>
<article><?php foreach ($article as $line) { ?>
	<h2><?php echo $line->title; ?></h2>
	<p><?php echo $line->content; ?></p>
	
	<a href="javascript:history.back()">
		Назад
	</a>
	<?php if (!empty($line->author)) : ?>
		<div class="author">Автор: <?php echo $line->author->name; ?></div>
	<?php endif; ?>
	<?php } ?>
</article>
</body>
</html>