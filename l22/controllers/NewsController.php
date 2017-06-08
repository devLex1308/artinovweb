<?php
class NewsController {
	
	public function actionIndex(){
		$title = "Усі Новини";
		$archiveNews = Article::getAllArticlesPagination(1);
		$images = Resource::getAllResourcesTypeImg();

		require_once ROOT."/views/archiveNews/index.php";
		return true;
	}
	
	public function actionNews($id){
		$title = "Новина $id";
		$article = Article::getArticleById($id);
		$image = Resource::getResourceById($article['resources_id']);

		require_once ROOT."/views/news/index.php";
		return true;
	}

}