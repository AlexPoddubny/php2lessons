<!DOCTYPE html>
<html>
<head>
	<title>Админпанель</title>
	<style>
		div {
			margin-bottom: 15px;
			padding: 10px;
			border: 1px dotted green;
		}
	</style>
</head>
<body>
	<h1>Новости в базе данных</h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div>
			<a href="/article.php?id=<?php echo $article->id; ?>">
				<?php echo trim($article->title); ?><br>
			</a>
			<a href="/App/Admin/edit.php?id=<?php echo $article->id; ?>">
				Edit
			</a>
		</div>
	<?php } ?>
	<a href="/App/Admin/edit.php?id=new">Add news</a>
</body>
</html>