$(document).ready(function(){
// 	var map = L.map('map', {
// 	crs: L.CRS.Simple,
// 	minZoom: -1,
// 	maxZoom: 4
// });

// 	var bounds = [[0,0], [1066,1920]];
// 	var LOCALPATH = $("#LOCALPATH").val();
// 	var mapUrl = LOCALPATH + "/template/images/map.svg";
// 	//console.log(mapUrl);
// 	var image = L.imageOverlay(mapUrl, bounds).addTo(map);

// 	map.fitBounds(bounds);

// 	var lat = $("input[name='map_x']").val();
// 	var lng = $("input[name='map_y']").val();

// 	if(!lat){lat = 550;}
// 	if(!lng){lng = 960;}

// 	var marker = L.marker([lat,lng],
// 		{draggable: true}
// 		).addTo(map);

// 	marker.on('dragend', function(){
// 		var xy = this.getLatLng();
// 		console.log("x=" + xy.lat+" y=" + xy.lng);
// 		$("input[name='map_x']").val(xy.lat);
// 		$("input[name='map_y']").val(xy.lng);
// 	});

// 	console.log("Підключено скрізь в адмінці");

	$(".deleteAjax").click(function(){
		var nameModel = $(this).attr("data-nameModel");
		var id = $(this).attr("data-id");
		var parent = $(this).parent().parent();
		console.log(nameModel+" "+id);
		deleteAjax(nameModel,id,parent);
	});
});

function deleteAjax(nameModel,id,parent){

	var LOCALPATH = $("#LOCALPATH").val();

	var server = LOCALPATH+"/ajax";
	var oData = {
		"nameModel":nameModel,
		"id":id,
		"action":"delete"
	};

	$.ajax({

		cache: false,
		timeout: 10000,
	    url: server,//SERVER_NAME,
	    type: "POST",
	    data: (oData),

	    beforeSend: function () {
	    	parent.hide();

	    },

	    success: function (data, textStatus, jqXHR) {
            	// if(data==1){
            		// console.log(data);
            		parent.remove();
            	// }else{
            	// 	parent.show();
            	// 	alert(data);
            	// }

            },

            error: function (jqXHR, textStatus, errorThrown) {
            	parent.show();

            },
            complete: function (jqXHR, textStatus) {
            }

        });
}