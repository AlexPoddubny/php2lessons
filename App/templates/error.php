<?php foreach ($errors as $error) { ?>
	<div class="alert alert-danger">
		<?php echo $error->getMessage(); ?>
	</div>
<?php } ?>
<div class="panel-heading">
	<a href="/">На главную</a>
</div>