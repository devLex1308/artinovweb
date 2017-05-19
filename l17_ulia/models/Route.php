<?php
class Route{
	public static function createRoute(	
										$name_start,
										$name_end,
										$number,
										$carriage_id,
										$id_stations_start,
										$id_stations_end,
										$delta_time_start,
										$delta_time_end
										){
		$DBH = Db::getConnection(); 
	
			$sql = '
				INSERT INTO route
					SET
						name_start=:name_start,
						name_end=:name_end,
						`number`=:number,
						carriage_id=:carriage_id,
						id_stations_start=:id_stations_start,
						id_stations_end=:id_stations_end,
						delta_time_start=:delta_time_start,
						delta_time_end=:delta_time_end
			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":name_start", $name_start, PDO::PARAM_STR);
			$query->bindParam(":name_end", $name_end, PDO::PARAM_STR);
			$query->bindParam(":number", 	$number, PDO::PARAM_STR);
			$query->bindParam(":carriage_id", $carriage_id, PDO::PARAM_INT);
			$query->bindParam(":id_stations_start", $id_stations_start, PDO::PARAM_STR);
			$query->bindParam(":id_stations_end", 	$id_stations_end, PDO::PARAM_STR);
			$query->bindParam(":delta_time_start", 	$delta_time_start, PDO::PARAM_STR);
			$query->bindParam(":delta_time_end", $delta_time_end, PDO::PARAM_STR);
			
			$query->execute();
			
	}

	public static function getAllStations($id){
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id,name 
				FROM station WHERE id not in (SELECT station_id as id from route_station WHERE route_id=:id)
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}

    public static function getAllStationsRoute($id){
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT name 
				FROM station WHERE id in (SELECT station_id as id from route_station WHERE route_id=:id)
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllRoutes(){
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id,number, name_start,name_end
				FROM route
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getRouteById($id){


		$DBH = Db::getConnection(); 

		$sql = '
				SELECT * 
				FROM route
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function editRoute(
										$name_start,
										$name_end,
										$number,
										$carriage_id,
										$id_stations_start,
										$id_stations_end,
										$delta_time_start,
										$delta_time_end
										){
	
		$DBH = Db::getConnection(); 
	
			$sql = '
				UPDATE route
					SET
						name_start=:name_start,
						name_end=:name_end,
						`number`=:`number`,
						carriage_id=:carriage_id,
						id_stations_start=:id_stations_start,
						id_stations_end=:id_stations_end,
						delta_time_start=:delta_time_start,
						delta_time_end=:delta_time_end
					WHERE id = :id

			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":name_start", $name_start, 	PDO::PARAM_STR);
			$query->bindParam(":name_end", $name_end, 	PDO::PARAM_STR);
			$query->bindParam(":number", 	$number, 	PDO::PARAM_STR);
			$query->bindParam(":carriage_id", $carriage_id, 	PDO::PARAM_INT);
			$query->bindParam(":id_stations_start", $id_stations_start, 	PDO::PARAM_STR);
			$query->bindParam(":id_stations_end", 	$id_stations_end, 	PDO::PARAM_STR);
			$query->bindParam(":delta_time_start", 	$delta_time_start, 	PDO::PARAM_STR);
			$query->bindParam(":delta_time_end", $delta_time_end, PDO::PARAM_STR);
			
			$query->execute();
	}

	public static function fillRoute(
		                             $id,										
									 $station_id
									){
	
		$DBH = Db::getConnection(); 
	
			$sql = 'INSERT INTO route_station
					SET
						station_id=:station_id,
					    route_id = :id

			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":station_id", $station_id, PDO::PARAM_INT);
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			
			$query->execute();

	}

	public static function deleteRouteById($id){
			
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM route
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

	}
}