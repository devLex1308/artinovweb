<?php
class AdminGalleryController {

	public function actionIndex(){
		User::checkAdmin();
		$title = "Вивід усіх файлів";

		$address = '/resourses/images/';
		$dir = ROOT."/resourses/images";
		$allFiles = (scandir($dir));
		unset($allFiles[0]);
		unset($allFiles[1]);
		sort($allFiles);

		$errors = [];

		if ($_POST) {
			$file = $_POST['old'];
			$info = pathinfo($file);
			$new_file_name = $_POST['new'].'.'.$info['extension'];
			$new_address = ROOT.$address.$new_file_name;
			$old_address = ROOT.'/resourses/images/'.$_POST['old'];
			if($_POST['old'] == $new_file_name){
			}else if($_POST['new'] != ''){
				$i = 0;
				foreach ($allFiles as $key => $img) {
					if($new_file_name == $img) $i++;
				}

				if($i == 0){
					rename($old_address, $new_address);
					Resource::editResourceName($_POST['id'], $new_file_name);
				} else {
					$errors[] = "Дана назва файла уже існує";
				}
			} else {
				$errors[] = "Введіть назву, не залишайте поле пустим";
			}
		}

		$images = Resource::getAllResourcesTypeImg();
		require_once ROOT."/views/admin/Gallery/AdminGalleryIndex.php";
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
				$keys_name[] = $file;
			}

			if(!empty($newAddress)){
				$count = 0;
				foreach ($_FILES['userFile']['tmp_name'] as $key => $tmp_name) {
					foreach ($keys_name as $key_n => $value) {
						if($key_n%2 == 0 && $value == $key){
							if (move_uploaded_file($tmp_name, $newAddress[$key])) {
								$img = pathinfo($keys_name[$key_n + 1]);
								$type = $img['extension'];
								// $name = $img['filename'];
								$full_name = $img['basename'];
								Resource::createResource($type, $full_name);
								$count++;
							} else {
								$errors[] = "Один із файлів не завантажено";
							}
						}
					}
				}
				$errors[] = "Завантажено на сервер файлів: ".$count;
			}
		}
		
		require_once ROOT."/views/admin/Gallery/AdminGalleryUpload.php";
		return true;
	}
}

