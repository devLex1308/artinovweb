<?php

class Transport{
	private $brend;
	public $FuilVolume;
	public $FuilPer100Km;
	public $color;
	
	public function carDistanse(){
		$distanse = $this->FuilVolume/$this->FuilPer100Km*100;
		echo "Автомобіль {$this->brend} може проїхати $distanse км<br>";
	}

	public function test(){
		echo "Це метод test з класу Transport <br/>";
	}

}