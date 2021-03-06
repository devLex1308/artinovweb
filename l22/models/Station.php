<?php
class Station{
	
	const stationOnPage = 20;

	public static function createStation(	
										$name,
										$description,
										$is_real=false,
										$neighboring_stop,
										$map_x,
										$map_y,
										$latitude,
										$longitude
										){
		$DBH = Db::getConnection(); 

		$sql = '
			INSERT INTO station
				SET
					name=:name,
					description=:description,
					is_real=:is_real,
					neighboring_stop=:neighboring_stop,
					map_x=:map_x,
					map_y=:map_y,
					latitude=:latitude,
					longitude=:longitude
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":is_real", 	$is_real, 	PDO::PARAM_INT);
		$query->bindParam(":neighboring_stop", 		$neighboring_stop, 	PDO::PARAM_STR);
		$query->bindParam(":map_x", 	$map_x, 	PDO::PARAM_STR);
		$query->bindParam(":map_y", 	$map_y, 	PDO::PARAM_STR);
		$query->bindParam(":latitude", 	$latitude, 	PDO::PARAM_STR);
		$query->bindParam(":longitude", $longitude, PDO::PARAM_STR);
		
		$query->execute();
		$DBH = Db::getConnection(); 

		$sql = '
			INSERT INTO new_station
				SET
					name=:name,
					description=:description,
					is_real=:is_real,
					neighboring_stop=:neighboring_stop,
					map_x=:map_x,
					map_y=:map_y,
					latitude=:latitude,
					longitude=:longitude
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":is_real", 	$is_real, 	PDO::PARAM_INT);
		$query->bindParam(":neighboring_stop", 		$neighboring_stop, 	PDO::PARAM_STR);
		$query->bindParam(":map_x", 	$map_x, 	PDO::PARAM_STR);
		$query->bindParam(":map_y", 	$map_y, 	PDO::PARAM_STR);
		$query->bindParam(":latitude", 	$latitude, 	PDO::PARAM_STR);
		$query->bindParam(":longitude", $longitude, PDO::PARAM_STR);
		
		$query->execute();
	}

	public static function createDeleteStation(	
												$id,
												$name,
												$description,
												$is_real=false,
												$neighboring_stop,
												$map_x,
												$map_y,
												$latitude,
												$longitude
												){
		$DBH = Db::getConnection(); 

		$sql = '
			INSERT INTO delete_stations
				SET
					id=:id,
					name=:name,
					description=:description,
					is_real=:is_real,
					neighboring_stop=:neighboring_stop,
					map_x=:map_x,
					map_y=:map_y,
					latitude=:latitude,
					longitude=:longitude
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":is_real", 	$is_real, 	PDO::PARAM_INT);
		$query->bindParam(":neighboring_stop", 		$neighboring_stop, 	PDO::PARAM_STR);
		$query->bindParam(":map_x", 	$map_x, 	PDO::PARAM_STR);
		$query->bindParam(":map_y", 	$map_y, 	PDO::PARAM_STR);
		$query->bindParam(":latitude", 	$latitude, 	PDO::PARAM_STR);
		$query->bindParam(":longitude", $longitude, PDO::PARAM_STR);
		
		$query->execute();
	}

	public static function getAllStations($page = 1){
		$stationOnPage = self::stationOnPage;

		$start = ($page - 1) * $stationOnPage;

		$DBH = Db::getConnection(); 

		$sql = '
			SELECT id,name
			FROM station
			LIMIT :start,:stationOnPage
		';

		$query = $DBH->prepare($sql);

		$query->bindParam(":stationOnPage", 	$stationOnPage, 	PDO::PARAM_INT);
		$query->bindParam(":start", 	$start, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllStationsForMap(){

		$DBH = Db::getConnection(); 

		$sql = '
			SELECT id,name,map_x,map_y
			FROM station
		';

		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetchAll();
	}

	public static function getAllStation(){

		$DBH = Db::getConnection();

		$sql = '
			SELECT id, name,is_real
			FROM station
		';

		$query = $DBH->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}	

	public static function getStationById($id){
		$DBH = Db::getConnection(); 

		$sql = '
			SELECT * 
			FROM station
			WHERE id = :id
		';

		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function getStationCoordById($id){
		$DBH = Db::getConnection(); 

		$sql = '
			SELECT map_x,map_y 
			FROM station
			WHERE id = :id
		';

		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function getStationShortInfoById($id){
		$DBH = Db::getConnection(); 

		$sql = '
			SELECT map_x,map_y,name,id
			FROM station
			WHERE id = :id
		';

		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		return $query->fetch();
	}

	public static function getStationCoordsByArrayId($sIds){
		$DBH = Db::getConnection();

		// echo $sIds;

		$sIds=" 22, 28, 24, 21, 29, 34";

		$ids     = array(1, 2, 3, 7, 8, 9);
		$inQuery = implode(',', array_fill(0, count($ids), '?'));

		$sql ="
			SELECT map_x, map_y
			FROM station
			WHERE id IN(' . $inQuery . ')
		";

		$query = $DBH->prepare($sql);
		$query->bindParam(":sIds", 	$sIds, 	PDO::PARAM_STR);

		// print_r($query);

		$result = $query->fetchAll();
		// print_r($result);
		return $result;

		//https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition
	}

	public static function editStation(
										$id,	
										$name,
										$description,
										$is_real=false,
										$neighboring_stop,
										$map_x,
										$map_y,
										$latitude,
										$longitude,
										$modificate
										){

		$DBH = Db::getConnection(); 

		$sql = '
			UPDATE station
				SET
					name=:name,
					description=:description,
					is_real=:is_real,
					neighboring_stop=:neighboring_stop,
					map_x=:map_x,
					map_y=:map_y,
					latitude=:latitude,
					longitude=:longitude,
					modificate=:modificate
				WHERE id = :id
		';

		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
		$query->bindParam(":description", $description, 	PDO::PARAM_STR);
		$query->bindParam(":is_real", 	$is_real, 	PDO::PARAM_INT);
		$query->bindParam(":neighboring_stop", 		$neighboring_stop, 	PDO::PARAM_STR);
		$query->bindParam(":map_x", 	$map_x, 	PDO::PARAM_STR);
		$query->bindParam(":map_y", 	$map_y, 	PDO::PARAM_STR);
		$query->bindParam(":latitude", 	$latitude, 	PDO::PARAM_STR);
		$query->bindParam(":longitude", $longitude, PDO::PARAM_STR);
		$query->bindParam(":modificate", $modificate, PDO::PARAM_INT);


		$query->execute();

	}

	public static function deleteStationById($id){

		$station = Station::getStationById($id);

		Station::createDeleteStation(
							$station['id'],
							$station['name'],
							$station['description'],
							$station['is_real'],
							$station['neighboring_stop'],
							$station['map_x'],
							$station['map_y'],
							$station['latitude'],
							$station['longitude']
							);
		
		$DBH = Db::getConnection(); 

		$sql = '
			DELETE  
			FROM station
			WHERE id = :id
		';

		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		
		$query->execute();

		$sql = '
			INSERT INTO del
				SET
					id_station=:id,
					user_id=:user_id
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->bindParam(":user_id", $_SESSION['user_id'], 	PDO::PARAM_INT);
		
		$query->execute();
	}

	public static function getPaginationInfo(){
		$DBH = Db::getConnection(); 

		$sql = '
			SELECT COUNT(id) as count 
			FROM station
		';

		$query = $DBH->prepare($sql);
		
		$query->execute();

		return $query->fetch();
	}

	public static function getLengthField($field){
		$DBH = Db::getConnection();
		// Перевірка максимальної можливої довжини поля
		$q = $DBH->prepare("DESCRIBE station");
		$q->execute();
		$table_users = $q->fetchAll(PDO::FETCH_UNIQUE);
		$text = $table_users[$field][0];
		return substr(substr(strrchr($text, '('), 1), 0, -1);
	}
}