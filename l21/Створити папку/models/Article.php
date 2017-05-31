<?php
class Article{
	
	public static function createArticle(	
										$name,
										$description,
										$context,
										$user_id,
										$category_id,
										$time_create
										){
		$DBH = Db::getConnection(); 
	
		$sql = '
			INSERT INTO article
				SET
					name=:name,
					description=:description,
					context=:context,
					user_id=:user_id,
					category_id=:category_id,
					time_create=:time_create
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":context", 	$context, 	PDO::PARAM_STR);
		$query->bindParam(":user_id", 		$user_id, 	PDO::PARAM_INT);
		$query->bindParam(":category_id", 	$category_id, 	PDO::PARAM_INT);
		$query->bindParam(":time_create", 	$time_create, 	PDO::PARAM_STR);
		
		$query->execute();

	}

	public static function getAllArticles(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id,name,user_id,time_create 
				FROM article
			';
			
		$query = $DBH->prepare($sql);
		
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

	public static function editArticle(
										$id,	
										$name,
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
					name=:name,
					description=:description,
					context=:context,
					user_id=:user_id,
					category_id=:category_id,
					time_edit=:time_edit
				WHERE id = :id

		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
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
}