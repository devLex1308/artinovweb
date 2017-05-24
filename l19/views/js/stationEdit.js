$(document).ready(function(){
	var map = L.map('map', {
	    crs: L.CRS.Simple,
	    inZoom: -2,
		maxZoom: 3
	});

	var bounds = [[0,0], [1920,1066]];
	var LOCALPATH = $("#LOCALPATH").val();
	var mapUrl = LOCALPATH+"/views/css/images/map.svg";
	console.log(mapUrl);
	var image = L.imageOverlay(mapUrl, bounds).addTo(map);

	map.fitBounds(bounds);

	var lat = $("input[name='map_x']").val();
	var lng = $("input[name='map_y']").val();

	if(!lat){lat = 970;}
	if(!lng){lng = 640;}

	var marker = L.marker([lat,lng],
		{draggable: true}
	).addTo(map);


	marker.on('dragend', function(){
		var xy = this.getLatLng();
		console.log("x="+xy.lat+" y="+xy.lng);
		$("input[name='map_x']").val(xy.lat);
		$("input[name='map_y']").val(xy.lng);

	});

});