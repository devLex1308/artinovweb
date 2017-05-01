<?php
	require_once "header.php";
?>
		<div class="content">
			<h1><?php echo $_SERVER['REQUEST_URI'];?></h1>
			<pre>
			<?php 
				//print_r($_SERVER);
				$url = $_SERVER['REQUEST_URI'];
				$aUrl = explode("/", $url);
				$class = ucfirst($aUrl[2]);
				$action = "action".ucfirst($aUrl[3]);
				$fileName = "classes/".$class.".php";
				require_once($fileName);

				$object = new $class();
				$object->$action();

				print_r($aUrl);

			?>
			</pre>

		</div>
<?php
	require_once "footer.php";
?>