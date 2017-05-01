<?php

/**
* 
*/
class Station 
{
	
	function __construct()
	{
		
	}

	public function actionIndex(){
		echo "Сторінка виводу всіх зупинка";
		return true;
	}

	public function actionCreate(){
		echo "Сторінка створення зупинки";
		return true;
	}

	public function actionEdit(){
		echo "Сторінка редагування зупинки";
		return true;
	}

	public function actionDelete(){
		echo "Сторінка видалення зупинки";
		return true;
	}
}

