<?php
class TimeRouteStart{

	public static function createTimeRouteStart(
										$transport_id,
										$way = false,
										$is_rest_day = false
										){
		$DBH = Db::getConnection(); 
	
			$sql = '
				INSERT INTO time_route_start
					SET
						transport_id=:transport_id,
						way=:way,
						is_rest_day=:is_rest_day


			';

			$query = $DBH->prepare($sql);

			$query->bindParam(":transport_id", 	$transport_id, 	PDO::PARAM_INT);
			$query->bindParam(":way", 			$way, 			PDO::PARAM_BOOL);
			$query->bindParam(":is_rest_day", 	$is_rest_day, 	PDO::PARAM_BOOL);

			$query->execute();

			//print_r($DBH->errorInfo());

			return $DBH->lastInsertId();

	}

	public static function getTimeRouteStart(
		$transport_id,
		$way = false,
		$is_rest_day = false
	){


			
		$DBH = Db::getConnection(); 

		$sql = '
				SELECT id,	time_start
				FROM time_route_start
				WHERE
					transport_id = :transport_id AND
					way = :way AND
					is_rest_day = :is_rest_day
			';

		$query = $DBH->prepare($sql);

		$query->bindParam(":transport_id", 	$transport_id, 	PDO::PARAM_INT);
		$query->bindParam(":way", 			$way, 			PDO::PARAM_BOOL);
		$query->bindParam(":is_rest_day", 	$is_rest_day, 	PDO::PARAM_BOOL);
		//$dbh->beginTransaction();
		$query->execute();

		return$query->fetchAll(PDO::FETCH_ASSOC);
	}
}