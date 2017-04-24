<?php 

interface Drive
{
	//Метод що забезпечує реалізацію руху вперід
	function go(); 
	//Метод що забезпечує реалізацію зупинки
	function stop();
}

interface Fly
{
	function up();
	function down();
}