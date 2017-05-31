<?php
require_once ROOT."/views/admin/header.php";
?>
<style>
	.table-my{
		width: 100%;
	}
	@media (max-width: 768px) {
		table{
			font-size: 70%;
		}
        h1{
            font-size: 30px;
        }
	}
	.table th, .table td {
		padding: 1%;
		text-align: center;
	}
</style>
<div class="container table-my">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1><?php echo $title; ?></h1>
			<div class="table-responsive">
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
							<td><a href="<?php echo LOCALPATH; ?>/admin/user/edit/<?=$user['id'] ?>"><span class="custom glyphicon glyphicon-pencil text-center"></span></a></td>
							<td><a href="<?php echo LOCALPATH; ?>/admin/user/delete/<?=$user['id'] ?>"><span class="custom glyphicon glyphicon-trash text-center"></span></a></td>
						</tr>
						<?php
					}
				}
				?>
			</table>
		</div>
	</div>
</div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>