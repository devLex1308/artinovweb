<?php
class Route{
	
	const routeOnPage = 20; 

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

	
	public static function getAllRoute($page = 1){
		$routeOnPage = self::routeOnPage;

		$start = ($page - 1) * $routeOnPage;
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id, number, name_start, name_end, carriage_id 
				FROM route
				LIMIT :start,:routeOnPage
			';
			
		$query = $DBH->prepare($sql);

		$query->bindParam(":routeOnPage", 	$routeOnPage, 	PDO::PARAM_INT);
		$query->bindParam(":start", 	$start, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllRoutes(){
			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id, number, name_start, name_end, carriage_id
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

	public static function getStationCoordinateRouteById($id){

		$DBH = Db::getConnection();

		$sql = '
				SELECT id_stations_start,id_stations_end 
				FROM route
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		$result = $query->fetch();

		$aStationId = explode(",", $result['id_stations_start'].",".$result['id_stations_end']);

		//$aStationId2 = Station::getStationCoordsByArrayId($result['id_stations_start'].",".$result['id_stations_end']);
		//print_r($aStationId2);
		//echo $result['id_stations_start'].",".$result['id_stations_end'];

		$aStationCoor = [];
		foreach ($aStationId as $key => $stationId) {
			$r = Station::getStationCoordById($stationId);
			$aStationCoor[]=[floatval($r["map_x"]),floatval($r["map_y"])];

		}
		return $aStationCoor;

	}

	public static function routeStationInfo($id){

		$DBH = Db::getConnection();

		$sql = '
				SELECT id_stations_start,id_stations_end 
				FROM route
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		$result = $query->fetch();

		$aStationId = explode(",", $result['id_stations_start'].",".$result['id_stations_end']);

		//$aStationId2 = Station::getStationCoordsByArrayId($result['id_stations_start'].",".$result['id_stations_end']);
		//print_r($aStationId2);
		//echo $result['id_stations_start'].",".$result['id_stations_end'];

		$aStationCoor = [];
		foreach ($aStationId as $key => $stationId) {
			$r = Station::getStationShortInfoById($stationId);
			$aStationCoor[]=[floatval($r["map_x"]),floatval($r["map_y"]),$r['name']];

		}
		return $aStationCoor;

	}


	public static function editRoute(
										$id,
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
						`number`=:number,
						carriage_id=:carriage_id,
						id_stations_start=:id_stations_start,
						id_stations_end=:id_stations_end,
						delta_time_start=:delta_time_start,
						delta_time_end=:delta_time_end
					WHERE id = :id

			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->bindParam(":name_start", $name_start, 	PDO::PARAM_STR);
			$query->bindParam(":name_end", $name_end, 	PDO::PARAM_STR);
			$query->bindParam(":number", 	$number, 	PDO::PARAM_STR);
			$query->bindParam(":carriage_id",$carriage_id, 	PDO::PARAM_STR);
			$query->bindParam(":id_stations_start", $id_stations_start, 	PDO::PARAM_STR);
			$query->bindParam(":id_stations_end", 	$id_stations_end, 	PDO::PARAM_STR);
			$query->bindParam(":delta_time_start", 	$delta_time_start, 	PDO::PARAM_STR);
			$query->bindParam(":delta_time_end", $delta_time_end, PDO::PARAM_STR);
			
			$query->execute();
			//print_r($query->errorInfo());
	}

	
	public static function deleteRouteById($id){
			
		$DBH = Db::getConnection(); 

		$sql = '
				DELETE  
				FROM route
				WHERE id = :id
			';
			
		?>
			<script>
				alert(Ви видалили зупинку!!! Якщо ця дія виконалась не вірно, розкажіть про це);
			</script>
		<?php
		
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();
	}

	public static function getLengthField($field){
		$DBH = Db::getConnection();
		// Перевірка максимальної можливої довжини поля
		$q = $DBH->prepare("DESCRIBE route");
		$q->execute();
		$table_users = $q->fetchAll(PDO::FETCH_UNIQUE);
		$text = $table_users[$field][0];
		return substr(substr(strrchr($text, '('), 1), 0, -1);
	}

	public static function getTypeCarriageById($routes){
		 
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

	public static function getAllIdStationsStart(){
		 
		$DBH = Db::getConnection();

		$sql = '
				SELECT id, name_start, id_stations_start
				FROM route
				';

		$query = $DBH->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllIdStationsEnd(){
		 
		$DBH = Db::getConnection();

		$sql = '
				SELECT id, name_end, id_stations_end
				FROM route
				';

		$query = $DBH->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllStations(){
		 
		$DBH = Db::getConnection();

		$sql = '
				SELECT id, name
				FROM station
				';

		$query = $DBH->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public static function getPaginationInfo(){
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT COUNT(id) as count 
				FROM route
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetch();
	}
}