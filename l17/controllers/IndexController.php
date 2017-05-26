<?php
class IndexController {
	function __construct() {}

	public function actionIndex(){
		$title = "Головна";
		require_once ROOT."/views/index.php";
		return true;
	}
}