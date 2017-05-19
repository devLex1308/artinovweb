<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
	<table class="table">
		<tr>
			<th>id</th>
			<th>Назва</th>
			<th>Вид транспорту</th>
			<th>Маршрут</th>
			<th>Редагувати</th>
			<th>Видалити</th>
		</tr>
		<?php
			foreach ($transports as $key => $transport) { ?>
				<tr>
					<td><?php echo $transport['id']; ?></td>
					<td><?php echo $transport['name']; ?></td>
					<td><?php 
					foreach ($carriages as $key => $carriage) {
						if($carriage['id'] == $transport['carriage_id'])
						echo $carriage['name']; 
					}
					?></td>
					<td><?php 
					foreach ($routes as $key => $route) {
						if($transport['route_id'] == $route['id'])
						echo "(№".$route['number'].") ".$route['name_start']." - ".$route['name_end']; 
					}
					?></td>

					<td><a href="<?php echo LOCALPATH;?>/admin/transport/edit/<?php echo $transport['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/transport/delete/<?php echo $transport['id']; ?>">Видалити</a></td>
				</tr>	
			<?php } ?>
	</table>

<?php
  require_once ROOT."/views/admin/footer.php";
?>