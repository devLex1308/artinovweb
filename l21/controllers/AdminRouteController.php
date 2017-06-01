<?php
class AdminRouteController{

	public function actionIndex($page = 1){
		User::checkAdmin();
		$title = "Вивід усіх маршрутів";
		$routes = Route::getAllRoute($page);
		$carriage_name = Route::getTypeCarriageById($routes);
		$countRoute = Route::getPaginationInfo();
		$countRouteOnPage = Route::routeOnPage;

		$countPage = ceil($countRoute['count'] / $countRouteOnPage);

		require_once ROOT."/views/admin/AdminRouteIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення маршруту";
		$carriages = Route::getAllTypeCarriage();
		$stations = Route::getAllStations();
		$Allroute = Route::getAllRoute();

		if(isset($_POST['createRoute'])){

			$errors = [];

			if(Route::getLengthField('number') < strlen($_POST['number'])){
				$errors[] = "Макс.: <b>".Route::getLengthField('number')."</b>. Ви ввели: <b>".strlen($_POST['number'])."</b> символів у поле <b>number</b>.";
			}

			if ($_POST['name_start'] == $_POST['name_end']) {
				$errors[] = "Ви ввели однакову назву для початку та кінця маршруту: <b>".$_POST['name_start']."</b>. та <b>".$_POST['name_end']."</b>.";
			}
			
			$id_stations_start = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~id_stations_start_~", $key)){	
					$id_stations_start[] = $value;
				}
			}

