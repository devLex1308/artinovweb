$(document).ready(function(){
	var map = L.map('map', {
	    crs: L.CRS.Simple
	});

	var bounds = [[0,0], [1920,1066]];
	var image = L.imageOverlay('map.svg', bounds).addTo(map);
});