<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
	<title>
		Слайдер
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
	<style>
		.slider img{
			position: absolute;
			width: 100%;
			z-index: 1;
			transition: left 1s linear;
		}

		.slider img.active{
			z-index: 2;
			left: 0;
		}

		.slider img.activeNext{
			z-index: 2;
			left: -100%;
		}
		.slider img.activePrev{
			z-index: 2;
			left: 100%;
		}
	</style>
	<div id="content">
		<h1>Слайдер</h1>

		<div class="slider">
			<div class="wrepImages">	
				<img src="images/1.jpg" alt="">
				<img src="images/2.jpg" alt="">
				<img src="images/3.jpg" alt="">
				<img src="images/4.jpg" alt="">
				<img src="images/5.jpg" alt="">
				<img src="images/6.jpg" alt="">
				<img src="images/7.jpg" alt="">
				<img src="images/8.jpg" alt="">
				<img src="images/9.jpg" alt="">
				<img src="images/10.jpg" alt="">
			</div>
			<div class="wrepButton">	
				<button class="prev">Назад</button>
				<button class="next">Вперід</button>
			</div>
		</div>
		
	</div>
	<footer>
		
		
	</footer>		
</body>
</html>