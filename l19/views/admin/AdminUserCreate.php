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
			<label>Введіть E-mail:</label>
	    	<input class="form-control" type="email" name="email" placeholder="email" required>
		</div>

		<div class="form-group">
			<label>Виберіть Ваше Прізвище Ім'я По-батькові:</label>
	    	<input class="form-control" type="text" name="fio" placeholder="fio" required>
		</div>

		<div class="form-group">
			<label>Введіть Ваш номер телефону:</label>
	    	<input class="form-control" type="number" name="phone" maxlength="12" placeholder="380112223344" required>
		</div>

		<div class="form-group">
			<label>Виберіть дату народження:</label>
	    	<input class="form-control" type="date" name="birthday" placeholder="birthday" required>
		</div>

		<div class="form-group">
		    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    Виберіть стать:</b>
		    <div class="material-switch pull-right">
		    <b>Ж&nbsp;</b><input id="someSwitchOptionWarning" name="gender" type="checkbox" checked="checked"/>
		        <label for="someSwitchOptionWarning" class="label-warning">
		        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        М</label>
		    </div>
		</div>

		<span class="button-checkbox">
			<b>Права адміна:</b>
			<button type="button" class="btn" data-color="primary">Адмін</button>
			<input type="checkbox" name="admin" class="hidden"/>
		</span>
		<br><br>

		<div class="form-group">
			<button type="submit" name="createUser" class="btn btn-default">Створити Користувача</button>
		</div>
		
	</form>
</center>
<script src="<?php echo LOCALPATH; ?>/template/js/checkbox.js"></script>
<?php
	require_once ROOT."/views/admin/footer.php";
?>