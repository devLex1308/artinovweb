<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
	<table class="table">
		<tr>
			<th>id</th>
			<th>Назва</th>
			<th>Редагувати</th>
			<th>Видалити</th>
		</tr>
		<?php
			//print_r($stations);
			foreach ($stations as $key => $station) {?>
				<tr>
					<td><?php echo $station['id']; ?></td>
					<td><?php echo $station['name']; ?></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/station/edit/<?php echo $station['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/station/delete/<?php echo $station['id']; ?>">Видалити</a></td>
				</tr>	
			<?}?>
	</table>

<?php
  require_once ROOT."/views/admin/footer.php";
?>

