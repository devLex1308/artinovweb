<?php
class Resource{
	
	public static function createResource(	
										$type,
										$name
										){
		$DBH = Db::getConnection(); 
	
		$sql = '
			INSERT INTO resource
				SET
					type=:type,
					`name`=:name
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":type", $type, 	PDO::PARAM_STR);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		
		$query->execute();

	}

	public static function getAllResources(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT *
				FROM resource
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllResourcesTypeImg(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT *
				FROM resource
				WHERE type="jpg";
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getResourceById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM resource
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function editResource(
										$id,	
										$type,
										$name
										){

		$DBH = Db::getConnection(); 
	
		$sql = '
			UPDATE resource
				SET
					type=:type,
					`name`=:name
				WHERE id = :id

		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":type", $type, 	PDO::PARAM_STR);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		
		$query->execute();
	}

	public static function editResourceName(
											$id,
											$name
											){

		$DBH = Db::getConnection(); 
	
		$sql = '
			UPDATE resource
				SET
					`name`=:name
				WHERE id = :id

		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		
		$query->execute();
	}

	public static function deleteResourceById($id){
		$file = Resource::getResourceById($id);
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM resource
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();
	 	unlink(ROOT.'/resourses/images/'.$file['name']);
	}
}