<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
	<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<th>id</th>
			<th>Назва</th>
			<th>Редагувати</th>
			<th>Заповнення маршруту</th>
			<th>Видалити</th>
		</tr>
		<?php
			foreach ($routers as $key => $router) {?>
				<tr>
					<td><?php echo $router['id']; ?></td>
					<td><?php echo $router['number']." ".$router['name_start']."-".$router['name_end']; ?></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/route/edit/<?php echo $router['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/route/fill/<?php echo $router['id']; ?>">Заповнити маршрут</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/route/delete/<?php echo $router['id']; ?>">Видалити</a></td>
				</tr>	
			<?}?>
	</table>

<?php
  require_once ROOT."/views/admin/footer.php";
?>

