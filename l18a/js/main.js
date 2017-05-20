var KEY_LEFT = 37;
var KEY_TOP = 38;
var KEY_RIGHT = 39;
var KEY_DOWN = 40;

var POINT_STATUS_MOVE_TOP = 0;
var POINT_STATUS_MOVE_RIGHT = 1;
var POINT_STATUS_MOVE_DOWN = 2;
var POINT_STATUS_MOVE_LEFT = 3;

$(document).ready(function () {
	var displayWidth = $("#display").data("width");
	var displayHeight = $("#display").data("height");
	console.log(displayWidth+" "+displayHeight);

	// $("#position_4_17").addClass("point");
	// var x = 4;
	// var y = 5;
	var point1 = new Point(10,3);

	setInterval(function(){
		point1.update();
	},1000);

	$("body").keydown(function(e){

    switch((e.keyCode ? e.keyCode : e.which)){

    	case KEY_LEFT:
    		point1.setPointStatus(POINT_STATUS_MOVE_LEFT);
    		console.log("Клавіша вліво");
    		break;
    	case KEY_TOP:
    		point1.setPointStatus(POINT_STATUS_MOVE_TOP);
    		console.log("Клавіша вверх");
    		break;
    	case KEY_RIGHT:
    		point1.setPointStatus(POINT_STATUS_MOVE_RIGHT);
    		console.log("Клавіша вправо");
    		break;
    	case KEY_DOWN:
    		point1.setPointStatus(POINT_STATUS_MOVE_DOWN);
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
	var _pointStatus;
	this.init = function(x,y){
		_x = x;
		_y = y;
		_pointStatus = POINT_STATUS_MOVE_RIGHT;
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
	this.setPointStatus = function(status){
		_pointStatus = status;
	}
	this.showPoint = function(){
		$("#position_"+_x+"_"+_y).addClass("point");
	}
	this.removePoint = function(){
		$("#position_"+_x+"_"+_y).removeClass("point");
	}

	this.update = function(){
		switch(_pointStatus){
			case POINT_STATUS_MOVE_TOP: 
				this.top();
				break;
			case POINT_STATUS_MOVE_RIGHT: 
				this.right();
				break;
			case POINT_STATUS_MOVE_DOWN: 
				this.down();
				break;
			case POINT_STATUS_MOVE_LEFT: 
				this.left();
			break;
		}
	}

	this.init(x,y);
}
