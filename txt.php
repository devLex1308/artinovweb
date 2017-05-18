<?php
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/main.js"></script>
			<title>
					Робота з Сесіями
			</title>
	</head>
	<body>
		<header>
			<img src="https://upload.wikimedia.org/wikipedia/commons/4/41/SEGA_logo.png"><br>
			<a href="">New CONFLICT hahaha</a>


			<nav>
				<a href="index.html">Головна</a>
			</nav>
		</header>
		<div id="content">
			<h1>Робота з Сесіями</h1>
			
			<?php
				echo $_SESSION["user"];
			?>
			
		
		</div>
		<footer>
			
			
		</footer>		
	</body>
</html>