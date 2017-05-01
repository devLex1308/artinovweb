<?php
class Router
{
	private $routes;
	function __construct(){
		$this->routes = require(ROOT."/config/routers.php");
		print_r($this->routes);
	}

	public function run(){
		$url = $_SERVER['REQUEST_URI'];
		$aUrl = explode("/", $url);
		$class = ucfirst($aUrl[2]);
		$action = "action".ucfirst($aUrl[3]);
		$fileName = ROOT."/classes/".$class.".php";
		require_once($fileName);

		$object = new $class();
		$object->$action();

		print_r($aUrl);
	}

}

