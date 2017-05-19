<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
	<table class="table">
		<tr>
			<th>id</th>
			<th>Назва</th>
			<th>id автора</th>
			<th>Час створення</th>
			<th>Редагувати</th>
			<th>Видалити</th>
		</tr>
		<?php
			//print_r($stations);
			foreach ($articles as $key => $article) {?>
				<tr>
					<td><?php echo $article['id']; ?></td>
					<td><?php echo $article['name']; ?></td>
					<td><?php echo $article['user_id']; ?></td>
					<td><?php echo $article['time_create']; ?></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/article/edit/<?php echo $article['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/article/delete/<?php echo $article['id']; ?>">Видалити</a></td>
				</tr>	
			<?php
			}
			?>
	</table>

<?php
  require_once ROOT."/views/admin/footer.php";
?>