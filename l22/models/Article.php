<?php
class Article{
	
	const newsOnPage = 2;
	
	public static function createArticle(	
										$name,
										$description,
										$context,
										$user_id,
										$category_id
										){
		$DBH = Db::getConnection(); 
	
		$sql = '
			INSERT INTO article
				SET
					name=:name,
					description=:description,
					context=:context,
					user_id_create=:user_id,
					category_id=:category_id
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":context", 	$context, 	PDO::PARAM_STR);
		$query->bindParam(":user_id", 		$user_id, 	PDO::PARAM_INT);
		$query->bindParam(":category_id", 	$category_id, 	PDO::PARAM_INT);
		
		$query->execute();

	}

	public static function getAllArticles(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT *
				FROM article
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllArticlesPagination($page = 1){
		$newsOnPage = self::newsOnPage;

		$start = ($page - 1) * $newsOnPage;

		$DBH = Db::getConnection(); 

		$sql = '
				SELECT *
				FROM article
				ORDER BY id DESC LIMIT :start,:newsOnPage
			';
			
		$query = $DBH->prepare($sql);
		
		$query->bindParam(":newsOnPage", 	$newsOnPage, 	PDO::PARAM_INT);
		$query->bindParam(":start", 	$start, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getArticleById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM article
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function getLastArticles($count){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM article
				ORDER BY id DESC LIMIT :count
			';
			
		$query = $DBH->prepare($sql);

		$query->bindParam(":count", 	$count, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function editArticle(
										$id,	
										$name,
										$resources_id,
										$description,
										$context,
										$user_id,
										$category_id,
										$time_edit
										){

		$DBH = Db::getConnection(); 
	
		$sql = '
			UPDATE article
				SET
					`name`=:name,
					`resources_id`=:resources_id,
					description=:description,
					context=:context,
					user_id_last_edit=:user_id,
					category_id=:category_id,
					time_edit=:time_edit
				WHERE id = :id

		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":resources_id", 	$resources_id, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":context", 	$context, 	PDO::PARAM_STR);
		$query->bindParam(":user_id", 		$user_id, 	PDO::PARAM_INT);
		$query->bindParam(":category_id", 	$category_id, 	PDO::PARAM_INT);
		$query->bindParam(":time_edit", 	$time_edit, 	PDO::PARAM_STR);
		
		$query->execute();

	}

	public static function deleteArticleById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM article
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();
	}

	public static function getPaginationInfo(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT COUNT(id) as count 
				FROM article
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetch();
	}
}