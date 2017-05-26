$(document).ready(function(){
	$("#addStation1").click(function(e){
		e.preventDefault();
		var html ="<tr>" + $("#stationsDirect").html()+"</tr>";
		$("#forwardDirection").append(html);

		addActionDeleteStation();
	});

	addActionDeleteStation();
});

function addActionDeleteStation(){
	$(".deleteStation").unbind("click").click(function(e){
		e.preventDefault();
		console.log("Видаляєм зупинку");
		$(this).parent().parent().remove();
	});
}