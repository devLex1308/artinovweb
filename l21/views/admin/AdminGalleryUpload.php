<?php
require_once ROOT."/views/admin/header.php";
?>
<?php
if(!empty($errors)){
	foreach ($errors as $key => $error) {
		?>		
		<p class="error text-center" style="color: red">*<?=@$error;?></p>
		<?php
	}
}
?>
<div class="container">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
		<div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 content text-center">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<form method="post" enctype="multipart/form-data">
				<input name="userFile[]" type="file" multiple><br>
				<div class="form-group">
					<button type="submit" name="userfile" type="file" class="btn btn-default">Завантажити</button>
				</div>
			</form>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
	</div>
</div>

<?php
require_once ROOT."/views/admin/footer.php";
?>