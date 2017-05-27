<?php
class Router
{
	private $routes;
	function __construct(){
		$this->routes = require(ROOT."/config/routers.php");
	}

	public function run(){

		$uri = $_SERVER['REQUEST_URI'];
		$dir = strrchr(substr($uri, 1), "/");
		if($dir == "/"){
			$uri .= "index";
		}
		$i = 0;
		foreach ($this->routes as $uriPattern => $path) {
			$i++;
			if(preg_match("~$uriPattern~", $uri)) {
				
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$segments = explode('/', $internalRoute);

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
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				
				if ($result != null) {
					break;
				}
			} elseif(count($this->routes) == $i){
				require_once(ROOT."/controllers/Page.php");
				$object = new Page();
				$object->actionClassNotFound();
			}
		}
	}
}

