<?php
require_once ROOT."/models/Transport.php";
/**
* 
*/
class AdminTransportController
{
	function __construct()
	{
		
	}
	public function actionIndex(){
		$title = "Вивід вcього транспорту";
		$transports = Transport::getAllTransport();
		require_once ROOT."/views/admin/AdminTransportIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення нового транспорту";
        if(isset($_POST['createTransport'])){

            Transport::createTransport(
                $_POST['name'],
                $_POST['description'],
                $_POST['carriage_id'],
                $_POST['route_id']
            );
        }
		require_once ROOT."/views/admin/AdminTransportCreate.php";
		return true;
	}

	public function actionEdit($id){
		if(isset($_POST['editTransport'])){
			Transport::editTransport(
									$id,
									$_POST['name']
								);
		}

		$title = "Редагування транспорту";
		$transport = Transport::getTrasportById($id);
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

