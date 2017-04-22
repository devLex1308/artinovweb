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

				class Car
				{
					public $brend;
					public $FuilVolume;
					public $FuilPer100Km;
					public $color;

					public function __construct(
												$brend,
												$FuilVolume,
												$FuilPer100Km,
												$color
												){
						$this->brend=$brend;
						$this->FuilVolume=$FuilVolume;
						$this->FuilPer100Km=$FuilPer100Km;
						$this->color=$color;
						echo "Створено об`єкт класу Car<br>";
					}

					// public function __destruct(){
					// 	echo "Видалено об`єкт класу Car<br>";
					// }

					public function carDistanse(){
						$distanse = $this->FuilVolume/$this->FuilPer100Km*100;
						echo "Автомобіль {$this->brend} може проїхати $distanse км<br>";
					}
				}

				function my_print_r($array){
					echo "<pre>";
					print_r($array);
					echo "</pre>";
				}

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

				class Lorry
				{
					public $brend;
					public $FuilVolume;
					public $FuilPer100Km;
					public $color;
					public $load;
					public $coutAxis;
					const LORRYWEIGHT = 5000;

					public function __construct(
												$brend,
												$FuilVolume,
												$FuilPer100Km,
												$color
												){
						$this->brend=$brend;
						$this->FuilVolume=$FuilVolume;
						$this->FuilPer100Km=$FuilPer100Km;
						$this->color=$color;
						echo "Створено об`єкт класу Car<br>";
					}

					// public function __destruct(){
					// 	echo "Видалено об`єкт класу Car<br>";
					// }

					public function carDistanse(){
						$distanse = $this->FuilVolume/$this->FuilPer100Km*100;
						echo "Автомобіль {$this->brend} може проїхати $distanse км<br>";
					}

					public function axisWeight(){
						$axisWeight = ($this->LORRYWEIGHT+$this->load)/$this->coutAxis;
						echo "Автомобіль {$this->brend} має максимальне навантаження на вісь $axisWeight кг<br>";
					}
				}

				$carKamaz = new Lorry("Камаз",200,30,"Помаранчевий");
				$carKamaz->load = 5000;
				$carKamaz->coutAxis = 3;

				my_print_r($carKamaz);
				$carKamaz->carDistanse();
				$carKamaz->axisWeight();

			?>

			
		</div>
		<footer>
			
		</footer>		
	</body>
</html>