<?php

abstract class Transport{
	protected $brend = "не визначено";
	public $FuilVolume;
	public $FuilPer100Km;
	public $color;
	public $power = 200;
	
	public function carDistanse(){
		$distanse = $this->FuilVolume/$this->FuilPer100Km*100;
		echo "Автомобіль {$this->brend} може проїхати $distanse км<br>";
	}

	public function test(){
		echo "Це метод test з класу Transport <br/>";
	}

	public static function SayHello(){
		echo "Hello";
	}

	final public function constant(){

		echo "Цей метод не можна змінити!<br>";
	}

}