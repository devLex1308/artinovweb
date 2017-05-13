<?php
require_once ROOT."/models/Route.php";
require_once ROOT."/models/Station.php";
/**
* 
*/
class AdminRouteController
{
	
	function __construct()
	{
		
	}

	public function actionIndex(){
		$title = "Вивід всіх маршрутів";
		$routers = Route::getAllRoutes();
		require_once ROOT."/views/admin/AdminRouteIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення маршруту";
		$countStation = 30;
		$stations = Station::getAllStations();
		if(isset($_POST['createRoute'])){
			//ДЗ виправити предачу данних в метод createStation
			// Не передавати масив $_POST на пряму, поробити перевірки на вхідні дані
			// Створити масив $errors в який записувати всі помилки
			// У відображенні AdminStationCreate перед формою зробити перевірку чи цей масив є пустим і якщо не пустий то списком вивести всі помилки
			$arrayRouter = [];

			Route::createRoute(
									$_POST['name_start'],
									$_POST['name_end'],
									$_POST['number'],
									$_POST['carriage_id'],
									$_POST['id_stations_start'],
									$_POST['id_stations_end'],
									$_POST['delta_time_start'],
									$_POST['delta_time_end']
								);
		}
		require_once ROOT."/views/admin/AdminRouteCreate.php";
		return true;
	}

	public function actionEdit($id){
		if(isset($_POST['editRoute'])){
			Route::editRoute(
									$id,
									$_POST['name_start'],
									$_POST['name_end'],
									$_POST['number'],
									$_POST['carriage_id'],
									$_POST['id_stations_start'],
									$_POST['id_stations_end'],
									$_POST['delta_time_start'],
									$_POST['delta_time_end']
								);
		}

		$title = "Редагування маршруту";
		$route = Route::getRouteById($id);
		require_once ROOT."/views/admin/AdminRouteEdit.php";
		return true;
	}

    public function actionFill($id){
		$stations_route = Route::getAllStationsRoute($id);
    	$stations = Route::getAllStations($id);
		if(isset($_POST['fillRoute'])){
            $station_id=$_POST['station_id'];
			Route::fillRoute(
							 $id,
				             $station_id
				            );
			$stations = Route::getAllStations($id);
			$stations_route = Route::getAllStationsRoute($id);
		}
        if(isset($_POST['outFill'])){
       	//header("Location: ".LOCALPATH."admin/station");
		}
		$title = "Заповнення маршруту";

		require ROOT."/views/admin/AdminRouteFill.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення маршруту $id";

		Route::deleteRouteById($id);
		header("Location: ".LOCALPATH."admin/route");
		//require_once ROOT."/views/admin/AdminRouteDelete.php";
		return true;
	}
}

