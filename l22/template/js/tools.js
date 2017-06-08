$(document).ready(function(){

	// 	console.log("Підключено скрізь в адмінці");
	var startFrom = 2;

	$(".deleteAjax").click(function(){
		var nameModel = $(this).attr("data-nameModel");
		var id = $(this).attr("data-id");
		var parent = $(this).parent().parent();
		console.log(nameModel+" "+id);
		var ask = confirm("Ви справді бажаєте це зробити???");
		if(ask){
			deleteAjax(nameModel,id,parent);
		}
	});

	$("#moreNews").click(function(){
		var LOCALPATH = $("#LOCALPATH").val();

		var server = LOCALPATH+"/ajax";
		var oData = {
			"startFrom":startFrom,
			"action":"moreNews"
		};

		$.ajax({

			cache: false,
			timeout: 10000,
			url: server,
			type: "POST",
			data: (oData),

			beforeSend: function () {

			},

			success: function (data) {
				
				data = jQuery.parseJSON(data);

				if(data.length > 0){
					$.each(data, function(index, data){

						var date = new Date(data.time_create);
						var time_create = ('0' + date.getDate()).slice(-2) + '.' + ('0' + (date.getMonth() + 1)).slice(-2) + '.' + date.getFullYear();

						$(".allNews").append('<div class="row" align="center"><div class="block-news"><a href="' + LOCALPATH + '/news/' + data.id + '"><div class="image-news-block"><div class="image-news" style="background: url(resourses/images/' + data.resources_id + ') no-repeat center center; background-size: cover;"></div></div><div class="head-text-news">' + data.name + '</div><div class="text-news">' + data.description + '...</div><div class="block-time"><div class="time-image"></div><div class="text-time">' + time_create + '</div></div></a></div></div>');
					});
					startFrom += 1;
				} else {
					document.getElementById('moreNews').style.display = 'none';
				}
			},

			error: function (jqXHR, textStatus, errorThrown) {

			},
			complete: function (jqXHR, textStatus) {
			}

		});
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

function isLastElement(){

		var LOCALPATH = $("#LOCALPATH").val();
		var zero = 0;
		var server = LOCALPATH+"/ajax";
		var oData = {
			"action":"countNews"
		};

		$.ajax({

			cache: false,
			timeout: 10000,
			url: server,
			type: "POST",
			data: (oData),

			beforeSend: function () {

			},

			success: function (data) {
				data = jQuery.parseJSON(data);
				zero = data.length;
			},

			error: function (jqXHR, textStatus, errorThrown) {

			},
			complete: function (jqXHR, textStatus) {
			}

		});
	return zero;
}