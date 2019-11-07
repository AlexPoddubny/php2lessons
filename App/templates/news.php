<!DOCTYPE html>
<html>
<head>
	<title>News</title>
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
	<h1>Top <?php echo count($news); ?> News</h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div>
			<a href="/article.php?id=<?php echo $article->id; ?>">
				<?php echo trim($article->title); ?>
			</a>
			
		</div>
	<?php } ?>
	<a href="/App/Admin/admin.php">Administrate articles</a>
</body>
</html>
