$(document).ready(function(){
	var map = L.map('map', {
	    crs: L.CRS.Simple,
	    inZoom: -2,
		maxZoom: 3
	});

	var bounds = [[0,0], [1920,1066]];
	var image = L.imageOverlay('map.svg', bounds).addTo(map);

	map.fitBounds(bounds);

	var marker = L.marker([ 100, 100]).addTo(map);

	var coor = marker.getLatLng();
});