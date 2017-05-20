<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="js/main.js"></script>
			<title>
					Крапочка
			</title>
	</head>
	<body>
		<style>
			td{
				width: 20px;
				height: 20px;
				background: grey;
			}

			td.point{
				background: red;
			}
		</style>
		<header>
			<nav>
				<a href="index.html">Крапочка</a>
			</nav>
		</header>
		<div id="content">
			<h1>Крапочка</h1>
			<?php
				$displayWidth = 30;
				$displayHeight = 40;

				$html = "<table id='display' data-width='$displayWidth' data-height='$displayHeight'>";
				for ($y=0; $y < $displayHeight; $y++) { 
					$html .= "<tr>";
					for ($x=0; $x < $displayWidth; $x++) { 
						$html .= "<td id='position_{$x}_{$y}'></td>";
					}

					$html .= "</tr>";
				}
				$html .= "</table>";
				echo "$html";
			?>
		</div>
		<footer>
			
		</footer>		
	</body>
</html>