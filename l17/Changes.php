index.php

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

$router = new Router();
$router->run();

Router.php

if(preg_match("~$uriPattern~", $uri)) {

/*			
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$segments = explode('/', $internalRoute);

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



template

http://getbootstrap.com/getting-started/#download

views\layouts
views\admin

http://getbootstrap.com/examples/navbar-fixed-top/
				
AdminStationController.php
				
'admin/station/create' => 'AdminStation/create',
'admin/station/edit/([0-9]+)' => 'AdminStation/edit/$1',
'admin/station/delete/([0-9]+)' => 
'admin/station' => 'AdminStation/index',

				
Db.php
class Db
{

		public static function getConnection()
		{
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);


			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);

			return $db;
		}
}

db_params.php

return array(
			'host' => 'localhost',
			'dbname' => 'artinoweb',
			'user' => 'root',
			'password' => '',
);



				