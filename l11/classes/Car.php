<?php
class Car extends Transport implements Drive,Fly{
	public static $count=0;
	public $objectCount = 0;

	public function __construct(
								$brend,
								$FuilVolume=50,
								$FuilPer100Km=10,
								$color="black"
								){
		$this->brend=$brend;
		$this->FuilVolume=$FuilVolume;
		$this->FuilPer100Km=$FuilPer100Km;
		$this->color=$color;
		echo "Створено об`єкт класу Car<br>";

		self::$count++;
	}

	public function printCount(){
		echo "objectCount = {$this->objectCount}<br/>";
		echo "count = ".self::$count."<br/>";
	}

	public function setCount($n){
		self::$count = $n;
	}

	public function setObjectCount($n){
		$this->objectCount = $n;
	}

	public function test(){
		echo "Перевизначили метод<br>";
	}

	public function my_constant(){
		parent::constant();
		echo "Цей метод можна змінити!<br>";
	}

	public function go(){
		echo "Ми рухаємось вперід";
	}

	public function stop(){
		echo "Ми зупиняємось";
	}

	public function up(){
		echo "Ми взлітаєм";
	}

	public function down(){
		echo "Ми сідаєм";
	}

	public function  test2(){}
	// public function __destruct(){
	// 	echo "Видалено об`єкт класу Car<br>";
	// }

}