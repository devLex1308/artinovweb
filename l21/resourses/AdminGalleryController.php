<?php
class AdminGalleryController {

	public function actionIndex(){
		User::checkAdmin();
		$title = "Вивід усіх файлів";

		require_once ROOT."/views/admin/AdminGalleryIndex.php";
		return true;
	}

	public function actionUpload(){
		User::checkAdmin();
		$title = "Завантаження картинки зупинки";

		if(isset($_FILES['userFile'])){

			$dir = ROOT."/resourses/images";
			$allFiles = (scandir($dir));
			unset($allFiles[0]);
			unset($allFiles[1]);
			sort($allFiles);

			$errors = [];
			$newAddress = [];
			$newFiles = [];

			$isset = false;
			foreach ($_FILES['userFile']['name'] as $key => $file) {
				foreach ($allFiles as $key => $img) {
					if($file == $img) {
						$errors[] = "Файл з таким ім'ям уже існує на сервері";
						$isset = true;
					}
				}
				if(!$isset){
					// echo $file." ".$img;
					$uploaddir = ROOT.RESOURSES."/images/";
					$newAddress[] = $uploaddir . basename($file);
					$newFiles[] = $file;
				} else {
					$isset = false;
					// unset($_FILES['userFile']);
				}
			}
			print_r($newAddress);
			print_r($newFiles);
			// print_r($_FILES['userFile']['name'][0]);
			$isset = false;
			if(isset($_FILES['userFile']) && !empty($newAddress)){
				foreach ($_FILES['userFile']['tmp_name'] as $key => $tmp_name) {
					foreach ($newFiles as $k => $value) {
						if($value == $_FILES['userFile']['name'][$key]){
							$isset = true;
						}
					}
					if(!$isset){
						if (move_uploaded_file($tmp_name, $newAddress[$key])) {
						} else {
							$errors[] = "Один із файлів не завантажено";
						}
					} else {
						$isset = false;
					}
				}
			}
		}
		
		require_once ROOT."/views/admin/AdminGalleryUpload.php";
		return true;
	}
}

