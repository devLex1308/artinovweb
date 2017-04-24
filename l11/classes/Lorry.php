<?php
class Lorry extends Transport
{
	public $load;
	public $coutAxis;
	const LORRYWEIGHT = 5000;

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
		//echo "Це метод test з класу Transport <br/>";
		parent::test();
		echo "Вивожу ще одну стрічку<br>";
	}


	public function axisWeight(){
		$axisWeight = ($this::LORRYWEIGHT+$this->load)/$this->coutAxis;
		echo "Автомобіль {$this->brend} має максимальне навантаження на вісь $axisWeight кг<br>";
	}
}