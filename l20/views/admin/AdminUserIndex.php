<?php
require_once ROOT."/views/admin/header.php";
?>
<style>
	.content{
		text-align: center;
	}
	.man{
		background-image: url(../template/images/man.png);
		background-position: center;
	}
	.woman{
		background-image: url(../template/images/woman.png);
		background-position: left;
	}
	.picture{
		background-size: contain;
		background-repeat: no-repeat;
		height: 30px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-12 content">
			<h1><?php echo $title; ?></h1>
			<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>ПІБ</th>
					<th>Логін</th>
					<!-- <th>E-mail</th> -->
					<!-- <th>Телефон</th> -->
					<th>Дата народження</th>
					<th>Стать</th>
					<th>Редагувати</th>
					<th>Видалити</th>
				</tr>
				<?php
				if(!empty($users)){
					$i = 0;
					$arr = ['active', 'success', 'info', 'warning', 'danger'];
					foreach ($users as $key => $user) {
						echo "<tr class='".$arr[$i]."'>";
						$i++;
						if($i == 4) $i = 0;
						?>
						<td><?=$user['fio']; ?></td>
						<td><?=$user['login']; ?></td>
						<!-- <td><?=$user['email']; ?></td> -->
						<!-- <td><?=$user['phone']; ?></td> -->
						<td><?=$user['birthday']; ?></td>
						<td class="picture <?php if($user['gender']) echo "man"; else  echo "woman"; ?>"></td>
						<td><a href="<?php echo LOCALPATH; ?>/admin/user/edit/<?=$user['id'] ?>"><span class="custom glyphicon glyphicon-pencil text-center"></a></td>
						<td><a href="<?php echo LOCALPATH; ?>/admin/user/delete/<?=$user['id'] ?>"><span class="custom glyphicon glyphicon-trash text-center"></a></td>
					</tr>
					<?php
				}
			}
			?>
		</table>
	</div>
</div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>