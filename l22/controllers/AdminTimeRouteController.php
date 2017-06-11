<?php
class AdminTimeRouteController{	

	public function actionEdit($id){

		User::checkAdmin();
		$timeRoadStart = TimeRouteStart::getTimeRouteStartById($id);
		$transport_id = $timeRoadStart['transport_id'];
		$is_rest_day = $timeRoadStart['is_rest_day'];
			print_r($timeRoadStart);
		$title = "Редагування виїзду $id";
		$infoTimeRouteStart = Timetable::getTimeRouteStartId($id);
		if(empty($infoTimeRouteStart)){
			//Слід в табличку розкладу нагенерити виїзд по зупинкам
			$transport = Transport::getTrasportById($transport_id);
			$route_id = $transport['route_id'];
			$carriage_id = $transport['carriage_id'];
			$route = Route::getRouteById($route_id);
			//id_stations_start
			//id_stations_end
			//delta_time_start
			//delta_time_end
			if($timeRoadStart['way']){
				//Це прямий маршртут
				$stations = explode(",",$route['id_stations_start']);
				$delta = explode(",",$route['delta_time_start']);
			}else{
				//Це зворотный маршрут
				$stations = explode(",",$route['id_stations_end']);
				$delta = explode(",",$route['delta_time_end']);
			}


			foreach($stations as $key=>$id_station){
				//echo "<br>$key  {$timeRoadStart['time_start']} {$delta[$key]}";
				$time = Timetable::AddTime($timeRoadStart['time_start'],$delta[$key]);
				Timetable::insert($transport_id,$route_id,$id,$carriage_id,$id_station,$is_rest_day,$time);
			}
			//print_r($route);

		}
		require_once ROOT."/views/admin/TimeRoute/AdminTimeRouteEdit.php";
		return true;
	}


}

