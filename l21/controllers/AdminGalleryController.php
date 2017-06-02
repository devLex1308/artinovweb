<?php
class AdminGalleryController {

	public function actionIndex($page=1){
		User::checkAdmin();
		$title = "Вивід усіх файлів";

		require_once ROOT."/views/admin/AdminGalleryIndex.php";
		return true;
	}

	public function actionUpload(){
		User::checkAdmin();
		$title = "Завантаження картинки зупинки";

		if(!empty($_FILES['userFile']['name'][0])){

			$dir = ROOT."/resourses/images";
			$allFiles = (scandir($dir));
			unset($allFiles[0]);
			unset($allFiles[1]);
			sort($allFiles);

			$newAddress = [];
			$keys_name = [];

			foreach ($_FILES['userFile']['name'] as $key2 => $file) {
				foreach ($allFiles as $key => $img) {
					if($file == $img) {
						$errors[] = "Файл з таким ім'ям уже існує на сервері";
						continue 2;
					}
				}
				$uploaddir = ROOT.RESOURSES."/images/";
				$newAddress[$key2] = $uploaddir . basename($file);

				$keys_name[] = $key2;
			}

			if(!empty($newAddress)){
				foreach ($_FILES['userFile']['tmp_name'] as $key => $tmp_name) {
					foreach ($keys_name as $key_n => $value) {
						if($value == $key){
							if (move_uploaded_file($tmp_name, $newAddress[$key])) {
							} else {
								$errors[] = "Один із файлів не завантажено";
							}
						}
					}
				}
				$errors[] = "Завантажено на сервер файлів: ".count($keys_name);
			}
		}
		
		require_once ROOT."/views/admin/AdminGalleryUpload.php";
		return true;
	}
}

