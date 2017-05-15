<?php
class Transport{
	public static function createTransport($name){
        //ф-ція перевірки на мінімальну і максимальну довжину строки
        function checkLength($value = "", $min, $max) {
            $length=mb_strlen($value);
            $result = ($length > $min || $length < $max);
            return $result;
        }
        if(!empty($name)) {
            if(checkLength($name, 2, 20) ) {
                $DBH = Db::getConnection();
                $sql = '
				INSERT INTO type_carriage
					SET
						name=:name
			';
                $query = $DBH->prepare($sql);
                $query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
                $query->execute();
            } else {
                echo "Введіть вірно дані";
            }
        }
	}
	public static function getAllCarriage(){
		# MySQL через PDO_MYSQL
		$DBH = Db::getConnection();
		$sql = '
				SELECT id,name 
				FROM type_carriage
			';
			
		$query = $DBH->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public static function getCarriageById($id){
		# MySQL через PDO_MYSQL
		$DBH = Db::getConnection();
		$sql = '
				SELECT * 
				FROM type_carriage
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->execute();
		return $query->fetch();
	}
	public static function editCarriage(
										$id,	
										$name
										){
		$DBH = Db::getConnection();
			$sql = '
				UPDATE type_carriage
					SET
						name=:name
					WHERE id = :id

			';
			
			$query = $DBH->prepare($sql);
			$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
			$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
			$query->execute();
	}
	public static function deleteCarriageById($id){
		# MySQL через PDO_MYSQL
		$DBH = Db::getConnection();
		$sql = '
				DELETE  
				FROM type_carriage
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->execute();
	}
}