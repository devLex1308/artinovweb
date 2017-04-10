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
					
					if($a!=null&&$b!=null){
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

				//Pifagor(1);	

				function getNameDayByNumber($n){
					echo "<br>";

					// if($n==1){
					// 	echo "Понеділок";
					// }
					// if($n==2){
					// 	echo "Вівторок";
					// }
					// if($n==3){
					// 	echo "Середа";
					// }

					switch ($n) {
						case 1:
							echo "Понеділок";
							break;
						case 2:
							echo "Вівторок";
							break;
						case 3:
							echo "Середа";
							break;
						case 4:
							echo "Четверг";
							break;
						case 5:
							echo "П'ятниця";
							break;
						case 6:
							echo "Субота";
							break;
						case 7:
							echo "Неділя";
							break;
						
						default:
							echo "В тижні тільки 7 днів, ви ввели не коректне число";
							break;
					}
				}	

				getNameDayByNumber(17);


				$array = [];
				for ($i=0; $i < $count_el; $i++) { 
					$array[mt_rand(0,60)]=mt_rand(0,100);
				}

				$array['animal'] = "dog";

				my_print_r($array);
				sort($array);
				my_print_r($array);
				echo "Обернений масив";
				$rArray = array_reverse($array);
				my_print_r($rArray);

				$array_asoc = [
						"name"=>"ff",
						"b" => 23,
						"x" => "Невідома змінна"
					];

				my_print_r($array_asoc);
				ksort($array_asoc);
				my_print_r($array_asoc);

				$animals = "кіт&пес&миша&курка&кіткіткіт";

				$aAnimals = explode("&", $animals);

				$arAnimals = array_reverse($aAnimals);

				$rAnimals = implode("Lala", $arAnimals);
				echo "$rAnimals";
				$replase = str_replace("к", "w", $animals);
				echo "<br>$replase";

				echo "<br>";
				$t = 2;

				function expT(){
					//global $t;
					if(isset($t)){
						echo "$t";
					}else{
						echo "Змінної не існує";
					}
					
					echo "<br>";
				}

				expT();
				expT();
				expT();

				

				function getPifagor($a,$b){
					$c = sqrt($a*$a+$b*$b);
					return $c;
				}

				$g = getPifagor(13,40);
				echo "<br>Гіпотенуза $g";



				function luckyTicket(){
					$count = 0;
					for ($i1=0; $i1 < 10; $i1++) { 
						for ($i2=0; $i2 < 10; $i2++) { 
							for ($i3=0; $i3 < 10; $i3++) { 
								for ($i4=0; $i4 < 10; $i4++) { 
									for ($i5=0; $i5 < 10; $i5++) { 
										for ($i6=0; $i6 < 10; $i6++) { 
											if(($i1+$i2+$i3)==($i4+$i5+$i6)){
												echo "$i1$i2$i3$i4$i5$i6 ";
												$count++;

											}

											$sum = 0;
											for ($i=0; $i < 100; $i++) { 
												$sum+=$i;
											}
										}
									}
								}
							}
						}
					}
					echo "Всього щасливих квитків $count";
				}
				$start = mktime();
				luckyTicket();
				$end = mktime();
				$time = $end - $start;

				echo "Функція luckyTicket виконувалась $time мілісекунд";
				//my_print_r($arAnimals);
			


			?>
		</div>
		<footer>
			
		</footer>		
	</body>
</html>