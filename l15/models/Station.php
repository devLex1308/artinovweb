<?php
class Station{
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
		//echo "Викликали модель";
		$host = 'localhost';
		$dbname = 'goto';
		$user = 'root';
		$pass = '';
		
		# MySQL через PDO_MYSQL  
			
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
	
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

	}

	public static function getAllStations(){

		$host = 'localhost';
		$dbname = 'goto';
		$user = 'root';
		$pass = '';
		
		# MySQL через PDO_MYSQL  
			
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  

		$sql = '
				SELECT id,name 
				FROM station
			';
			
		$query = $DBH->prepare($sql);
		
		$query->execute();
		
		return $query->fetchAll();
	}
}