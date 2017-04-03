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
		</div>
		<footer>
			
		</footer>		
	</body>
</html>