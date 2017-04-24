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

				require_once "function.php";
				require_once "classes/Transport.php";
				require_once "classes/Car.php";
				require_once "classes/Lorry.php";
				require_once "classes/Bus.php";

				include_once "test.php";

				$car = [];
				$car["brend"]="audi";
				$car["FuilVolume"] = 50;
				$car["FuilPer100Km"] = 5;
				$car["color"] = "green";

				// $distanse = $car["FuilVolume"]/$car["FuilPer100Km"]*100;

				// echo "Автомобіль {$car["brend"]} може проїхати $distanse км";

				function carDistanse($car){
					$distanse = $car["FuilVolume"]/$car["FuilPer100Km"]*100;
					echo "Автомобіль {$car["brend"]} може проїхати $distanse км<br>";
				}

				$car1 = [];
				$car1["brend"]="Ferrari";
				$car1["FuilVolume"] = 100;
				$car1["FuilPer100Km"] = 25;
				$car1["color"] = "red";

				carDistanse($car);
				carDistanse($car1);

				$cars = [];
				$cars[] = $car;
				$cars[] = $car1;

				print_r($cars);
				// $distanse = $car1["FuilVolume"]/$car1["FuilPer100Km"]*100;
				// echo "Автомобіль {$car1["brend"]} може проїхати $distanse км";

						

				// $audi = new Car();
				// $audi->brend = "audi";
				// $audi->FuilVolume = 50;
				// $audi->FuilPer100Km = 5;
				// $audi->color = "yellow";
				// $audi->passengers = 4;
				// my_print_r($audi);

				// $audi->carDistanse();

				// $vaz = new Car();
				// unset($vaz);

				// $audi->color = "red";

				$carLada = new Car("ВАЗ 2108",40,8,"Білий");
				my_print_r($carLada);
				$carLada->carDistanse();

				$carOpel = new Car("Opel cadet",70,7,"Мокрий асфальт");
				my_print_r($carOpel);
				$carOpel->carDistanse();

				

				

				$carKamaz = new Lorry("Камаз",200,30,"Помаранчевий");
				$carKamaz->load = 5000;
				$carKamaz->coutAxis = 3;

				my_print_r($carKamaz);
				$carKamaz->carDistanse();
				$carKamaz->axisWeight();

				$busIkarus = new Bus("Ікарус",500,25,"Білий",40);
				my_print_r($busIkarus);
				$busIkarus->carDistanse();

				$carLada->test();
				$carKamaz->test();
				$busIkarus->test();

				//$tt = new Transport();
				
				$carLada->brend = "Zaz";

				my_print_r($carLada);

				class A{
					private $a="Привіт";
					protected $b="Щось є";
					public $c = "Ура";
				}

				class B extends A{

					public function getA(){
						echo $this->a;
					}
				}

				$b = new B;

				//echo $b->a;
				//echo $b->b;
				echo $b->c;
				$b->getA();


			?>

			
		</div>
		<footer>
			
		</footer>		
	</body>
</html>