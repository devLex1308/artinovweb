<?php

	// ini_set('error_reporting', E_ALL);
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);

	function my_print_r($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	function carDistanse($car){
					$distanse = $car["FuilVolume"]/$car["FuilPer100Km"]*100;
					echo "Автомобіль {$car["brend"]} може проїхати $distanse км<br>";
				}
