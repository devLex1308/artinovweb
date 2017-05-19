<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
	<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<th>id</th>
			<th>Назва</th>
			<th>Вид транспорту</th>
			<th>Редагувати</th>
			<th>Видалити</th>
		</tr>
		<?php
			foreach ($transports as $key => $transport) {?>
				<tr>
					<td><?php echo $transport['id']; ?></td>
					<td><?php echo $transport['name']; ?></td>
					<td><?php echo $transport['carriage_name']; ?></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/transport/edit/<?php echo $transport['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH;?>/admin/transport/delete/<?php echo $transport['id']; ?>">Видалити</a></td>
				</tr>	
			<?}?>
	</table>

<?php

	if($countPage>1){
		echo "<ul class='pagination'>";
		for ($i=1; $i <= $countPage; $i++) { 
			if($page==$i){
				echo "<li class='active'><a href='".LOCALPATH."/admin/transport/$i' >$i</a></li>";
			}else{
				echo "<li><a href='".LOCALPATH."/admin/transport/$i'>$i</a></li>";
			}
			
		}
		echo "</ul>";
	}

  require_once ROOT."/views/admin/footer.php";
?>

