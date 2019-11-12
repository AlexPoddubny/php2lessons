<body>
	<h1><?php echo $title; ?></h1>
	<hr>
	<?php foreach ($news as $article){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="/news/one/?id=<?php echo $article->id; ?>">
					<?php echo trim($article->title); ?>
				</a> <?php if (!empty($article->author)) { ?>
				<div class="panel-body">Автор: <?php echo
					$article->author->name; ?></div>
				<?php } ?>
				<div class="panel-body">
					<a href="/Admin/edit/?id=<?php echo $article->id; ?>">Edit</a>&nbsp;
					<a href="/Admin/delete/?id=<?php echo $article->id; ?>">Delete</a>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/Admin/new/">Add news</a>
		</div>
		<div class="panel-heading">
			<a href="/">На главную</a>
		</div>
	</div>