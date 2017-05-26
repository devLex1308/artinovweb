<?php
require_once ROOT."/models/Route.php";
class RouteController {
	function __construct() {}

	public function actionIndex($id){
		$title = "Вивід усіх зупинок даного маршруту, та час";
		$route = Route::getRouteById($id);
		$all_start = Route::getAllIdStationsStart();
		if (!empty($all_start)){
			foreach ($all_start as $key => $start) {
				if($route['name_start'] == $start['name_start']) $id_start = $start['id'];
			}
		}

		$all_end= Route::getAllIdStationsEnd();

		if (!empty($all_end)) {
			foreach ($all_end as $key => $end) {
				if($route['name_end'] == $end['name_end']) $id_end = $end['id'];
			}
		}

		$id_stations_start = explode(",", $route['id_stations_start']);
		$id_stations_end = explode(",", $route['id_stations_end']);

		$start_count = $route['delta_time_start']*60/count($id_stations_start);
		$end_count = $route['delta_time_end']*60/count($id_stations_end);

		$stations = Route::getAllStations();

		require_once ROOT."/views/Route.php";
		return true;
	}

	public function actionEdit($id){
		$title = "Редагування маршруту";
		$route = Route::getRouteById($id);
		$id_stations_start = explode(",", $route['id_stations_start']);
		$id_stations_end = explode(",", $route['id_stations_end']);
		$carriages = Route::getAllTypeCarriage();
		$stations = Route::getAllStations();

		if(isset($_POST['editRoute'])){

			$errors = [];

			if(Route::getLengthField('number') < strlen($_POST['number'])){
				$errors[] = "Макс.: <b>".Route::getLengthField('number')."</b>. Ви ввели: <b>".strlen($_POST['number'])."</b> символів у поле <b>number</b>.";
			}

			foreach ($stations as $key => $station) {
				if($station['id'] == $_POST['id_name_start']) {
					$name_start = $station['name'];
				}
			}

			foreach ($stations as $key => $station) {
				if($station['id'] == $_POST['id_name_end']) {
					$name_end = $station['name'];
				}
			}

			if ($name_start == $name_end) {
				$errors[] = "Ви вибрали 2 однакових зупинки: <b>".$name_start."</b>. та <b>".$name_end."</b>.";
			}

			$id_stations_start_edit = implode(",", $_POST['id_stations_start']);
			$id_stations_end_edit = implode(",", $_POST['id_stations_end']);

			if (empty($errors)){
				Route::editRoute(
					$id,
					$name_start,
					$name_end,
					$_POST['number'],
					$_POST['carriage_id'],
					$id_stations_start_edit,
					$id_stations_end_edit,
					$_POST['delta_time_start'],
					$_POST['delta_time_end']
				);
			}
		}
		require_once ROOT."/views/admin/AdminRouteEdit.php";
		return true;
	}
}