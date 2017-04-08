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
			<h1>PHP 2</h1>
			<?php
				$count_el = 10;
				$array = [];
				for ($i=0; $i < $count_el; $i++) { 
					$array[]=mt_rand(0,100);
				}

				unset($array[6]);

				echo "<pre>";
				print_r($array);
				echo "</pre>";

				$array2 = [];

				if(!empty($array)){
					echo "Масив не порожній";
				}else{
					echo "Масив порожній";
				}
				$a=1;
				unset($a);
				if(!isset($a)){
					echo "Такої змінної немає";
				}

				$phoneBook = [];

				$contact = [
					'name'=>'Пожарна',
					'phone'=>101
				];

				$phoneBook[] = $contact;

				$contact = [
					'name'=>'Поліція',
					'phone'=>102
				];

				$phoneBook[] = $contact;

				$contact = [
					'name'=>'Швидка',
					'phone'=>103
				];

				$phoneBook[] = $contact;

				echo "<pre>";
				print_r($phoneBook);
				echo "</pre>";

				//echo $phoneBook[1]['phone'];

				echo "<ul>";
				foreach ($phoneBook as $key => $value) {
					echo "<li>".$value['name'].":".$value['phone']."</li>";
				}
				echo "</ul>";

				$s = "Швидка";
				for ($i=0; $i < count($phoneBook); $i++) { 
					if($phoneBook[$i]['name']==$s){
						echo $phoneBook[$i]['phone'];
					}
				}

				my_print_r(123);

				function my_print_r($array){
					if(is_array($array)){
						echo "<pre>";
						print_r($array);
						echo "</pre>";
					}else{
						echo $array;
					}
				}

				function Pifagor($a = null,$b = null){
					
					if($a!=null||$b!=null){
						if(is_int($a)&&is_int($b)){
							$c = sqrt($a*$a+$b*$b);
							echo "Довжина гіпотенузи $c";
						}else{
							echo "Один з елементів не число";
						}
					}else{
						echo "Не задано числа";
					}
					
					
				}

				Pifagor(4);		



			?>
		</div>
		<footer>
			
		</footer>		
	</body>
</html>