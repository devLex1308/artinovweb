<?php
class Timetable{

	public static function getTimeRouteStartId($time_route_start_id){
		$DBH = Db::getConnection();

		$sql = '
				SELECT timetable.id as id,
					   st.name AS station_name,
					   st.is_real AS is_real,
					   timetable.time AS `time`
				FROM timetable
				LEFT JOIN station AS st ON st.id = timetable.station_id
				WHERE time_route_start_id = :time_route_start_id
			';

		$query = $DBH->prepare($sql);
		$query->bindParam(":time_route_start_id", 	$time_route_start_id, 	PDO::PARAM_INT);

		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	//Дякую Юлі Гавришовій
	public static function AddTime($start, $t){
		$result = date('H:i:s',strtotime($start.' + '.$t.'sec'));
		return $result;
	}

	public static function insert(
									$transport_id,
									$route_id,
									$time_route_start_id,
									$carriage_id,
									$station_id,
									$is_rest_day,
									$time
								){



		$DBH = Db::getConnection();

		$sql = '
				INSERT INTO timetable
					SET
						transport_id=:transport_id,
						time_route_start_id=:time_route_start_id,
						carriage_id=:carriage_id,
						route_id=:route_id,
						station_id=:station_id,
						is_rest_day=:is_rest_day,
						`time`= :time2
			';

		$query = $DBH->prepare($sql);

		$query->bindParam(":transport_id", 			$transport_id, 			PDO::PARAM_INT);
		$query->bindParam(":time_route_start_id", 	$time_route_start_id, 	PDO::PARAM_INT);
		$query->bindParam(":carriage_id", 			$carriage_id, 			PDO::PARAM_INT);
		$query->bindParam(":route_id", 				$route_id, 				PDO::PARAM_INT);
		$query->bindParam(":station_id", 			$station_id, 			PDO::PARAM_INT);
		$query->bindParam(":is_rest_day", 			$is_rest_day, 			PDO::PARAM_INT);
		$query->bindParam(":time2", 				$time, 					PDO::PARAM_STR);

		$query->execute();
	}
}