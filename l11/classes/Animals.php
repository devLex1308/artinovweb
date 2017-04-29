<?php

abstract class Animals{
	public $voice;
	public $weight;
	public $color;
	public $animalClass;
	
	public function __construct(
								$animalName,
								$animalClass,
								$voice,
								$weight,
								$color						
								){
		$this->animalName=$animalName;
		$this->animalClass=$animalClass;
		$this->voice=$voice;
		$this->weight=$weight;
		$this->color=$color;
		echo "Створено об`єкт класу Animals<br>";
	}

	public function Eating(){
		echo "Їсть";
	}
}