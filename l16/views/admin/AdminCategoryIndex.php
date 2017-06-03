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
			<th>Видалити</th>
		</tr>
		<?php
			//print_r($stations);
			foreach ($categories as $key => $category) {?>
				<tr>
					<td><?php echo $category['id']; ?></td>
					<td><?php echo $category['name']; ?></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/category/edit/<?php echo $category['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/category/delete/<?php echo $category['id']; ?>">Видалити</a></td>
				</tr>	
			<?
			  }
		?>
	</table>

<?php
  require_once ROOT."/views/admin/footer.php";
?>

