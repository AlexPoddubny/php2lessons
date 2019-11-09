<body>
	<h1><?php echo $title; ?></h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="/article.php?id=<?php echo $article->id; ?>">
					<?php echo trim($article->title); ?>
				</a> <?php if ($article->author) { ?>
				<div class="panel-body">Автор: <?php echo
					$article->author->name; ?></div>
				<?php } ?>
				<a href="/App/Admin/edit.php?id=<?php echo $article->id; ?>">Edit</a>&nbsp;
				<a href="/App/Admin/admin.php?id=<?php echo	$article->id;?>">
					Delete
				</a>
			</div>
		</div>
	<?php } ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/App/Admin/edit.php?id=new">Add news</a>
		</div>
		<div class="panel-heading">
			<a href="/">На главную</a>
		</div>
	</div>