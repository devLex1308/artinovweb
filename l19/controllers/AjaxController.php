<?php
class AjaxController{
	public function actionIndex(){
		$title = "Ajax";
		$aStation = Station::getAllStations();
		$json = json_encode($aStation);

		require_once ROOT."/views/admin/AdminAjaxIndex.php";
		return true;
	}


}

