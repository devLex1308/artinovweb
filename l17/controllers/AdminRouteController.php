<?php
require_once ROOT."/models/Route.php";
class AdminRouteController {
	function __construct(){}

	public function actionIndex($page = 1){
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
		$title = "Створення маршруту";
		$countStation = 30;
		$carriages = Route::getAllTypeCarriage();
		$stations = Route::getAllStations();

		if(isset($_POST['createRoute'])){

			$errors = [];

			if(Route::getLengthField('number') < strlen($_POST['number'])){
				$errors[] = "Макс.: <b>".Route::getLengthField('number')."</b>. Ви ввели: <b>".strlen($_POST['number'])."</b> символів у поле <b>number</b>.";
			}

			if(Route::getLengthField('name_start') < strlen($_POST['name_start'])){
				$errors[] = "Макс.: <b>".Route::getLengthField('name_start')."</b>. Ви ввели: <b>".strlen($_POST['name_start'])."</b> символів у поле <b>name_start</b>.";
			}

			if(Route::getLengthField('name_end') < strlen($_POST['name_end'])){
				$errors[] = "Макс.: <b>".Route::getLengthField('name_end')."</b>. Ви ввели: <b>".strlen($_POST['name_end'])."</b> символів у поле <b>name_end</b>.";
			}

			if ($_POST['name_start'] == $_POST['name_end']) {
				$errors[] = "Ви ввели 2 однакових назви маршрутів: <b>".$_POST['name_start']."</b>. та <b>".$_POST['name_end']."</b>.";
			}

			$id_stations_start = implode(",", $_POST['id_stations_start']);
			$id_stations_end = implode(",", $_POST['id_stations_end']);

			if (empty($errors)){
				Route::createRoute(
										$_POST['name_start'],
										$_POST['name_end'],
										$_POST['number'],
										$_POST['carriage_id'],
										$id_stations_start,
										$id_stations_end,
										$_POST['delta_time_start'],
										$_POST['delta_time_end']
									);
			}
		}
		require_once ROOT."/views/admin/AdminRouteCreate.php";
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

    public function actionFill($id){
		$stations_route = Route::getAllStationsRoute($id);
    	$stations = Route::getAllStationsById($id);
		if(isset($_POST['fillRoute'])){
            $station_id=$_POST['station_id'];
			Route::fillRoute(
							 $id,
				             $station_id
				            );
			$stations = Route::getAllStationsById($id);
			$stations_route = Route::getAllStationsRoute($id);
		}
        if(isset($_POST['outFill'])){
       		echo '<script type="text/javascript">
         	  window.location = "'.LOCALPATH.'/admin/station"
      			</script>';
		}
		$title = "Заповнення маршруту";

		require ROOT."/views/admin/AdminRouteFill.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення маршруту $id";

		Route::deleteRouteById($id);
		echo '<script type="text/javascript">
           window.location = "'.LOCALPATH.'/admin/route"
      	</script>';
		require_once ROOT."/views/admin/AdminRouteDelete.php";
		return true;
	}
}

