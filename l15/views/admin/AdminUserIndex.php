<?php
	require_once ROOT."/views/admin/header.php";
?>
<h1><?php echo $title; ?></h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
	    <tr>
	    	<th>ПІБ</th>
	    	<th>Логін</th>
	    	<th>Пароль</th>
	    	<th>E-mail</th>
	    	<th>Телефон</th>
	    	<th>Дата народження</th>
	    	<th>Стать</th>
	    	<th>Час реєстрації</th>
	    	<th>Редагувати</th>
	    	<th>Видалити</th>
	    </tr>
		<?php
			if(!empty($users)){
				foreach ($users as $key => $user) {
		?>
				<tr>
					<td><?=$user['fio']; ?></td>
					<td><?=$user['login']; ?></td>
					<td><?=$user['pass']; ?></td>
					<td><?=$user['email']; ?></td>
					<td><?=$user['phone']; ?></td>
					<td><?=$user['birthday']; ?></td>
					<td><?=$user['gender']; ?></td>
					<td><?=$user['time_registered']; ?></td>
		    		<td><a href="<?php echo LOCALPATH; ?>/admin/user/edit/<?=$user['id'] ?>">Редагувати</a></td>
		    		<td><a href="<?php echo LOCALPATH; ?>/admin/user/delete/<?=$user['id'] ?>">Видалити</a></td>
				</tr>
		<?php 
				}
			}
		?>
    </table>
</div>
<?php
	require_once ROOT."/views/admin/footer.php";
?>