<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Админпанель</title>
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
	<h1>Новости в базе данных</h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div>
			<a href="/article.php?id=<?php echo $article->id; ?>">
				<?php echo trim($article->title); ?><br>
			</a>
			<a href="/App/Admin/edit.php?id=<?php echo $article->id; ?>">Edit</a>&nbsp;
			<a href="/App/Admin/admin.php?id=<?php echo	$article->id;?>">
				Delete
			</a>
		</div>
	<?php } ?>
	<p>
		<a href="/App/Admin/edit.php?id=new">Add news</a>
	</p>
	<p>
		<a href="/">На главную</a>
	</p>
</body>
</html>