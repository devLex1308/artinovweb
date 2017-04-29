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

interface Running
{
	function runningStart();
	function runningStop();
}
interface Hunting
{
	function findTarget();
	function killTarget();
}
interface PlayingWithBall
{
	function findingBall();
	function goingCrazyWithBall();
}
interface SaySomething
{
	function makeSound();
}