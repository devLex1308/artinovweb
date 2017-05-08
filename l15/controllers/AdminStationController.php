<?php
require_once ROOT."/models/Station.php";
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
		if(isset($_POST['createStation'])){
			Station::createStation(
									$_POST['name'],
									$_POST['description'],
									$_POST['is_real'],
									$_POST['neighboring_stop'],
									$_POST['map_x'],
									$_POST['map_y'],
									$_POST['latitude'],
									$_POST['longitude']
								);
		}
		require_once ROOT."/views/admin/AdminStationCreate.php";
		return true;
	}

	public function actionEdit($id){
		$title = "Редагування зупинки $id";
		require_once ROOT."/views/admin/AdminStationEdit.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення зупинки $id";
		require_once ROOT."/views/admin/AdminStationDelete.php";
		return true;
	}
}

