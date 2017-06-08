<?php
class AdminCategoryController {

	public function actionIndex(){
		User::checkAdmin();
		$title = "Усі категорії для статтів";
		$categories = Category::getAllCategories();
		require_once ROOT."/views/admin/Category/AdminCategoryIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення категорії для статті";
		if(isset($_POST['createCategory'])){
			Category::createCategory($_POST['name']);
		}
		require_once ROOT."/views/admin/Category/AdminCategoryCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		if(isset($_POST['editCategory'])){
			Category::editCategory($id, $_POST['name']);
		}

		$title = "Редагування категорії статтів";
		$categories = Category::getCategoryById($id);
		require_once ROOT."/views/admin/Category/AdminCategoryEdit.php";
		return true;
	}
}

