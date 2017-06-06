<?php
class IndexController {
	
	public function actionIndex(){
		$title = "Головна";
		$lastArticles = array_reverse(Article::getLastArticles(3));
		require_once ROOT."/views/index.php";
		return true;
	}

}