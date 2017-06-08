<?php
class Gallery{
	
	public static function createGallery(	
										$resources_id
										){
		$DBH = Db::getConnection(); 
	
		$sql = '
			INSERT INTO gallery
				SET
					resources_id=:resources_id
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":resources_id", $resources_id, 	PDO::PARAM_STR);
		
		$query->execute();

	}

	public static function getAllGallerys(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT *
				FROM gallery
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getGalleryById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM gallery
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function editGallery(
										$id,	
										$resources_id
										){

		$DBH = Db::getConnection(); 
	
		$sql = '
			UPDATE gallery
				SET
					resources_id=:resources_id
				WHERE id = :id

		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":resources_id", $resources_id, 	PDO::PARAM_STR);
		
		$query->execute();
	}

	public static function deleteGalleryById($id){
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM gallery
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();
	}
}