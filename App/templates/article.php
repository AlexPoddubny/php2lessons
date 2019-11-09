<body>
<article>
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo trim($article->title); ?></div>
		<div class="panel-body"><?php echo trim($article->content); ?></div>
		
		<a href="javascript:history.back()">
			Назад
		</a>
		<?php if (!empty($article->author)) : ?>
			<div class="author">Автор: <?php echo $article->author->name; ?></div>
		<?php endif; ?>
	</div>
</article>