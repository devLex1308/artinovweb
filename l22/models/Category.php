<?php
class Category{
	
	public static function createCategory($name){
		$DBH = Db::getConnection(); 
	
			$sql = '
				INSERT INTO category
					SET
						name=:name
			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
			
			$query->execute();

	}

	public static function getAllCategories(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id,name 
				FROM category
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getCategoryById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM category
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function editCategory(
										$id,	
										$name
										){
	
		$DBH = Db::getConnection(); 
	
			$sql = '
				UPDATE category
					SET
						name=:name
					WHERE id = :id
			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
			$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
						
			$query->execute();

	}

	public static function deleteCategoryById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM category
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

	}
}