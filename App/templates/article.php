<body>
<article>
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo trim($article->title); ?></div>
		<div class="panel-body"><?php echo trim($article->content); ?></div>
		
		<?php if (!empty($article->author)) : ?>
			<div class="panel-body">Автор: <?php echo $article->author->name;
			?></div>
		<?php endif; ?>
		
		<a href="javascript:history.back()">
			Назад
		</a>
		
	</div>
</article>