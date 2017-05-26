<?php
class Page{

	public function actionClassNotFound(){
		$title = "404 Not Found <br> Така сторінка незнайдена =/";
		$object = "Не існуючий Клас (Об'єкт)!!!";
		require_once ROOT."/views/404.php";
		return true;
	}

	public function actionMethodNotFound(){
		$title = "Така сторінка незнайдена =/";
		$object = "Не існуючий метод данного класу!!!";
		require_once ROOT."/views/404.php";
		return true;
	}
}