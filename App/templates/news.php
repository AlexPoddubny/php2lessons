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
	<h1>Top News</h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div>
			<a href="/article.php?id=<?php echo $article->id; ?>">
				<?php echo trim($article->title); ?>
			</a>
		</div>
	<?php } ?>
</body>
</html>
