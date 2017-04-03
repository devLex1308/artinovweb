<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/main.js"></script>
			<title>
					PHP
			</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="index.html">Головна</a>
			</nav>
		</header>
		<div id="content">
			<h1>PHP</h1>
			<?php
				//echo "<h1>Привіт</h1>";

				echo "<h1>Привіт</h1>"; // Привіт
				#echo "<h1>Привіт</h1>";

				/*
				echo "<h1>Привіт</h1>";
				echo "<h1>Привіт</h1>";
				echo "<h1>Привіт</h1>";
				*/

				$box = "Кіт";
				$Box = "Собака";
				$bOx = "Ящірка";

				echo "$bOx $Box";

				$boy = "Олександр";
				$girl = "Леся";
				$sum = $girl." + ".$boy;

				echo "<br>$girl + $boy";
				echo "<br>$sum";

				$a = 10;
				$b = 5;

				$sum = $a + $b;
				$sum = $sum + 8;
				$sum += 8;
				$plus = $a + $b;
				$minus = $a - $b;
				$miltiple = $a * $b;
				$devision = $b/$a;
				$o = $a % $b;
				echo "Число 1 = $a, число 2 = $b";
				echo "<br>Результат операція додавання $plus";
				echo "<br>Результат операція віднімання $minus";
				echo "<br>Результат операція множення $miltiple";
				echo "<br>Результат операція ділення $devision";
				echo "<br>$o";

				$array = array(1,2,3,4,7);
				$array2 = [7,4,3,2,1];

				$plus_array = $array[1]+$array[3]; 
				$array[0] = $array[1]+$array[3];
				echo "<pre>";
				print_r($array);
				echo "</pre>";
				echo "<br>$plus_array";

				$zoo = ["слон","жираф", "мавпа", "удав","лисиця"];
				
				$zoo[1] .= $zoo[0];
				$zoo[2] = "Бегемот";
				//$zoo[99] = "Ігуану";
				$count = count($zoo);
				$zoo[$count] = "індик";
				$zoo[] = "пінгвін";
				$zoo[] = "броненосець";
				$zoo[5] = $array[2];
				echo "<br>В масиві $count елеменів";
				echo "<pre>";
				print_r($zoo);
				echo "</pre>";
			?>
			<h2>Операції розгалудження</h2>
			<?php
				$a = 7;
				$b = 5;
				$bool = $a==$b;

				$num = -16;

				if($num>=0){
					$result = sqrt($num);
					echo "<br>Корінь з числа $num рівний $result";
				}else{
					echo "<br>З відємного числа неможливо отримати квадратний корінь";
				}

				$dilene = 3;
				$dilnuk = 0;
				
				if($dilnuk!=0){
					$chastka = $dilene/$dilnuk;
					echo "<br> $chastka";

				}else{
					echo "<br>На нуль ділити не можна";
				}

				$r = 2;
				$result = 2+2*2;

				echo "<br>$result";
				$sColor = "зелений";
				$bIsAmbulans = true;

				if($sColor=="зелений"){
					if($bIsAmbulans){
						echo "<br> Перехід не дозволено";
					}else{
						echo "<br> Перехід дозволено";
					}
					
				}else{
					echo "<br> Перехід не дозволено";
				}


				if(($sColor=="зелений")&&(!$bIsAmbulans)){
					echo "<br> Перехід дозволено";
				}else{
					echo "<br> Перехід не дозволено";
				}

				$day = "вівторок";

				if (($day=="понеділок")||($day=="середа")||($day=="п'ятниця")){
					echo "Стоматолог приймає";
				}else{
					echo "У стоматолога вихідний";
				}

				echo "<br>";
				// for($i=0;$i<10000;$i++){
				// 	echo " $i";
				// }

				// for($i=10000;$i>0;$i--){
				// 	echo " $i";
				// }
				echo "<ol>";
				$count = count($zoo);
				for ($i=0; $i < $count; $i++) { 
					echo "<li>".$zoo[$i]."</li>";
					echo "<li>{$zoo[$i]}</li>";
				}
				echo "</ol>";

				$phoneBook = [
					"Пожарна"=>101,
					"Поліція"=>102,
					"Швидка"=>103,
					"Газова"=>104,
				];
				echo "<pre>";
				print_r($phoneBook);
				echo "</pre>";
				echo $phoneBook['Газова'];


				$count = count($phoneBook);
				echo "<ol>";
				foreach ($phoneBook as $key => $value) {
					echo "<li>Щоб дозвонитись в $key наберіть $value</li>";
				}
					
				
				echo "</ol>";
				


			?>
		</div>
		<footer>
			
		</footer>		
	</body>
</html>