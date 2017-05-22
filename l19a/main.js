$(document).ready(function() {
	console.log("Test");
	var map = L.map('map', {
		crs: L.CRS.Simple,
		minZoom: -2,
		maxZoom: 3
	});

	var bounds = [[0,0], [2420,4372]];
	var image = L.imageOverlay('map.svg', bounds).addTo(map);

	map.fitBounds(bounds);

	var marker = L.marker([ 100, 100]).addTo(map);

	var coor = marker.getLatLng();
	console.log(coor);
	var t=10;
	$("#but").click(function(){
		t+=10;
		marker.setLatLng([t,t]);
		marker.setOpacity(0.005*t);
		travel.remove();
	});



	marker2 = L.marker([300,300],
					{draggable: true}
				).addTo(map);


	marker2.on('dragend', function(){
		var xy = this.getLatLng();
		console.log("x="+xy.lat+" y="+xy.lng+" zoom="+map.getZoomScale());
		

	});


	var travel = L.polyline([[150,150], [600,500],[20,500],[400,300]]).addTo(map);

	//var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

});
