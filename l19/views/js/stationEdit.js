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

	var marker = L.marker([ 1, 1]).addTo(map);

	var coor = marker.getLatLng();
});