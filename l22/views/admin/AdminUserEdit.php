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
	.button-checkbox > input[type="checkbox"] {
		display: none;
	}
	.checktext{
		position: absolute;
		display: block;
		left: -60px;
		top: -10px;
	}
	.material-switch{
		margin-top: 10px;
		margin-bottom: 45px;
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
			<form method="post">
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
					<b>Виберіть стать:</b>
					<div class="material-switch pull-right text-center">
						<input id="someSwitchOptionWarning" name="gender" type="checkbox" <?php if($user['gender']) echo "checked"; ?>/>
						<label for="someSwitchOptionWarning" class="label-warning"><span class="checktext"><b>Ж&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;М</b></span></label>
					</div>
				</div>

				<span class="button-checkbox">
					<b>Права адміна:</b>
					<button type="button" class="btn" data-color="primary">Адмін</button>
					<input type="checkbox" name="admin" class="hidden checkbox" <?php if($user['role']) echo "checked"; ?>/>
				</span>
				<br><br>
				<div class="form-group">
					<button type="submit" name="editUser" class="btn btn-success">Редагувати</button>
				</div>
			</form>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
	</div>
</div>
<script src="<?php echo LOCALPATH; ?>/template/js/checkbox.js"></script>
<?php
require_once ROOT."/views/admin/footer.php";
?>