<?php
class Router
{
	private $routes;
	function __construct(){
		$this->routes = require(ROOT."/config/routers.php");
		//print_r($this->routes);
	}

	public function run(){

		$url = $_SERVER['REQUEST_URI'];
		foreach ($this->routes as $key => $value) {
			if(preg_match("~$key~", $url)){
				
				$aUrl = explode("/", $value);
				$class = ucfirst($aUrl[0]);
				$action = "action".ucfirst($aUrl[1]);
				$fileName = ROOT."/controllers/".$class.".php";
				require_once($fileName);

				$object = new $class();
				$object->$action();

			}
		}
	}

}

