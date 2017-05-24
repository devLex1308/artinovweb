$(document).ready(function() {
	console.log("Test");
	var map = L.map('map', {
		crs: L.CRS.Simple,
		minZoom: -2,
		maxZoom: 3
	});

	var bounds = [[0,0], [1920,1066]];
	var image = L.imageOverlay('map.svg', bounds).addTo(map);

	map.fitBounds(bounds);

	var marker = L.marker([1000, 530]).addTo(map);

	// var coor = marker.getLatLng();
	// console.log(coor);
	// var t=10;
	// $("#but").click(function(){
	// 	t+=10;
	// 	marker.setLatLng([t,t]);
	// 	marker.setOpacity(0.005*t);
	// 	travel.remove();
	// });



 	marker = L.marker([1050,530],
	 				{draggable: true}
	 			).addTo(map);


	marker.on('dragend', function(){
		var xy = this.getLatLng();
		console.log("x="+xy.lat+" y="+xy.lng);
		$("input[name='map_x']").val(xy.lat);
		$("input[name='map_y']").val(xy.lng);

	});


	var x1=1203.5;
	var y1=559;

	var x2=970;
	var y2=558.25;

	var step = 100;

	var dx = (x2-x1)/step;
	var dy = (y2-y1)/step;


	var x = x1;
	var y = y1;
	var i = 0;

	

	var route = [
			[971.5,636,0],
			[970,558.25,100],
			[1203.5,559,300],
			[1184,428.5,350]	
		]

	var bus = new Transport(route,map);


	var setIntervsl = setInterval(function(){
		
		bus.update();
	
	},20);

	console.log(route[0][1]);
	// var travel = L.polyline([[150,150], [600,500],[20,500],[400,300]]).addTo(map);

	//var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

});


function Transport(route,map){
	var x;
	var y;
	var _route;
	var xEnd;
	var yEnd;
	var currentStation;
	var dx;
	var dy;
	var _marker;
	var deltaTime;
	var currentTime;
	var maxStation;

	this.init = function(route,map){
		x = route[0][0];
		y = route[0][1];
		currentStation = 0;
		xEnd = route[currentStation+1][0];
		yEnd = route[currentStation+1][1];

		deltaTime = route[currentStation+1][2]-route[currentStation][2];

		dx = (xEnd-route[currentStation][0])/deltaTime;
		dy = (yEnd-route[currentStation][1])/deltaTime;

		_marker = L.marker([x, y]).addTo(map);
		currentTime = 0;
		maxStation = route.length;
		console.log(maxStation);
	}



	this.update = function(){
		
		if(currentTime<deltaTime){
			x+=dx;
			y+=dy;
			_marker.setLatLng([x,y]);
			currentTime++;
		}else{
			currentStation++;
			if(currentStation>=maxStation){
				currentStation = 0;
			}
			this.changeStation();
		}
		
	}

	this.changeStation = function(){
		xEnd = route[currentStation+1][0];
		yEnd = route[currentStation+1][1];

		deltaTime = route[currentStation+1][2]-route[currentStation][2];

		dx = (xEnd-route[currentStation][0])/deltaTime;
		dy = (yEnd-route[currentStation][1])/deltaTime;

		currentTime = 0;
	}



	this.init(route,map);
}
