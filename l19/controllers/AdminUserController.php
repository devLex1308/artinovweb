<?php
class AdminUserController {

	public function actionIndex(){
		User::checkAdmin();
		$title = "Вивід усіх користувачів";
		$users = User::getAllUsers();
		require_once ROOT."/views/admin/AdminUserIndex.php";
		return true;
	}

	public function actionCreate(){
		User::checkAdmin();
		$title = "Створення користувача";

		if(isset($_POST['createUser'])){

			$errors = [];

			if(User::getLengthField('login') < strlen($_POST['login'])){
				$errors[] = "Макс.: <b>".User::getLengthField('login')."</b>. Ви ввели: <b>".strlen($_POST['login'])."</b> символів у поле <b>login</b>.";
			}

			if(User::getLengthField('pass') < strlen($_POST['pass'])){
				$errors[] = "Макс.: <b>".User::getLengthField('pass')."</b>. Ви ввели: <b>".strlen($_POST['pass'])."</b> символів у поле <b>pass</b>.";
			}

			if(User::getLengthField('email') < strlen($_POST['email'])){
				$errors[] = "Макс.: <b>".User::getLengthField('email')."</b>. Ви ввели: <b>".strlen($_POST['email'])."</b> символів у поле <b>email</b>.";
			}

			if(User::getLengthField('fio') < strlen($_POST['fio'])){
				$errors[] = "Макс.: <b>".User::getLengthField('fio')."</b>. Ви ввели: <b>".strlen($_POST['fio'])."</b> символів у поле <b>fio</b>.";
			}

			if(User::getLengthField('phone') < strlen($_POST['phone'])){
				$errors[] = "Макс.: <b>".User::getLengthField('phone')."</b>. Ви ввели: <b>".strlen($_POST['phone'])."</b> символів у поле <b>phone</b>.";
			}

			if(!is_numeric($_POST['phone'])){
				$errors[] = "Ви ввели якісь зайві символи: <b>".$_POST['phone']."</b>.";
			}

			if(!empty($_POST['gender'])){
				if($_POST['gender'] == 'on') {
					$is_gender = 1;
				}
			} else {
				$is_gender = 0;
			}

			if(!empty($_POST['admin'])){
				if($_POST['admin'] == 'on') {
					$is_admin = 1;
				}
			} else {
				$is_admin = 0;
			}
			
			if(User::isLogin($_POST['login'])){
				$errors[] = "Такий логін уже існує: <b>".$_POST['login']."</b>.";
			}

			if(User::isEmail($_POST['email'])){
				$errors[] = "Така поштова адреса уже існує: <b>".$_POST['email']."</b>.";
			}

			if (empty($errors)){

				$time_registered = date("Y-m-d H:i:s");

				User::createUser(
					$_POST['login'],
					$_POST['pass'],
					$_POST['email'],
					$_POST['fio'],
					$_POST['phone'],
					$_POST['birthday'],
					$is_gender,
					$time_registered,
					$is_admin
				);
			}
		}
		require_once ROOT."/views/admin/AdminUserCreate.php";
		return true;
	}

	public function actionEdit($id){
		User::checkAdmin();
		$title = "Редагування користувача:";
		if(isset($_POST['editUser'])){

			$errors = [];

			if(User::getLengthField('login') < strlen($_POST['login'])){
				$errors[] = "Макс.: <b>".User::getLengthField('login')."</b>. Ви ввели: <b>".strlen($_POST['login'])."</b> символів у поле <b>login</b>.";
			}

			if(User::getLengthField('pass') < strlen($_POST['pass'])){
				$errors[] = "Макс.: <b>".User::getLengthField('pass')."</b>. Ви ввели: <b>".strlen($_POST['pass'])."</b> символів у поле <b>pass</b>.";
			}

			if(User::getLengthField('email') < strlen($_POST['email'])){
				$errors[] = "Макс.: <b>".User::getLengthField('email')."</b>. Ви ввели: <b>".strlen($_POST['email'])."</b> символів у поле <b>email</b>.";
			}

			if(User::getLengthField('fio') < strlen($_POST['fio'])){
				$errors[] = "Макс.: <b>".User::getLengthField('fio')."</b>. Ви ввели: <b>".strlen($_POST['fio'])."</b> символів у поле <b>fio</b>.";
			}

			if(User::getLengthField('phone') < strlen($_POST['phone'])){
				$errors[] = "Макс.: <b>".User::getLengthField('phone')."</b>. Ви ввели: <b>".strlen($_POST['phone'])."</b> символів у поле <b>phone</b>.";
			}

			if(!is_numeric($_POST['phone'])){
				$errors[] = "Ви ввели якісь зайві символи: <b>".$_POST['phone']."</b>.";
			}

			if(!empty($_POST['gender'])){
				if($_POST['gender'] == 'on') {
					$is_gender = 1;
				}
			} else {
				$is_gender = 0;
			}

			if(!empty($_POST['admin'])){
				if($_POST['admin'] == 'on') {
					$is_admin = 1;
				}
			} else {
				$is_admin = 0;
			}

			if (empty($errors)){
				
				if(!empty($_POST['pass'])){
					User::editUser(
						$id,
						$_POST['login'],
						$_POST['pass'],
						$_POST['email'],
						$_POST['fio'],
						$_POST['phone'],
						$_POST['birthday'],
						$is_gender,
						$is_admin
					);
				} else {
					User::editUserWithoutPass(
						$id,
						$_POST['login'],
						$_POST['email'],
						$_POST['fio'],
						$_POST['phone'],
						$_POST['birthday'],
						$is_gender,
						$is_admin
					);
				}
			}
		}
		$user = User::getUserById($id);
		require_once ROOT."/views/admin/AdminUserEdit.php";
		return true;
	}

	public function actionDelete($id){
		User::checkAdmin();
		if(!isset($_SESSION['login'])){
			require_once ROOT."/views/admin/header.php";
			echo "<center><h1> Увас немає прав доступу! </h1></center>";
			require_once ROOT."/views/admin/footer.php";
			die();
		}

		$title = "Виддалення Користувача";
		User::deleteUserById($id);
		require_once ROOT."/views/admin/AdminUserDelete.php";
		echo '<script type="text/javascript">
           window.location = "'.LOCALPATH.'/admin/users"
      	</script>';
		require_once ROOT."/views/admin/AdminUserDelete.php";
		return true;
	}

	public function actionAuthorization(){

		$errors = [];

		$title = "Авторизація";
		if(isset($_POST['authorization'])){
			$user = User::isUserAuthorization($_POST['login'], $_POST['pass']);
			if(!empty($user)){
				$_SESSION['login'] = $user['login'];
				$_SESSION['user_id'] = $user['id'];
				echo '<script type="text/javascript">
		           window.location = "'.LOCALPATH.'/admin/users"
		      	</script>';
			} elseif (User::isLogin($_POST['login'])){
				$errors[] = "Невірно введений пароль!";
			} else {
				$errors[] = "Користувача з таким логіном не існує!";
			}
		}

		require_once ROOT."/views/admin/AdminUserAuthorization.php";
		return true;
	}

	public static function actionLogout(){
		$title = "Ви успішно вийшли";

		unset($_SESSION['login']);
		unset($_SESSION['user_id']);
		echo '<script type="text/javascript">
           window.location = "'.LOCALPATH.'/"
      	</script>';
		// require_once ROOT."/views/admin/AdminUserAuthorization.php";
		return true;
	}
}