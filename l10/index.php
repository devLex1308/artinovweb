<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/main.js"></script>
			<title>
					OOP
			</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="index.html">OOP</a>
			</nav>
		</header>

		<div id="Content">
		<?php

				ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

				echo "<br>";
				$car=[];
				$car['brand']='AUDI';
				$car['fuelVolume'] = 50;
				$car['fuelPer100Km'] = 5;
				$car['color']='green';
				
				//$distance=$car['fuelVolume']/$car['fuelPer100Km']*100;
				//echo "Авто {$car['brand']} може проїхати з повним баком {$distance} км";

				function carDistance($car){
					$distance=$car['fuelVolume']/$car['fuelPer100Km']*100;
					echo "Авто {$car['brand']} може проїхати з повним баком {$distance} км <br>";
				}


				$car1=[];
				$car1['brand']='FERRARI';
				$car1['fuelVolume'] = 100;
				$car1['fuelPer100Km'] = 25;
				$car1['color']='red';

				carDistance($car);
				carDistance($car1);

				class Transport {
						private $brand;
						public $fuelVolume;
						public $fuelPer100Km;
						public $color;
						public function __construct($brand,$fuelVolume,$fuelPer100Km,$color){
										$this->brand=$brand;
										$this->fuelVolume=$fuelVolume;
										$this->fuelPer100Km=$fuelPer100Km;
										$this->color=$color;
									}
						public function carDistance(){
						$distance=$this->fuelVolume/$this->fuelPer100Km*100;
						echo "Авто {$this->brand} може проїхати з повним баком $distance км <br>";
					}
						public function test(){
							echo "Метод тест з test з класу Transport <br>";
						}
				}

				class Electro extends Transport{
						// метод carDistance з урахуванням нових властивостей для Тесли
						public $batteryCapacity;
						public $capacityPerKm;
						public function __construct($brand,$batteryCapacity,$capacityPerKm,$color){
										$this->brand=$brand;
										$this->batteryCapacity=$batteryCapacity;
										$this->capacityPerKm=$capacityPerKm;
										$this->color=$color;
						}
						
						public function carDistance(){
						$distance=$this->batteryCapacity/$this->capacityPerKm*100;
						echo "Авто {$this->brand} може проїхати з повною зарядкою $distance км <br>";
				}
					 
			}

				class Car extends Transport{
					
					public function __construct($brand,$fuelVolume,$fuelPer100Km,$color){
						$this->brand=$brand;
						$this->fuelVolume=$fuelVolume;
						$this->fuelPer100Km=$fuelPer100Km;
						$this->color=$color;
						echo "Створено об`єкт класу Car <br>";}
							
						public function test()
						{
							parent::test();
							echo 'Перевизначили метод <br>';	
						}}

				class Lorry extends Transport{
						public $load;
						public $axle;
						public $LORRYWEIGHT = 5000;

					public function __construct($brand,$fuelVolume,$fuelPer100Km,$color,$load,$axle){
									$this->brand=$brand;
									$this->fuelVolume=$fuelVolume;
									$this->fuelPer100Km=$fuelPer100Km;
									$this->color=$color;
									$this->load=$load;
									$this->axle=$axle;
						echo "Створено об`єкт класу Lorry <br>";
					}

					public function axleWeight(){
						$axleWeight = ($this->LORRYWEIGHT+$this->load)/$this->axle;
						echo "Авто {$this->brand} має максимальне навантаження на вісь $axleWeight <br>";
					}}	

				function my_print_r($array){
						echo "<pre>";
						print_r($array);
						echo "</pre>";
				}

				// $audi = new Car();
				// $audi->brand="AUDI";
				// $audi->fuelVolume=50;
				// $audi->fuelPer100Km=5;
				// $audi->color="yellow";
				// $audi->passengers=4;
				// my_print_r($audi);

				// $audi->carDistance();
				//  $vaz=new Car();
				// unset($vaz);

				$carLada = new Car("ВАЗ 2108",40,8,"Білий");
				my_print_r($carLada);
				$carLada->carDistance();


				$carKamaz = new Lorry("Kamaz",500,30,"Green",5000,3);
				my_print_r($carKamaz);
				$carLada->carDistance();
				$carKamaz->axleWeight();

				$carLada->test();
				$carKamaz->test();

				echo "<br>";

				$carTesla = new Electro("Tesla",10000,320,"White");
				my_print_r($carTesla);
				$carTesla->carDistance();

			?>	
			</div>
	</body>
</html>