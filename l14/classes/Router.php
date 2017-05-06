<?php
class Router
{
	private $routes;
	function __construct(){
		$this->routes = require(ROOT."/config/routers.php");
		//print_r($this->routes);
	}

	public function run(){

		$uri = $_SERVER['REQUEST_URI'];
		foreach ($this->routes as $uriPattern => $path) {

			if(preg_match("~$uriPattern~", $uri)) {

				
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);



				$segments = explode('/', $internalRoute);

				array_shift($segments);
				array_shift($segments);
				array_shift($segments);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				

				$actionName = 'action'.ucfirst(array_shift($segments));

				$parameters = $segments;


				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';

				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				$controllerObject = new $controllerName;
				/*$result = $controllerObject->$actionName($parameters); - OLD VERSION */
				/*$result = call_user_func(array($controllerObject, $actionName), $parameters);*/
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				
				if ($result != null) {
					break;
				}

}
		}
	}

}

