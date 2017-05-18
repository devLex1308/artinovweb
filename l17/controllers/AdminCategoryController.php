<?php
require_once ROOT."/models/Category.php";
/**
* 
*/
class AdminCategoryController 
{
	
	function __construct()
	{
		
	}

	public function actionIndex(){
		$title = "Вивід всіх категорій транспорту";
		$categories = Category::getAllCategories();
		require_once ROOT."/views/admin/AdminCategoryIndex.php";
		return true;
	}

	public function actionCreate(){
		$title = "Створення категорії транспорту";
		if(isset($_POST['createCategory'])){

			Category::createCategory(
									$_POST['name']
									);
		}
		require_once ROOT."/views/admin/AdminCategoryCreate.php";
		return true;
	}

	public function actionEdit($id){
		if(isset($_POST['editCategory'])){
			Category::editCategory(
									$id,
									$_POST['name']
								);
		}

		$title = "Редагування категорії транспорту";
		$categorie = Category::getCategoryById($id);
		require_once ROOT."/views/admin/AdminCategoryEdit.php";
		return true;
	}

	public function actionDelete($id){
		$title = "Видалення категорії транспорту $id";

		Category::deleteCategoryById($id);
		//header("Location: ".LOCALPATH."admin/station");
		require_once ROOT."/views/admin/AdminCategoryDelete.php";
		return true;
	}
}

