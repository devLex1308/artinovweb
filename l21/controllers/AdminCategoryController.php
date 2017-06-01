<?php
class AdminCategoryController {

	public function actionIndex(){
		User::checkAdmin();
		$title = "Вивід всіх категорій транспорту";
		$categories = Category::getAllCategories();
		require_once ROOT."/views/admin/AdminCategoryIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення категорії транспорту";
		if(isset($_POST['createCategory'])){
			Category::createCategory($_POST['name']);
		}
		require_once ROOT."/views/admin/AdminCategoryCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		if(isset($_POST['editCategory'])){
			Category::editCategory($id, $_POST['name']);
		}

		$title = "Редагування категорії транспорту";
		$categories = Category::getCategoryById($id);
		require_once ROOT."/views/admin/AdminCategoryEdit.php";
		return true;
	}
}

