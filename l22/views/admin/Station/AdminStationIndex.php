<?php
require_once ROOT."/views/admin/header.php";
if(isset($_POST['station'])){
	if(!empty($_POST['id_station'])){
		echo '<script type="text/javascript">
           window.location = "'.LOCALPATH.'/admin/station/edit/'.$_POST['id_station'].'"
      	</script>';
	}
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
	.custom-combobox {
		position: relative;
		display: inline-block;
	}
	.custom-combobox-toggle {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -1px;
		padding: 0;
	}
	.custom-combobox-input {
		margin: 0;
		padding: 5px 10px;
	}
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
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="forwardDirection">
					<form method="POST">
						<select class="form-control" id="forwardDirection" name="id_station" required>
							<?php
							if(!empty($stations_select)){
								foreach ($stations_select as $key => $station_select) {
									echo "<option "; echo " value=".$station_select['id'].">".$station_select['name']."</option>";
								}
							}
							?>
						</select>
						<button type="submit" name="station" class="btn btn-default">Редагувати</button>
					</form>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover table-condensed">
						<tr>
							<th>id</th>
							<th>Назва</th>
							<th>Редагувати</th>
							<th>Видалити</th>
						</tr>
						<?php
						foreach ($stations as $key => $station) {
							$edit = '<span class="custom glyphicon glyphicon-pencil"></span>';
							$delete = '<span class="custom  glyphicon glyphicon-trash" aria-hidden="true"></span>';
							?>
							<tr>
								<td><?php echo $station['id']; ?></td>
								<td><?php echo $station['name']; ?></td>
								<td><a href="<?php echo LOCALPATH;?>/admin/station/edit/<?php echo $station['id']; ?>"><?php echo $edit?></a></td>
								<td>
									<button class="deleteAjax" data-nameModel="station" data-id="<?php echo $station['id']; ?>"><?php echo $delete?></button>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
				<?php
				if($countPage > 1){
					echo "<ul class='pagination'>";
					for ($i = 1; $i <= $countPage; $i++) {
						if($page==$i){
							echo "<li class='active'><a href='".LOCALPATH."/admin/station/$i' >$i</a></li>";
						}else{
							echo "<li><a href='".LOCALPATH."/admin/station/$i'>$i</a></li>";
						}

					}
					echo "</ul>";
				}
				?>
				<script src="<?php echo LOCALPATH; ?>/template/js/routeEdit.js"></script> 
			</div>
		</div>
	</div>
	<?php
	require_once ROOT."/views/admin/footer.php";
	?>