			$id_stations_end = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~id_stations_end_~", $key)){	
					$id_stations_end[] = $value;
				}
			}
			
			$delta_time_start = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~delta_time_start_~", $key)){	
					$delta_time_start[] = $value;
				}
			}
			
			$delta_time_end = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~delta_time_end_~", $key)){	
					$delta_time_end[] = $value;
				}
			}

			foreach ($id_stations_start as $key1 => $station1) {
				foreach ($id_stations_start as $key2 => $station2) {
					if($station1 == $station2 && $key1 != $key2){
						$errors[] = "Рух за прямим маршрутом: Деякі введені вами зупинки мають однакову назву, будь ласка виправте дані!!!";
						break 2;
					}
				}
			}

			foreach ($id_stations_end as $key1 => $station1) {
				foreach ($id_stations_end as $key2 => $station2) {
					if($station1 == $station2 && $key1 != $key2){
						$errors[] = "Рух за зворотнім маршрутом: Деякі введені вами зупинки мають однакову назву, будь ласка виправте дані!!!";
						echo $station1." ".$station2;
						break 2;
					}
				}
			}

			$id_stations_start_create = implode(",", $id_stations_start);
			$id_stations_end_create = implode(",", $id_stations_end);

			$delta_time_start_create = implode(",", $delta_time_start);
			$delta_time_end_create = implode(",", $delta_time_end);

			if (empty($errors)){
				Route::createRoute(
					$_POST['name_start'],
					$_POST['name_end'],
					$_POST['number'],
					$_POST['carriage_id'],
					$id_stations_start_create,
					$id_stations_end_create,
					$delta_time_start_create,
					$delta_time_end_create
					);
			} else {
				$route_z = [
				'id',
				'id',
				$_POST['name_start'],
				$_POST['name_start'],
				$_POST['name_end'],
				$_POST['name_end'],
				$_POST['number'],
				$_POST['number'],
				$_POST['carriage_id'],
				$_POST['carriage_id'],
				$id_stations_start_create,
				$id_stations_start_create,
				$id_stations_end_create,
				$id_stations_end_create,
				$delta_time_start_create,
				$delta_time_start_create,
				$delta_time_end_create,
				$delta_time_end_create
				];
				$route = Route::getRouteById($Allroute[0]['id']);
				$route_up = [];
				$count = 0;
				foreach ($route as $key => $value) {
					$route_up[$key] = $route_z[$count];
					$count++;
				}
			}
		}
		if(isset($route_up)) {
			$route = $route_up;

			$id_stations_start_prev = explode(",", $route['id_stations_start']);
			$id_stations_end_prev = explode(",", $route['id_stations_end']);

			$delta_time_start_prev = explode(",", $route['delta_time_start']);
			$delta_time_end_prev = explode(",", $route['delta_time_end']);
		}
		require_once ROOT."/views/admin/AdminRouteCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		$title = "Редагування маршруту";

		$route = Route::getRouteById($id);

		$carriages = Route::getAllTypeCarriage();
		$stations = Route::getAllStations();

		if(isset($_POST['editRoute'])){

			$errors = [];

			if(Route::getLengthField('number') < strlen($_POST['number'])){
				$errors[] = "Макс.: <b>".Route::getLengthField('number')."</b>. Ви ввели: <b>".strlen($_POST['number'])."</b> символів у поле <b>number</b>.";
			}

			if ($_POST['name_start'] == $_POST['name_end']) {
				$errors[] = "Ви ввели однакову назву для початку та кінця маршруту: <b>".$_POST['name_start']."</b>. та <b>".$_POST['name_end']."</b>.";
			}
			
			$id_stations_start = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~id_stations_start_~", $key)){	
					$id_stations_start[] = $value;
				}
			}

			$id_stations_end = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~id_stations_end_~", $key)){	
					$id_stations_end[] = $value;
				}
			}
			
			$delta_time_start = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~delta_time_start_~", $key)){	
					$delta_time_start[] = $value;
				}
			}
			
			$delta_time_end = [];
			foreach ($_POST as $key => $value) {
				if(preg_match("~delta_time_end_~", $key)){	
					$delta_time_end[] = $value;
				}
			}

			foreach ($id_stations_start as $key1 => $station1) {
				foreach ($id_stations_start as $key2 => $station2) {
					if($station1 == $station2 && $key1 != $key2){
						$errors[] = "Рух за прямим маршрутом: Деякі введені вами зупинки мають однакову назву, будь ласка виправте дані!!!";
						break 2;
					}
				}
			}

			foreach ($id_stations_end as $key1 => $station1) {
				foreach ($id_stations_end as $key2 => $station2) {
					if($station1 == $station2 && $key1 != $key2){
						$errors[] = "Рух за зворотнім маршрутом: Деякі введені вами зупинки мають однакову назву, будь ласка виправте дані!!!";
						break 2;
					}
				}
			}

			$id_stations_start_edit = implode(",", $id_stations_start);
			$id_stations_end_edit = implode(",", $id_stations_end);

			$delta_time_start_edit = implode(",", $delta_time_start);
			$delta_time_end_edit = implode(",", $delta_time_end);

			if (empty($errors)){
				Route::editRoute(
					$id,
					$_POST['name_start'],
					$_POST['name_end'],
					$_POST['number'],
					$_POST['carriage_id'],
					$id_stations_start_edit,
					$id_stations_end_edit,
					$delta_time_start_edit,
					$delta_time_end_edit
					);
			} else {
				$route_z = [
				$id,
				$id,
				$_POST['name_start'],
				$_POST['name_start'],
				$_POST['name_end'],
				$_POST['name_end'],
				$_POST['number'],
				$_POST['number'],
				$_POST['carriage_id'],
				$_POST['carriage_id'],
				$id_stations_start_edit,
				$id_stations_start_edit,
				$id_stations_end_edit,
				$id_stations_end_edit,
				$delta_time_start_edit,
				$delta_time_start_edit,
				$delta_time_end_edit,
				$delta_time_end_edit
				];
				$route_up = [];
				$count = 0;
				foreach ($route as $key => $value) {
					$route_up[$key] = $route_z[$count];
					$count++;
				}
			}
		}
		if(isset($route_up)) {
			$route = $route_up;
		} else {
			$route = Route::getRouteById($id);
		}
		
		$id_stations_start_prev = explode(",", $route['id_stations_start']);
		$id_stations_end_prev = explode(",", $route['id_stations_end']);

		$delta_time_start_prev = explode(",", $route['delta_time_start']);
		$delta_time_end_prev = explode(",", $route['delta_time_end']);

		require_once ROOT."/views/admin/AdminRouteEdit.php";
		return true;
	}
}