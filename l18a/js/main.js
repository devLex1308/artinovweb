var KEY_LEFT = 37;
var KEY_TOP = 38;
var KEY_RIGHT = 39;
var KEY_DOWN = 40;

$(document).ready(function () {
	var displayWidth = $("#display").data("width");
	var displayHeight = $("#display").data("height");
	console.log(displayWidth+" "+displayHeight);

	// $("#position_4_17").addClass("point");
	// var x = 4;
	// var y = 5;
	var point1 = new Point(10,3);

	// setInterval(function(){
	// 	point1.down();
	// 	point1.left();
	// },1000);

	$("body").keydown(function(e){

    switch((e.keyCode ? e.keyCode : e.which)){

    	case KEY_LEFT:
    		point1.left();
    		console.log("Клавіша вліво");
    		break;
    	case KEY_TOP:
    		point1.top();
    		console.log("Клавіша вверх");
    		break;
    	case KEY_RIGHT:
    		point1.right();
    		console.log("Клавіша вправо");
    		break;
    	case KEY_DOWN:
    		point1.down();
    		console.log("Клавіша вниз");
    		break;
        default:
            console.log("Код натиснутої клавіші "+e.keyCode);
            break;
            }
    });


});

function Point(x,y){
	var _x;
	var _y;
	this.init = function(x,y){
		_x = x;
		_y = y;
		this.showPoint();
	}

	this.top = function(){
		this.removePoint();
		_y--;
		this.showPoint();
	}
	this.down = function(){
		this.removePoint();
		_y++;
		this.showPoint();
	}
	this.left = function(){
		this.removePoint();
		_x--;
		this.showPoint();
	}
	this.right = function(){
		this.removePoint();
		_x++;
		this.showPoint();
	}
	this.showPoint = function(){
		$("#position_"+_x+"_"+_y).addClass("point");
	}
	this.removePoint = function(){
		$("#position_"+_x+"_"+_y).removeClass("point");
	}
	this.init(x,y);
}
