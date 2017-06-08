<?php
class AdminArticleController {
	
	public function actionIndex(){
		User::checkAdmin();
		$title = "Вивід всіх статей";
		$articles = Article::getAllArticles();
		require_once ROOT."/views/admin/Article/AdminArticleIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення статті";
		if(isset($_POST['createArticle'])){

			//ДЗ виправити предачу данних в метод createStation
			// Не передавати масив $_POST на пряму, поробити перевірки на вхідні дані
			// Створити масив $errors в який записувати всі помилки
			// У відображенні AdminStationCreate перед формою зробити перевірку чи цей масив є пустим і якщо не пустий то списком вивести всі помилки
			// $arrayArticle = [];

			Article::createArticle(
									$_POST['name'],
									$_POST['description'],
									$_POST['context'],
									$_SESSION['user_id'],
									$_POST['category_id']
								);
		}
		$categories = Category::getAllCategories();
		require_once ROOT."/views/admin/Article/AdminArticleCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		if(isset($_POST['editArticle'])){
			$date = new DateTime();

			Article::editArticle(
									$id,
									$_POST['name'],
									$_POST['resources_id'],
									$_POST['description'],
									$_POST['context'],
									$_SESSION['user_id'],
									$_POST['category_id'],
									$date->format('Y-m-d H:i:sP')
								);
		}

		$images = Resource::getAllResourcesTypeImg();
		$title = "Редагування статті";
		$article = Article::getArticleById($id);
		$categories = Category::getAllCategories();
		require_once ROOT."/views/admin/Article/AdminArticleEdit.php";
		return true;
	}
}