<?php
class Db
{
	private static $db;
	public static function getConnection()
	{
		if(!empty(self::$dbc)){

			return self::$dbc;
		}
		
		$paramsPath = ROOT . '/config/db_params.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
		
		self::$db = $db;
		
		return $db;
	}
}