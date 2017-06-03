<?php
class IndexController {
	
	public function actionIndex(){
		$title = "Головна";
		require_once ROOT."/views/index.php";
		return true;
	}
	
	public function actionArchiveNews(){
		$title = "Усі Новини";
		$archiveNews = Article::getAllArticles();
		// print_r($archiveNews);
		require_once ROOT."/views/archiveNews/index.php";
		return true;
	}
	
	public function actionNews(){
		$title = "Новина";
		require_once ROOT."/views/news/index.php";
		return true;
	}
}