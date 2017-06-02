<?php
require_once ROOT."/views/admin/header.php";
?>
<style>
	#map{
		min-height: 530px;
		width: 100%;
	}
</style>
<script src="<?php echo LOCALPATH; ?>/template/js/leaflet.js"></script>
<link rel="stylesheet" href="<?php echo LOCALPATH; ?>/template/css/leaflet.css">
<script src="<?php echo LOCALPATH; ?>/template/js/routeWay.js"></script>
<div class="container" style="padding-top: 1%;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 create-station">
			<button class="showRoute" id="<?php echo $id; ?>">Покажи маршрут</button>
			<div id="map"></div>
		</div>
	</div>
</div>

<?php
require_once ROOT."/views/admin/footer.php";
?>