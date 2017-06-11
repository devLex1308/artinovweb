<?php
class AdminTimeRouteController{	

	public function actionEdit($id){

		User::checkAdmin();
		$timeRoadStart = TimeRouteStart::getTimeRouteStartById($id);
		print_r($timeRoadStart);
		$title = "Редагування виїзду $id";
		require_once ROOT."/views/admin/TimeRoute/AdminTimeRouteEdit.php";
		return true;
	}
}

