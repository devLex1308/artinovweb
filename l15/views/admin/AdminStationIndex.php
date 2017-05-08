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
		<tr>
			<td>14</td>
			<td>Площа перемоги</td>
			<td><a href="<?php echo LOCALPATH;?>/admin/station/edit/14">Редагувати</a></td>
			<td><a href="<?php echo LOCALPATH;?>/admin/station/delete/14">Видалити</a></td>
		</tr>
	</table>

<?php
  require_once ROOT."/views/admin/footer.php";
?>

