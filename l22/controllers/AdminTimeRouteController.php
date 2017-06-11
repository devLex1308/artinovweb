<?php
class AdminTimeRouteController{	

	public function actionEdit($id){

		User::checkAdmin();
		$timeRoadStart = TimeRouteStart::getTimeRouteStartById($id);
		$transport_id = $timeRoadStart['transport_id'];
		$is_rest_day = $timeRoadStart['is_rest_day'];
		$title = "Редагування виїзду $id";
		$infoTimeRouteStart = Timetable::getTimeRouteStartId($id);
		if(empty($infoTimeRouteStart)){
			//Слід в табличку розкладу нагенерити виїзд по зупинкам
			$transport = Transport::getTrasportById($transport_id);
			$route_id = $transport['route_id'];
			$carriage_id = $transport['carriage_id'];
			$route = Route::getRouteById($route_id);

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
				$time = Timetable::AddTime($timeRoadStart['time_start'],$delta[$key]);
				Timetable::insert($transport_id,$route_id,$id,$carriage_id,$id_station,$is_rest_day,$time);
			}

			//Після того як все заженем треба вивести
			$infoTimeRouteStart = Timetable::getTimeRouteStartId($id);

		}
		require_once ROOT."/views/admin/TimeRoute/AdminTimeRouteEdit.php";
		return true;
	}


}

