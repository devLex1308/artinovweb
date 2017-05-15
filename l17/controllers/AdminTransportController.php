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
		$carriages = Carriage::getAllCarriage();
		require_once ROOT."/views/admin/AdminCarriageIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення нового транспорту";
        if(isset($_POST['createTransport'])){

            Carriage::createCarriage(
                $_POST['name']
            );
        }
		require_once ROOT."/views/admin/AdminTransportCreate.php";
		return true;
	}

	public function actionEdit($id){
		if(isset($_POST['editCarriage'])){
			Carriage::editCarriage(
									$id,
									$_POST['name']
								);
		}

		$title = "Редагування транспорту";
		$carriage = Carriage::getCarriageById($id);
		require_once ROOT."/views/admin/AdminCarriageEdit.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення транспорту $id";

		Carriage::deleteCarriageById($id);
		header("Location: ".LOCALPATH."admin/carriage");
		require_once ROOT."/views/admin/AdminCarriageDelete";
		return true;
	}
}

