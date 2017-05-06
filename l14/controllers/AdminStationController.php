<?php

/**
* 
*/
class AdminStationController 
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

	public function actionEdit($id){
		echo "Сторінка редагування зупинки № $id";
		return true;
	}

	public function actionDelete(){
		echo "Сторінка видалення зупинки";
		return true;
	}
}

