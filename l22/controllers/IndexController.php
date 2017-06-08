<?php
class IndexController {
	
	public function actionIndex(){
		$title = "Головна";
		$lastArticles = Article::getLastArticles(3);
		$images = Resource::getAllResourcesTypeImg();

		require_once ROOT."/views/index.php";
		return true;
	}

}