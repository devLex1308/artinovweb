<?php
class NewsController {
	
	public function actionIndex(){
		$title = "Усі Новини";
		$archiveNews = Article::getAllArticles();
		// print_r($archiveNews);
		require_once ROOT."/views/archiveNews/index.php";
		return true;
	}
	
	public function actionNews($id){
		$title = "Новина $id";
		$article = Article::getArticleById($id);
		$user = User::getUserById($article['user_id']);
		require_once ROOT."/views/news/index.php";
		return true;
	}

}