<?php

class Bus extends Transport{
	public $volume;

	public function __construct(
								$brend,
								$FuilVolume,
								$FuilPer100Km,
								$color,
								$volume
								){
		$this->brend=$brend;
		$this->FuilVolume=$FuilVolume;
		$this->FuilPer100Km=$FuilPer100Km;
		$this->color=$color;
		$this->volume = $volume;
		echo "Створено об`єкт класу Bus<br>";
	}
}