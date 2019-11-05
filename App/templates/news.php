<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<style>
		div {
			margin-bottom: 15px;
			padding: 10px;
			border: 1px dotted green;
		}
	</style>
</head>
<body>
	<h1>News</h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div>
			<a href="/App/template/article.php?id=<?php echo $article->id; ?>">
				<?php echo $article->title; ?>
			</a>
			<p><?php echo $article->content; ?></p>
		</div>
	<?php } ?>
</body>
</html>
