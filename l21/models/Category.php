<?php
class Category{
	
	public static function createCategory($name){
		$DBH = Db::getConnection(); 
	
			$sql = '
				INSERT INTO type_carriage
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
				FROM type_carriage
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getCategoryById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM type_carriage
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
				UPDATE type_carriage
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
				FROM type_carriage
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

	}
}