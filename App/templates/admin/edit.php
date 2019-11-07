<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?php if (!$article->id){
			echo 'Добавить ';
		} else {
			echo 'Редактировать ';
		}
		?>новость
	</title>
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
	<h1><?php
			if (!$article->id){
				echo 'Добавить ';
			} else {
				echo 'Редактировать ';
			}
		?>новость</h1>
	<form action="/App/Admin/edit.php" method="post">
		<div>
			<input type="text" name="title" style="width: 100%; text-align: left" value="
				<?php echo trim($article->title); ?>
			">
			<?php if ($article->id){ ?>
				<input type="hidden" name="id" value="<?php echo $article->id; ?>">
			<?php } ?>
		</div>
		<div>
			<textarea name="content" style="width: 100%; height: 500px">
				<?php echo trim($article->content);?>
			</textarea>
		</div>
		<input type="submit" value="Сохранить">
	</form>
</body>
</html>