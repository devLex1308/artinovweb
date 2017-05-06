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
		$title = "Вивід всіх зупинок";
		require_once ROOT."/views/admin/AdminStationIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення зупинки";
		require_once ROOT."/views/admin/AdminStationCreate.php";
		return true;
	}

	public function actionEdit($id){
		$title = "Редагування зупинки $id";
		require_once ROOT."/views/admin/AdminStationEdit.php";
		return true;
	}

	public function actionDelete(){
		$title = "Видалення зупинки";
		require_once ROOT."/views/admin/AdminStationDelete.php";
		return true;
	}
}

