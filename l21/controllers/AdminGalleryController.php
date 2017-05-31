<?php
class AdminGalleryController {

	public function actionIndex($page=1){
		User::checkAdmin();
		$title = "Вивід всіх зупинок";

		$countStation = Station::getPaginationInfo();
		$countStationOnPage = Station::stationOnPage;

		$countPage = ceil($countStation['count'] / $countStationOnPage);

		$stations = Station::getAllStations($page);

		require_once ROOT."/views/admin/AdminStationIndex.php";
		return true;
	}

	public function actionUpload(){
		User::checkAdmin();
		$title = "Завантаження картинки зупинки";

		if(isset($_FILES['userFile'])){

			$newAddress = [];

			foreach ($_FILES['userFile']['name'] as $key => $file) {
				$uploaddir = ROOT.RESOURSES."/images/";
			 	$newAddress[] = $uploaddir . basename($file);
			}

			foreach ($_FILES['userFile']['tmp_name'] as $key => $tmp_name) {
				if (move_uploaded_file($tmp_name, $newAddress[$key])) {
				} else {
				    $error[] = "Один із файлів не завантажено";
				}
			}
		}
		
		require_once ROOT."/views/admin/AdminGalleryUpload.php";
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
					$_POST['longitude']
				);
			}
		}
		
		$station = Station::getStationById($id);
		$id_stations_neighboring_stop = explode(",", $station['neighboring_stop']);
		require_once ROOT."/views/admin/AdminStationEdit.php";
		return true;
	}

	public function actionDelete($id){
		User::checkAdmin();
		$title = "Видалення зупинки $id";

		Station::deleteStationById($id);
		echo '<script type="text/javascript">
           window.location = "'.LOCALPATH.'/admin/station"
      	</script>';
		require_once ROOT."/views/admin/AdminStationDelete.php";
		return true;
	}
}

