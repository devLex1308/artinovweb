<?php
require_once ROOT."/views/admin/header.php";
?>
<style>
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
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th>id</th>
						<th>Назва</th>
						<th>Редагувати</th>
						<th>Видалити</th>
						<th>Видалити через ajax</th>
					</tr>
					<?php
					foreach ($stations as $key => $station) {
						$edit = '<span class="custom glyphicon glyphicon-pencil"></span>';
						$delete = '<span class="custom  glyphicon glyphicon-trash" aria-hidden="true"></span>';
						?>
						<tr>
							<td><?php echo $station['id']; ?></td>
							<td><?php echo $station['name']; ?></td>
							<td><a href="<?php echo LOCALPATH;?>/admin/station/edit/<?php echo $station['id']; ?>"><?php $edit?></a></td>
							<td><a href="<?php echo LOCALPATH;?>/admin/station/delete/<?php echo $station['id']; ?>"><?php $delete?></a></td>
							<td>
								<button class="deleteAjax" data-nameModel="station" data-id="<?php echo $station['id']; ?>"><?php $delete?></button>
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

			require_once ROOT."/views/admin/footer.php";
			?>
		</div>
	</div>
</div>