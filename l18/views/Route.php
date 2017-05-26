<?php
	require_once ROOT."/views/admin/header.php";
	$time_start = 0;
	$time_end = $route['delta_time_end']*60;
?>
<h1><?php echo $title; ?></h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
	    <tr>
	    	<th>№</th>
	    	<th>Назва зупинки -></th>
	    	<th>Час від початкової</th>
	    	<th>Назва зупинки <-</th>
	    	<th>Час від кінцевої</th>
	    	<th>Редагувати</th>
	    </tr>
	    <tr>
	    	<td><?=$id_start; ?></td>
	    	<td><?=$route['name_start']; ?></td>
	    	<td><?=$time_start; ?></td>
	    	<td><?=$route['name_end']; ?></td>
	    	<td><?=$time_end; ?></td>
	    	<td>Редагувати</td>
	    </tr>
		<?php
			if(!empty($id_stations_start)){
				foreach ($id_stations_start as $key => $id) {
					$time_start += $start_count;
					$time_end -= $end_count;
		?>
					<tr>
						<td><?=$id; ?></td>
						<td><?php 
						if(!empty($stations)) {
							foreach ($stations as $key => $station) {
								if($station['id'] == $id) echo $station['name'];
							}
						}
						?></td>
						<td><?=$time_start; ?></td>
						<td>Обратка</td>
						<td><?=$time_end; ?></td>
			    		<td>Редагувати</td>
					</tr>
		<?php 
				}
			}
		?>
	    <tr>
	    	<td><?=$id_end; ?></td>
	    	<td><?=$route['name_end']; ?></td>
	    	<td>Час від початкової</td>
	    	<td><?=$route['name_start']; ?></td>
	    	<td>Час від кінцевої</td>
	    	<td>Редагувати</td>
	    </tr>
    </table>
</div>
<?php
	require_once ROOT."/views/admin/footer.php";
?>