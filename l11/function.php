<?php

	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	function my_print_r($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
