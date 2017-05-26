<?php
class User{
	
	public static function createUser(
										$login,
										$pass,
										$email,
										$fio,
										$phone,
										$birthday,
										$gender,
										$time_registered
									){

		$DBH = Db::getConnection(); 

		$sql = '
			INSERT INTO user
				SET
				login=:login,
				pass=:pass,
				email=:email,
				fio=:fio,
				phone=:phone,
				birthday=:birthday,
				gender=:gender,
				time_registered=:time_registered
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":login", $login, PDO::PARAM_STR);
		$query->bindParam(":pass", $pass, PDO::PARAM_STR);
		$query->bindParam(":email", $email, PDO::PARAM_STR);
		$query->bindParam(":fio", $fio, PDO::PARAM_STR);
		$query->bindParam(":phone", $phone, PDO::PARAM_STR);
		$query->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$query->bindParam(":gender", $gender, PDO::PARAM_BOOL);
		$query->bindParam(":time_registered", $time_registered, PDO::PARAM_STR);
		
		$query->execute();
	}

	public static function getAllUsers(){
		$DBH = Db::getConnection();

		$sql = '
				SELECT *
				FROM user
				';

		$query = $DBH->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}	

	public static function getUserById($id){
		 
		$DBH = Db::getConnection();

		$sql = '
				SELECT *
				FROM user
				WHERE id = :id
				';

		$query = $DBH->prepare($sql);

		$query->bindParam(":id", $id, PDO::PARAM_INT);

		$query->execute();

		return $query->fetch();
	}

	public static function editUser(
										$id,
										$login,
										$pass,
										$email,
										$fio,
										$phone,
										$birthday,
										$gender
									){

		$DBH = Db::getConnection(); 

		$sql = '
			UPDATE user
				SET
					login=:login,
					pass=:pass,
					email=:email,
					fio=:fio,
					phone=:phone,
					birthday=:birthday,
					gender=:gender
				WHERE id = :id
		';
		
		$md5 = md5($pass);
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", $id, PDO::PARAM_INT);
		$query->bindParam(":login", $login, PDO::PARAM_STR);
		$query->bindParam(":pass", $md5, PDO::PARAM_STR);
		$query->bindParam(":email", $email, PDO::PARAM_STR);
		$query->bindParam(":fio", $fio, PDO::PARAM_STR);
		$query->bindParam(":phone", $phone, PDO::PARAM_STR);
		$query->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$query->bindParam(":gender", $gender, PDO::PARAM_BOOL);

		$query->execute();
	}

	public static function editUserWithoutPass(
										$id,
										$login,
										$email,
										$fio,
										$phone,
										$birthday,
										$gender
									){

		$DBH = Db::getConnection(); 

		$sql = '
			UPDATE user
				SET
					login=:login,
					email=:email,
					fio=:fio,
					phone=:phone,
					birthday=:birthday,
					gender=:gender
				WHERE id = :id
		';
		
		$query = $DBH->prepare($sql);

		$query->bindParam(":id", $id, PDO::PARAM_INT);
		$query->bindParam(":login", $login, PDO::PARAM_STR);
		$query->bindParam(":email", $email, PDO::PARAM_STR);
		$query->bindParam(":fio", $fio, PDO::PARAM_STR);
		$query->bindParam(":phone", $phone, PDO::PARAM_STR);
		$query->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$query->bindParam(":gender", $gender, PDO::PARAM_BOOL);

		$query->execute();
	}

	public static function deleteUserById($id){
		 
		$DBH = Db::getConnection();

		$sql = '
				DELETE
				FROM user
				WHERE id = :id
				';

		$query = $DBH->prepare($sql);

		$query->bindParam(":id", $id, PDO::PARAM_INT);

		$query->execute();
	}

	public static function getLengthField($field){
		// Перевірка максимальної можливої довжини поля
		$DBH = Db::getConnection();
		$q = $DBH->prepare("DESCRIBE user");
		$q->execute();
		$table_users = $q->fetchAll(PDO::FETCH_UNIQUE);
		$text = $table_users[$field][0];
		return substr(substr(strrchr($text, '('), 1), 0, -1);
	}

	public static function isLogin($new_login){
		$DBH = Db::getConnection();

		$sql = '
				SELECT login
				FROM user
				';

		$query = $DBH->prepare($sql);
		$query->execute();
		$logins = $query->fetchAll();

		foreach ($logins as $key => $login) {
			if($login['login'] == $new_login) return true;
		}
		return false;
	}

	public static function isEmail($new_email){
		$DBH = Db::getConnection();

		$sql = '
				SELECT email
				FROM user
				';

		$query = $DBH->prepare($sql);
		$query->execute();
		$emails = $query->fetchAll();

		foreach ($emails as $key => $email) {
			if($email['email'] == $new_email) return true;
		}
		return false;
	}

	public static function isUserAuthorization($login, $pass){
		$DBH = Db::getConnection();

		$sql = '
				SELECT id,fio,login
				FROM user
				WHERE login=:login AND pass=:pass
				';
		$md5 = md5($pass);
		$query = $DBH->prepare($sql);
		$query->bindParam(":login", $login, PDO::PARAM_STR);
		$query->bindParam(":pass", $md5, PDO::PARAM_STR);

		$query->execute();
		return $query->fetch();

	}
}