$(document).ready(function(){
	var map = L.map('map', {
		crs: L.CRS.Simple,
		minZoom: -1,
		maxZoom: 4
	});

	var bounds = [[0,0], [1066,1920]];
	var LOCALPATH = $("#LOCALPATH").val();
	var mapUrl = LOCALPATH + "/template/images/map.svg";
	//console.log(mapUrl);
	var image = L.imageOverlay(mapUrl, bounds).addTo(map);

	map.fitBounds(bounds);

	$(".showRoute").click(function(e){


		e.preventDefault();
		var id = $(this).attr('id');
		var LOCALPATH = $("#LOCALPATH").val();

		var server = LOCALPATH+"/ajax";
		var oData = {
			"id":id,
			"action":"routeStation"
		};

		$.ajax({

			cache: false,
			timeout: 15000,
      url: server,//SERVER_NAME,
      type: "POST",
      data: (oData),

      beforeSend: function () {

      },

      success: function (data, textStatus, jqXHR) {
      	var arr = JSON.parse(data);
      	
      	var arrLength = [];
      	for (var i = 0; i < arr.length; i++) {
      		for (var x = 0; x < arr[i].length; x++) {
      			arrLength.push(arr[i][x]);
      		}
      	}
      	
      	var num = 0;
      	var lat;
      	var lng;
      	arrLength.forEach(function(item, i, arr) {
      		if(num == 0){
      			lat = item;
      		} else if(num == 1){
      			lng = item;

      			var marker = L.marker([lat,lng],
      				{draggable: false}
      				).addTo(map);

      			num = -1;
      		}
      		num++;
      	});

      	var polyline = L.polyline(arr, {color: 'yellow'}).addTo(map);
				// zoom the map to the polyline
				map.fitBounds(polyline.getBounds());
			},

			error: function (jqXHR, textStatus, errorThrown) {

			},
			complete: function (jqXHR, textStatus) {
			}

		});
	});

	showRouteStation();
	
});

function showRouteStation(){


	var LOCALPATH = $("#LOCALPATH").val();

	var url = window.location.href;
	var aUrl = url.split("/");
	var id = aUrl[aUrl.length - 1];

	var server = LOCALPATH+"/ajax";
	var oData = {
		"id":id,
		"action":"routeStationInfo"
	};

	$.ajax({

			cache: false,
			timeout: 15000,
      url: server,//SERVER_NAME,
      type: "POST",
      data: (oData),

      beforeSend: function () {

      },

      success: function (data, textStatus, jqXHR) {
      	var arr = JSON.parse(data);

      	console.log(arr);
      	
    //   	var arrLength = [];
    //   	for (var i = 0; i < arr.length; i++) {
    //   		for (var x = 0; x < arr[i].length; x++) {
    //   			arrLength.push(arr[i][x]);
    //   		}
    //   	}
      	
    //   	var num = 0;
    //   	var lat;
    //   	var lng;
    //   	arrLength.forEach(function(item, i, arr) {
    //   		if(num == 0){
    //   			lat = item;
    //   		} else if(num == 1){
    //   			lng = item;

    //   			var marker = L.marker([lat,lng],
    //   				{draggable: false}
    //   				).addTo(map);

    //   			num = -1;
    //   		}
    //   		num++;
    //   	});

    //   	var polyline = L.polyline(arr, {color: 'yellow'}).addTo(map);
				// // zoom the map to the polyline
				// map.fitBounds(polyline.getBounds());
			},

			error: function (jqXHR, textStatus, errorThrown) {

			},
			complete: function (jqXHR, textStatus) {
			}

		});

}


// $(document).ready(function(){
// 	var map = L.map('map', {
// 	    crs: L.CRS.Simple,
// 	    inZoom: -2,
// 		maxZoom: 3
// 	});

// 	var bounds = [[0,0], [1920,1066]];
// 	var LOCALPATH = $("#LOCALPATH").val();
// 	var mapUrl = LOCALPATH+"/views/css/images/map.svg";
// 	console.log(mapUrl);
// 	var image = L.imageOverlay(mapUrl, bounds).addTo(map);

// 	map.fitBounds(bounds);

// 	var lat = $("input[name='map_x']").val();
// 	var lng = $("input[name='map_y']").val();

// 	if(!lat){lat = 970;}
// 	if(!lng){lng = 640;}

// 	var marker = L.marker([lat,lng],
// 		{draggable: true}
// 	).addTo(map);


// 	marker.on('dragend', function(){
// 		var xy = this.getLatLng();
// 		console.log("x="+xy.lat+" y="+xy.lng);
// 		$("input[name='map_x']").val(xy.lat);
// 		$("input[name='map_y']").val(xy.lng);

// 	});

// 	marker2 = L.marker([1050, 530],
// 					{draggable: true}
// 				).addTo(map);
// 	marker2.on('dragend', function(){
// 		var xy = this.getLatLng();
// 		console.log("x="+xy.lat+" y="+xy.lng);
// 		$("input[name='map_x']").val(xy.lat);
// 		$("input[name='map_y']").val(xy.lng);
// 	});

// 	var x1 = 1203.5;
// 	var y1 = 559;

// 	var x2 = 970;
// 	var y2 = 558.25;

// 	var step = 100;

// 	var dx = (x2 - x1) / step;
// 	var dy = (y2 - y1) / step;

// 	var x = x1;
// 	var y = y1;

// 	var i = 0;

// 	var route = [
// 		[971.5, 636, 0],
// 		[970, 558.25, 100],
// 		[1203.5,559,300],
// 		[1184,428.5,350]
// 	]

// 	var bus = new Transport(route, map);

// 	var setIntervsl = setInterval(function(){
// 		bus.update();

// 	},20);

// 	console.log(route[0][1]);
// });

// function Transport(route,map){
// 	var x;
// 	var y;
// 	var _route;
// 	var xEnd;
// 	var yEnd;
// 	var currentStation;
// 	var dx;
// 	var dy;
// 	var _marker;
// 	var deltaTime;
// 	var currentTime;
// 	var maxStation;

// 	this.init = function(route,map){
// 		x = route[0][0];
// 		y = route[0][1];
// 		currentStation = 0;
// 		xEnd = route[currentStation+1][0];
// 		yEnd = route[currentStation+1][1];

// 		deltaTime = route[currentStation+1][2]-route[currentStation][2];

// 		dx = (xEnd-route[currentStation][0])/deltaTime;
// 		dy = (yEnd-route[currentStation][1])/deltaTime;

// 		_marker = L.marker([x, y]).addTo(map);
// 		currentTime = 0;
// 		maxStation = route.length;
// 		console.log(maxStation);
// 	}

// 	this.update = function(){
// 		if(currentTime < deltaTime){
// 			x += dx;
// 			y += dy;
// 			_marker.setLatLng([x, y]);
// 			currentTime++;
// 		} else {
// 			currentStation++;
// 			if(currentStation < maxStation){
// 				currentStation++;
// 			}
// 			this.changeStation();
// 		}
// 	}

// 	this.changeStation = function(){
// 		xEnd = route[currentStation + 1][0];
// 		yEnd = route[currentStation + 1][1];

// 		deltaTime = route[currentStation + 1][2] - route[currentStation][2];

// 		dx = (xEnd - route[currentStation][0]) / deltaTime;
// 		dy = (yEnd - route[currentStation][1]) / deltaTime;

// 		currentTime = 0;
// 	}

// 	this.init(route, map);
// }