<?php
class IndexController {
	
	public function actionIndex(){
		$title = "Головна";
		require_once ROOT."/views/index.php";
		return true;
	}

}