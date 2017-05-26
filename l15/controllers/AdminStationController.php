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
		$stations = Station::getAllStations();
		require_once ROOT."/views/admin/AdminStationIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення зупинки";
		if(isset($_POST['createStation'])){

			//ДЗ виправити предачу данних в метод createStation
			// Не передавати масив $_POST на пряму, поробити перевірки на вхідні дані
			// Створити масив $errors в який записувати всі помилки
			// У відображенні AdminStationCreate перед формою зробити перевірку чи цей масив є пустим і якщо не пустий то списком вивести всі помилки
			$arrayStation = [];

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
		if(isset($_POST['editStation'])){
			Station::editStation(
									$id,
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

		$title = "Редагування зупинки";
		$station = Station::getStationById($id);
		require_once ROOT."/views/admin/AdminStationEdit.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення зупинки $id";

		Station::deleteStationById($id);
		header("Location: ".LOCALPATH."admin/station");
		require_once ROOT."/views/admin/AdminStationDelete.php";
		return true;
	}
}

