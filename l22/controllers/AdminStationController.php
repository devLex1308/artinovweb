<?php
class AdminStationController {

	public function actionIndex($page = 1){
		User::checkAdmin();
		$title = "Вивід всіх зупинок";

		$countStation = Station::getPaginationInfo();
		$countStationOnPage = Station::stationOnPage;

		$countPage = ceil($countStation['count'] / $countStationOnPage);

		$stations = Station::getAllStations($page);
		$stations_select = Station::getAllStation();

		require_once ROOT."/views/admin/Station/AdminStationIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення зупинки";
		$stations = Station::getAllStation();
		if(isset($_POST['createStation'])){

			$arrayStation = [];

			$errors = [];

			if(Station::getLengthField('name') < strlen($_POST['name'])){
				$errors[] = "Макс.: <b>".Station::getLengthField('name')."</b>. Ви ввели: <b>".strlen($_POST['name'])."</b> символів у поле <b>name</b>.";
			}

			if(500 < strlen($_POST['description'])){
				$errors[] = "Макс.: <b>500</b>. Ви ввели: <b>".strlen($_POST['description'])."</b> символів у поле <b>description</b>.";
			}

			if(!empty($_POST['is_real'])){
				if($_POST['is_real'] == 'on') {
					$is_real = 1;
				}
			} else {
				$is_real = 0;
			}

			if(!is_numeric($_POST['map_x'])){
				$errors[] = "Не числове значення у полі: <b>map_x</b>";
			}

			if(!is_numeric($_POST['map_y'])){
				$errors[] = "Не числове значення у полі: <b>map_y</b>";
			}

			if(!is_numeric($_POST['latitude'])){
				$errors[] = "Не числове значення у полі: <b>latitude</b>";
			}

			if(!is_numeric($_POST['longitude'])){
				$errors[] = "Не числове значення у полі: <b>longitude</b>";
			}

			$id_stations_neighboring_stop = implode(",", $_POST['neighboring_stop']);

			if(Station::getLengthField('neighboring_stop') < strlen($id_stations_neighboring_stop)){
				$errors[] = "Макс.: <b>".Station::getLengthField('neighboring_stop')."</b>. Ви ввели: <b>".strlen($_POST['neighboring_stop'])."</b> символів у поле <b>neighboring_stop</b>.";
			}

			foreach ($stations as $key => $station) {
				if($station['name'] == $_POST['name']){
					$errors[] = "Зупинка: <b>".$_POST['name']."</b> уже створена";
				}
			}

			if (empty($errors)){
				Station::createStation(
					$_POST['name'],
					$_POST['description'],
					$is_real,
					$id_stations_neighboring_stop,
					$_POST['map_x'],
					$_POST['map_y'],
					$_POST['latitude'],
					$_POST['longitude']
				);
			}
		}
		require_once ROOT."/views/admin/Station/AdminStationCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		$title = "Редагування зупинки";
		$stations = Station::getAllStation();
		if(isset($_POST['editStation'])){

			$errors = [];

			if(!empty($stations)){
				foreach ($stations as $key => $station_name) {
					if($_POST['name'] == $station_name['name'] && $id != $station_name['id']){
						$errors[] = "Зупинка: <b>".$station_name['name']."</b>. Уже існує у базі";
					}
				}
			}

			if(Station::getLengthField('name') < strlen($_POST['name'])){
				$errors[] = "Макс.: <b>".Station::getLengthField('name')."</b>. Ви ввели: <b>".strlen($_POST['name'])."</b> символів у поле <b>name</b>.";
			}

			if(500 < strlen($_POST['description'])){
				$errors[] = "Макс.: <b>500</b>. Ви ввели: <b>".strlen($_POST['description'])."</b> символів у поле <b>description</b>.";
			}

			if(!empty($_POST['is_real'])){
				if($_POST['is_real'] == 'on') {
					$is_real = 1;
				}
			} else {
				$is_real = 0;
			}

			if(!is_numeric($_POST['map_x'])){
				$errors[] = "Не числове значення у полі: <b>map_x</b>";
			}

			if(!is_numeric($_POST['map_y'])){
				$errors[] = "Не числове значення у полі: <b>map_y</b>";
			}

			if(!is_numeric($_POST['latitude'])){
				$errors[] = "Не числове значення у полі: <b>latitude</b>";
			}

			if(!is_numeric($_POST['longitude'])){
				$errors[] = "Не числове значення у полі: <b>longitude</b>";
			}

			$id_stations_neighboring_stop_edit = implode(",", $_POST['neighboring_stop']);
			if(Station::getLengthField('neighboring_stop') < strlen($id_stations_neighboring_stop_edit)){
				$errors[] = "Макс.: <b>".Station::getLengthField('neighboring_stop')."</b>. Ви ввели: <b>".strlen($id_stations_neighboring_stop_edit)."</b> символів у поле <b>neighboring_stop</b>.";
			}

			if (empty($errors)){
				Station::editStation(
					$id,
					$_POST['name'],
					$_POST['description'],
					$is_real,
					$id_stations_neighboring_stop_edit,
					$_POST['map_x'],
					$_POST['map_y'],
					$_POST['latitude'],
					$_POST['longitude'],
					$_SESSION['user_id']
				);
			}
		}
		
		$station = Station::getStationById($id);
		$id_stations_neighboring_stop = explode(",", $station['neighboring_stop']);
		require_once ROOT."/views/admin/Station/AdminStationEdit.php";
		return true;
	}
}

