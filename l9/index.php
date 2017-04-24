<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/main.js"></script>
			<title>
					Реєстрація
			</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="index.html">Головна</a>
			</nav>
		</header>
		<?php
			print_r($_POST);

			# MySQL через PDO_MYSQL   
	  
	  	$host = 'localhost';
		$dbname = 'artinow_test';
		$user = 'root';
		$pass = '';
	
		$fio = $_POST['fio'];
		$pass1 = $_POST['password'];
		
		# MySQL через PDO_MYSQL  
			
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
		
		/*Вставити*/
			
			$sql = '
				INSERT INTO users
					SET
					fio = :fio,
					pass = :pass

			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":fio", 	$fio, 	PDO::PARAM_STR);
			$query->bindParam(":pass", 	$pass1, PDO::PARAM_STR);
			
			$query->execute();
		

		?>

		<div id="content">
			<h1>Реєстрація</h1>
		<form action="" method="POST">
			<p>Введіть ФІО</p>
			<input type="text" name="fio" required>
			<p>Введіть пароль</p>
			<input type="password" name="password" required>
			<p>Повторіт пароль</p>
			<input type="password" name="password2" required>
			
			<?php
			if(isset($_POST['fio'])){
				if($_POST['password']==$_POST['password2'])
					echo "good boy!";

				else
					echo "ERROR!! passwords are not match!!";
				
				$a = mt_rand(0,9);
				$b = mt_rand(0,9);
				$sum = $a + $b;
			?>

			<p>Введіть в поле результат виразу 
				<?php echo $a;?>+<?php echo $b;}else
					echo "Ви ввели неправильний пароль";?>
			</p>
			<input type="hidden" name="capcha_result" value="<?php echo $sum;?>">
			<input type="text" name="capcha">
			<input type="submit">
		</form>

			
		</div>
		<footer>
			
		</footer>		
	</body>
</html>