<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<th>id</th>
			<th>Назва</th>
	    	<th>Тип транспорту</th>
			<th>Редагувати</th>
			<th>Заповнення маршруту</th>
			<th>Видалити</th>
		</tr>
		<?php
			if(!empty($routes)){
			foreach ($routes as $key => $router) {
		?>
				<tr>
					<td><?php echo $router['id']; ?></td>
					<td><?php echo $router['number']." ".$router['name_start']."-".$router['name_end']; ?></td>
					<td><?=$carriage_name[$key]['name']; ?></td>
					<td><a href="<?php echo LOCALPATH; ?>/admin/route/edit/<?=$router['id']; ?>">Редагувати</a></td>
					<td><a href="<?php echo LOCALPATH; ?>/admin/route/fill/<?=$router['id']; ?>">Заповнити маршрут</a></td>
					<td><a href="<?php echo LOCALPATH; ?>/admin/route/delete/<?=$router['id']; ?>">Видалити</a></td>
				</tr>	
			<?php
				}
			}
			?>
	</table>
</div>
<?php

	if($countPage > 1){
		echo "<ul class='pagination'>";
		for ($i = 1; $i <= $countPage; $i++) { 
			if($page==$i){
				echo "<li class='active'><a href='".LOCALPATH."/admin/route/$i' >$i</a></li>";
			}else{
				echo "<li><a href='".LOCALPATH."/admin/route/$i'>$i</a></li>";
			}
			
		}
		echo "</ul>";
	}
	require_once ROOT."/views/admin/footer.php";
?>