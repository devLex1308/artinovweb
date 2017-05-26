<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<link rel="stylesheet" type="text/css" href="leaflet.css">
			<script src="main.js"></script>
			<script src="leaflet.js"></script>
			
			<title>
					PHP
			</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="index.html">Головна</a>
			</nav>
		</header>
		<div id="content">
			<center>
    <h1>Редагування зупинки <b>&lt;Вул. Маяковського&gt;</b></h1>

    <form action="" method="POST" style="max-width: 500px;">
            <style>
            #map{
                min-height: 400px;
            }
        </style>

        <div class="form-group">
            <label>Введіть назву нової зупинки:</label>
            <input class="form-control" type="text" name="name" placeholder="name" value="Вул. Маяковського" required="">
        </div>

        <div class="form-group">
            <label>Додайте опис до зупинки (не обов'язково):</label>
            <textarea class="form-control" cols="30" name="description" placeholder="description">вапвапвап</textarea>
        </div>

        <div class="form-group">
            <b>Чи це справжня зупинка чи необхідна для руху по карті?</b>
            <div class="material-switch pull-left">
                <input id="someSwitchOptionWarning" name="is_real" type="checkbox" checked="">
                <label for="someSwitchOptionWarning" class="label-warning"></label>
            </div>
        </div>

        <div class="form-group">
            <label>Утримуючи клавішу <b>Shift</b> Виберіть сусідні зупинки або зв`язані:</label>
            <select class="form-control" size="5" name="neighboring_stop[]" multiple="" required="">
                <option value="2">Вул. Маяковського</option><option value="3">Вул. Івана Федорова</option><option value="4">Вул. 50-річчя перемоги</option><option value="5">Вул. Івана Сірка</option><option value="6">Келецька</option><option value="7">Грушевського</option><option value="8">Вул. Площа Гагаріна</option><option value="9">Артинова</option><option value="10">Вул. Адміна</option><option value="11">Барське шоссе</option><option value="12">Соборна</option><option value="13">Вул. Замкова</option><option value="14">Технічний університет</option>            </select>
        </div>
        <div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(13px, 14px, 0px);"><div class="leaflet-pane leaflet-tile-pane"></div><div class="leaflet-pane leaflet-shadow-pane"><img src="http://artinow.ln/l19/views/css/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(-3904px, 7256px, 0px);"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"><img src="http://artinow.ln/l19/views/css/images/marker-icon.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" tabindex="0" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(-3904px, 7256px, 0px); z-index: 7256;"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(4149px, -7078px, 0px) scale(4);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in leaflet-disabled" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">-</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a></div></div></div></div>
        <div class="form-group">
            <label>Додайте Координату X на карті схемі:</label>
            <input class="form-control" type="number" name="map_x" placeholder="map_x(25,2123)" step="0.0001" value="123" required="">
        </div>

        <div class="form-group">
            <label>Додайте Координату Y на карті схемі:</label>
            <input class="form-control" type="number" name="map_y" placeholder="map_y(45,1113)" step="0.0001" value="12" required="">
        </div>

        <div class="form-group">
            <label>Додайте Широту:</label>
            <input class="form-control" type="text" name="latitude" placeholder="28° 28'" value="52" required="">
        </div>

        <div class="form-group">
            <label>Додайте Довготу:</label>
            <input class="form-control" type="text" name="longitude" placeholder="28° 28'" value="45" required="">
        </div>

        <div class="form-group">
            <button type="submit" name="editStation" class="btn btn-default">Редагувати Зупинку</button>
        </div>
        
    </form>
</center>
		</div>
		<footer>
			
		</footer>		
	</body>
</html>