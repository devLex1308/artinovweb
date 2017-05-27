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
	.content{
		text-align: center;
	}
</style>
<?php
if(!empty($errors)){
	foreach ($errors as $key => $error) {
		?>		
		<p class="error" style="color: red">*<?=@$error;?></p>
		<?php
	}
}
?>
<div class="container">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
		<div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 content">
			<h1 class="text-center"><?php echo $title; ?></h1>
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
				<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Виберіть стать:</b>
				<div class="material-switch pull-right">
					<b>Ж&nbsp;</b><input id="someSwitchOptionWarning" name="gender" type="checkbox" <?php if($user['gender']) echo "checked"; ?>/>
					<label for="someSwitchOptionWarning" class="label-warning">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;М</label>
				</div>
			</div>

			<span class="button-checkbox">
				<b>Права адміна:</b>
				<button type="button" class="btn" data-color="primary">Адмін</button>
				<input type="checkbox" name="admin" class="hidden" <?php if($user['role']) echo "checked"; ?>/>
			</span>
			<br><br>
			<div class="form-group">
				<button type="submit" name="editUser" class="btn btn-default">Редагувати Користувача</button>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
	</div>
</div>
<script src="<?php echo LOCALPATH; ?>/template/js/checkbox.js"></script>
<?php
require_once ROOT."/views/admin/footer.php";
?>