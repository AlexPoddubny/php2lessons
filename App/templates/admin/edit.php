<body>
	<div class="panel panel-default">
		<form action="/Admin/save/" method="post">
			<div  class="panel-heading">
				<input type="text" name="title" style="width: 100%; text-align: left" value="<?php echo trim($article->title); ?>">
				<?php if ($article->id){ ?>
					<input type="hidden" name="id" value="<?php echo $article->id; ?>">
				<?php } ?>
			</div>
			<div class="panel-body">
				<textarea name="content" style="width: 100%; height: 500px"><?php echo trim($article->content);?></textarea>
			</div>
			<input type="submit" value="Сохранить">
		</form>
	</div>