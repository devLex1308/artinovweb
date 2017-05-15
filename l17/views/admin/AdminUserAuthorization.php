<?php
	require_once ROOT."/views/admin/header.php";
?>
<style>
input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
<center>
    <h1><?php echo $title; ?></h1>

	<form method="POST" style="max-width: 500px;">
	<?php
		if(!empty($errors)){
			foreach ($errors as $key => $error) {
	?>		
				<p class="error" style="color: red">*<?=@$error;?></p>
	<?php
			}
		}
	?>
		<div class="form-group">
			<label>Введіть Логін:</label>
	    	<input class="form-control" type="text" name="login" placeholder="login" required>
		</div>

		<div class="form-group">
			<label>Введіть Пароль:</label>
	    	<input class="form-control" type="password" name="pass" placeholder="pass" required>
		</div>
		<div class="form-group">
			<button type="submit" name="Authorization" class="btn btn-default">Увійти</button>
		</div>
		
	</form>
</center>
<?php
	require_once ROOT."/views/admin/footer.php";
?>