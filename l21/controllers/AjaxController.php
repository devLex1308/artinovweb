<?php
class AjaxController{
	
	public function actionIndex(){
		// $title = "Ajax";
		// $aStation = Station::getAllStations();
		// $json = json_encode($aStation);
		if(isset($_POST['action'])&&($_POST['action']=="delete")){
			$this->actionDelete($_POST["nameModel"],$_POST["id"]);
		}

		if(isset($_POST['action'])&&($_POST['action']=="routeStation")){
			echo json_encode(Route::getStationCoordinateRouteById(4));
		}

		return true;
	}


	private function actionDelete($nameModel,$id){
		
		switch ($nameModel) {
			case 'station':
				Station::deleteStationById($id);
				break;
			
			default:
				echo 0;
				break;
		}
		
		echo 1;
	}
}

