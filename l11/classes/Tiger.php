<?php

class Tiger extends WildAnimals implements Hunting{
	public function __construct(
								$animalName,
								$voice,
								$weight,
								$color,
								$afraid,
								$fastReaction,
								$hungry,
								$livingPlace
								){
		$this->animalName=$animalName;
		$this->voice=$voice;
		$this->weight=$weight;
		$this->color=$color;
		$this->afraid=$afraid;
		$this->fastReaction=$fastReaction;
		$this->hungry=$hungry;
		$this->livingPlace=$livingPlace;
		echo "Створено об`єкт {$this->animalName} класу Tiger<br>";
	}
	public function findTarget(){
		echo "Тигр знаходить жертву<br>";
	}
	public function killTarget(){
		echo "Тигр вбиває жертву<br>";
	}
}