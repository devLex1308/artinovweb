<?php
class Transport{
	
	const transportOnPage = 6; 

	public static function createTransport(	
										$name,
										$description,
										$carriage_id,
										$route_id
										){
		$DBH = Db::getConnection(); 
	
			$sql = '
				INSERT INTO transport
					SET
						name=:name,
						description=:description,
						carriage_id=:carriage_id,
						route_id=:route_id
			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
			$query->bindParam(":description", $description, 	PDO::PARAM_STR);
			$query->bindParam(":carriage_id", 	$carriage_id, 	PDO::PARAM_INT);
			$query->bindParam(":route_id", 		$route_id, 	PDO::PARAM_INT);
			
			$query->execute();

	}

	public static function getAllTransports($page = 1){
		
		# MySQL через PDO_MYSQL 
		$transportOnPage = self::transportOnPage;

		$start = ($page-1)*$transportOnPage;
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT t.id,t.name,tc.name as carriage_name, r.id as route_id
				FROM transport t
				Left Join type_carriage tc on tc.id=t.carriage_id
                Left Join route r on r.id=t.route_id
			';
			
			
		$query = $DBH->prepare($sql);

		$query->bindParam(":transportOnPage", 	$transportOnPage, 	PDO::PARAM_INT);
		$query->bindParam(":start", 	$start, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getTransportById($id){
		
		# MySQL через PDO_MYSQL  
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM transport
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function editTransport(
										$name,
										$description,
										$carriage_id,
										$route_id
										){
	
		$DBH = Db::getConnection(); 
	
			$sql = '
				UPDATE transport
					SET
						name=:name,
						description=:description,
						carriage_id=:carriage_id,
						route_id=:route_id
					WHERE id = :id

			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
			$query->bindParam(":description", $description, 	PDO::PARAM_STR);
			$query->bindParam(":carriage_id", 	$carriage_id, 	PDO::PARAM_INT);
			$query->bindParam(":route_id", 		$route_id, 	PDO::PARAM_INT);
			
			$query->execute();

	}

	public static function deleteTransportById($id){
		
		# MySQL через PDO_MYSQL  
			
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM transport
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

	}

	public static function getPaginationInfo(){
		
		# MySQL через PDO_MYSQL  
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT COUNT(id) as "count" 
				FROM transport
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetch();
	}
}