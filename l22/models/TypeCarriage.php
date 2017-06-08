<?php
class TypeCarriage{
	
	public static function createTypeCarriage($name){
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

	public static function getAllTypeCarriage(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM type_carriage
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getTypeCarriageById($id){
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

	public static function getTypeCarriageFromRoutesById($routes){
		 
		$DBH = Db::getConnection();

		foreach ($routes as $key => $route) {
			
		
			$sql = '
					SELECT name
					FROM type_carriage
					WHERE id = :id
					';

			$query = $DBH->prepare($sql);

			$query->bindParam(":id", $route['carriage_id'], PDO::PARAM_INT);

			$query->execute();
			$result[] = $query->fetch();
		}
		return $result;
	}

	public static function editTypeCarriage(
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

	public static function deleteTypeCarriageById($id){
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