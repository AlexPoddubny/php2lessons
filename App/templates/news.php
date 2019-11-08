<body>
	<h1><?php echo $title?></h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="/article.php?id=<?php echo $article->id; ?>">
					<?php echo trim($article->title); ?>
				</a>
			</div>
		</div>
	<?php } ?>
	<div class="panel-heading">
		<a href="/App/Admin/admin.php">Administrate articles</a>
	</div>