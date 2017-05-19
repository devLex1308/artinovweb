<?php
require_once ROOT."/models/Transport.php";
require_once ROOT."/models/Category.php";
require_once ROOT."/models/Route.php";
/**
* 
*/
class AdminTransportController 
{
	
	function __construct()
	{
		
	}

	public function actionIndex($page=1){
		$title = "Вивід вcього транспорту";

		$countTransport = Transport::getPaginationInfo();
		$countTransportOnPage = Transport::transportOnPage;
		$countPage = ceil($countTransport['count']/$countTransportOnPage);
		
		$transports = Transport::getAllTransports($page);
		require_once ROOT."/views/admin/AdminTransportIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення нового транспорту";
		$categories = Category::getAllCategories();
		$routers = Route::getAllRoutes();
		if(isset($_POST['createTransport'])){

			//ДЗ виправити предачу данних в метод createTransport
			// Не передавати масив $_POST на пряму, поробити перевірки на вхідні дані
			// Створити масив $errors в який записувати всі помилки
			// У відображенні AdminTransportCreate перед формою зробити перевірку чи цей масив є пустим і якщо не пустий то списком вивести всі помилки
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $carriage_id = trim($_POST['carriage_id']);
        $route_id = trim($_POST['route_id']);
        $errortext = "<ul>";
	    $error = false;
		if (empty($name)){
			$error = true;
			$errortext .= "<li><font color='red'>Вы не заполнели поле Назва транспорту!</font></li>";
		} else {
			if (!preg_match("/^[a-z а-яё]{2,20}$/iu",$name)){
				$error = true;
				$errortext .= "<li><font color='red'>Убедитесь что Назва транспорту содержит от 2 до 20 символов</font></li>";
			}
		}
		if (empty($description)){			
		} else {
			if (!preg_match("/^[a-z а-яё]{2,250}$/iu",$description)){
				$error = true;
				$errortext .= "<li><font color='red'>Убедитесь что Опис транспорту содержит от 2 до 250 символов</font></li>";
			}
		}
		if (empty($carriage_id)){
			$error = true;
			$errortext .= "<li><font color='red'>Вы не заполнели поле Вид транспорту!</font></li>";
		} 
		if (empty($route_id)){
			$error = true;
			$errortext .= "<li><font color='red'>Вы не заполнели поле id маршруту!</font></li>";
		} 
		$errortext .= "</ul>";
		if ($error){
			echo($errortext);
		} else {  
			$arrayTransport = [];

			Transport::createTransport(
									$_POST['name'],
									$_POST['description'],
									$_POST['carriage_id'],
									$_POST['route_id']
								);
		};
		}
		require_once ROOT."/views/admin/AdminTransportCreate.php";
		return true;
	}

	public function actionEdit($id){
		if(isset($_POST['editTransport'])){
			Transport::editTransport(
									$id,
									$_POST['name'],
									$_POST['description'],
									$_POST['carriage_id'],
									$_POST['route_id']
								);
		}

		$title = "Редагування транспорту";
		$transport = Transport::getTransportById($id);
		require_once ROOT."/views/admin/AdminTransportEdit.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення транспорту $id";

		Transport::deleteTransportById($id);
		header("Location: ".LOCALPATH."admin/transport");
		require_once ROOT."/views/admin/AdminTransportDelete.php";
		return true;
	}
}

