<?php
class Car extends Transport
{

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

	public function test(){
		echo "Перевизначили метод<br>";
	}

	// public function __destruct(){
	// 	echo "Видалено об`єкт класу Car<br>";
	// }

}