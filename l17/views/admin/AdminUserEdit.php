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
    <h1><?php echo $title." <br><<b>".$user['fio']."</b>>"; ?></h1>

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
	    	<input class="form-control" type="text" name="login" placeholder="login" value="<?php echo $user['login']; ?>" required>
		</div>

		<div class="form-group">
			<label>Введіть новий пароль Пароль, або ж залиште це поле пустим:</label>
	    	<input class="form-control" type="text" name="pass" placeholder="pass">
		</div>

		<div class="form-group">
			<label>Введіть E-mail:</label>
	    	<input class="form-control" type="email" name="email" placeholder="email" value="<?php echo $user['email']; ?>" required>
		</div>

		<div class="form-group">
			<label>Виберіть Ваше Прізвище Ім'я По-батькові:</label>
	    	<input class="form-control" type="text" name="fio" placeholder="fio" value="<?php echo $user['fio']; ?>" required>
		</div>

		<div class="form-group">
			<label>Введіть Ваш номер телефону:</label>
	    	<input class="form-control" type="number" name="phone" maxlength="12" value="<?php echo $user['phone']; ?>" placeholder="380112223344" required>
		</div>

		<div class="form-group">
			<label>Виберіть дату народження:</label>
	    	<input class="form-control" type="date" name="birthday" placeholder="birthday" value="<?php echo $user['birthday']; ?>" required>
		</div>

		<div class="form-group">
		    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    Виберіть стать:</b>
		    <div class="material-switch pull-right">
		    <b>Ж&nbsp;</b><input id="someSwitchOptionWarning" name="gender" type="checkbox" <?php if($user['gender']) echo "checked"; ?>/>
		        <label for="someSwitchOptionWarning" class="label-warning">
		        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        М</label>
		    </div>
		</div>

		<div class="form-group">
			<button type="submit" name="editUser" class="btn btn-default">Редагувати Користувача</button>
		</div>
		
	</form>
</center>
<?php
	require_once ROOT."/views/admin/footer.php";
?>