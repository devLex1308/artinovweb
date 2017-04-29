<?php

class Cat extends HomeAnimals{
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




		public function PlayingWithBall(){
		echo "Грає з клубком";
	}

}