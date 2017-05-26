var el = document.getElementById("tram-id");

var el1 = document.getElementById("tram-id-1");
var el2 = document.getElementById("trolleybus-id-1");
var el3 = document.getElementById("bus-id-1");

var t1 = document.getElementById("tram-txt");

if(!el1.checked && !el2.checked && !el3.checked){
	el.style.backgroundImage="url(template/images/tram-1.png)";
	el1.checked="checked";
	$(t1).css({"color":"#fbb03b"});
}
function tram(id){

	var el1 = document.getElementById("tram-id");
	var el2 = document.getElementById("trolleybus-id");
	var el3 = document.getElementById("bus-id");

	var t1 = document.getElementById("tram-txt");
	var t2 = document.getElementById("trolleybus-txt");
	var t3 = document.getElementById("bus-txt");

	switch(id){
		case 'tram-id': {
			el1.style.backgroundImage="url(template/images/tram-1.png)";
			el2.style.backgroundImage="url(template/images/trolleybus.png)";
			el3.style.backgroundImage="url(template/images/bus.png)";

			$(t1).css({"color":"#fbb03b"});
			$(t2).css({"color":""});
			$(t3).css({"color":""});
			break;
		}
		case 'trolleybus-id': {
			el1.style.backgroundImage="url(template/images/tram.png)";
			el2.style.backgroundImage="url(template/images/trolleybus-1.png)";
			el3.style.backgroundImage="url(template/images/bus.png)";

			$(t1).css({"color":""});
			$(t2).css({"color":"#fbb03b"});
			$(t3).css({"color":""});
			break;
		}
		case 'bus-id': {
			el1.style.backgroundImage="url(template/images/tram.png)";
			el2.style.backgroundImage="url(template/images/trolleybus.png)";
			el3.style.backgroundImage="url(template/images/bus-1.png)";

			$(t1).css({"color":""});
			$(t2).css({"color":""});
			$(t3).css({"color":"#fbb03b"});
			break;
		}
	}
}