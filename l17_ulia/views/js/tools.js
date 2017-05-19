//alert("Привіт!");
/*

console.log("Test");

*/

var nameUser = "Саша";
var string = "Користувача звати " + nameUser;
console.log(string);

var a = 50;
var b = 5;
var plus = a + b;
var minus = a - b;
var devision = a / b;
var zalushok =  a%b;

console.log("plus = " + plus + " minus = " + minus + " devision = " + devision + " zalushok = " + zalushok);

console.log("Порівнюєм 2 числа a ="+a+" ; b = "+b);

if(a<=b||nameUser=="Таня"){
	console.log("Число a більше за b");
}else{
	console.log("Число b більше за a");
}

var bool = true;
bool = false;

if(bool){
	console.log("Умова справджується");
}

var array = [1,3,5,675,254];

console.log(array[3]);

for (var i = 10; i >= 0; i-=2) {
	console.log("i="+i);
}

var dayNumber = 2;

switch(dayNumber){
	case 1: console.log("Понеділок"); 
		break;
	case 2: console.log("Вівторок"); 
		break;
	default : 
		console.log("Такого дня в тижні не існує");
		break; 
}

var i = 0;
while(i<100){
	console.log("i="+i);
	i+=10;
}

function Ax2bxc(a,b,c){
	var D = Math.pow(b,2) - 4*a*c;
	console.log(D);
	if(D>=0){
		var x1 = (-b + Math.sqrt(D))/(2*a);
		var x2 = (-b - Math.sqrt(D))/(2*a);
		console.log("x1 = " + x1 + " x2 = " + x2);
	}else{
		console.log("Рішення немає");
	}
}

Ax2bxc(1,2,3);
Ax2bxc(4,2,5);
Ax2bxc(1,10,1);

var user = {
	"name" : "Саша",
	"age"  : 27,
	"gender" : "man",
	"f" : function(a){
		console.log(a*a);
	}
};

user.name = "Микола";
user.city = "Вінниця";

user.f(3);


console.log(user);
console.log(user.name);
