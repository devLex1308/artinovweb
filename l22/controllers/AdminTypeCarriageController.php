<?php
class AdminTypeCarriageController {

	public function actionIndex(){
		User::checkAdmin();
		$title = "Усі категорії для статтів";
		$typeCarriages = TypeCarriage::getAllTypeCarriage();
		require_once ROOT."/views/admin/TypeCarriage/AdminTypeCarriageIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення категорії для статті";
		if(isset($_POST['createTypeCarriage'])){
			TypeCarriage::createTypeCarriage($_POST['name']);
		}
		require_once ROOT."/views/admin/TypeCarriage/AdminTypeCarriageCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		if(isset($_POST['editTypeCarriage'])){
			TypeCarriage::editTypeCarriage($id, $_POST['name']);
		}

		$title = "Редагування категорії статтів";
		$typeCarriages = TypeCarriage::getTypeCarriageById($id);
		require_once ROOT."/views/admin/TypeCarriage/AdminTypeCarriageEdit.php";
		return true;
	}
}

