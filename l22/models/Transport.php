<?php
class Transport{

	public static function createTransport(
											$name,
											$description,
											$carriage_id,
											$route_id
										){
        //ф-ція перевірки на мінімальну і максимальну довжину строки
        //Таке вопше треба робити у КОНТРОЛЕРІ!!!
        function checkLength($value = "", $min, $max) {
            $length=mb_strlen($value);
            $result = ($length > $min || $length < $max);
            return $result;
        }

        if(!empty($name)) {
            // if(checkLength($name, 2, 20) ) {
                $DBH = Db::getConnection();
                $sql = '
				INSERT INTO transport
					SET
						name=:name,
						description=:description,
						carriage_id=:carriage_id,
						route_id=:route_id
			';
                $query = $DBH->prepare($sql);
                $query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
				$query->bindParam(":description", 	$description, 	PDO::PARAM_STR);
				$query->bindParam(":carriage_id", 	$carriage_id, 	PDO::PARAM_INT);
				$query->bindParam(":route_id", 	$route_id, 	PDO::PARAM_INT);
                $query->execute();
            // } else {
            //     echo "Введіть вірно дані";
            // }
        }
	}

	public static function getAllTransport(){
		$DBH = Db::getConnection();
		$sql = '
				SELECT id, name, carriage_id, route_id 
				FROM transport
			';
			
		$query = $DBH->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}

	public static function getTrasportById($id){
		$DBH = Db::getConnection();
		$sql = '
				SELECT * 
				FROM transport
				WHERE id = :id
			';
			
		$query = $DBH->prepare($sql);
		$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
		$query->execute();
		return $query->fetch();
	}

	public static function editTransport(
										$id,	
										$name,
										$description,
										$carriage_id,
										$route_id
										){
		$DBH = Db::getConnection();
			$sql = '
				UPDATE transport
					SET
						name=:name,
						description=:description,
						carriage_id=:carriage_id,
						route_id=:route_id
					WHERE id = :id

			';
			
			$query = $DBH->prepare($sql);
			$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
			$query->bindParam(":name", 	$name, 	PDO::PARAM_STR);
			$query->bindParam(":description", 	$description, 	PDO::PARAM_STR);
			$query->bindParam(":carriage_id", 	$carriage_id, 	PDO::PARAM_INT);
			$query->bindParam(":route_id", 	$route_id, 	PDO::PARAM_INT);
			$query->execute();
	}

	public static function deleteTransportById($id){

		$DBH = Db::getConnection();

		$sql = '
				DELETE
				FROM transport
				WHERE id = :id
				';
			
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", $id, PDO::PARAM_INT);

		$query->execute();
	}
}