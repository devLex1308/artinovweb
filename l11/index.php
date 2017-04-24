<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/main.js"></script>
			<title>
					ООП
			</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="index.html">ООП</a>
			</nav>
		</header>

		<div id="content">
			<h1>ООП</h1>
			<?php
				require_once "classes/Interface.php";
				require_once "function.php";
				require_once "classes/Transport.php";
				require_once "classes/Car.php";
				require_once "classes/Lorry.php";
				require_once "classes/Bus.php";


				include_once "test.php";

				$car = new Car("Opel");
				
				my_print_r($car);

				$car2 = new Car("Audi",19,4,"yellow");
				$car->printCount();
				$car3 = new Car("Zaz",19,4,"white");
				$car3 = new Car("Zaz",19,4,"white");

				//my_print_r($car2);

				$car->objectCount = 3;

				$car->setObjectCount(5);
				//$car->setCount(777);

				
				$car2->printCount();
				$car3->printCount();

				$car->my_constant();

				$car->go();
				$car->stop();

				//$transport = new Transport();

				
				Car::SayHello();
				Lorry::SayHello();
				//echo Car::$count;

			


			?>

			
		</div>
		<footer>
			
		</footer>		
	</body>
</html>