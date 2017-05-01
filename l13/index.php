<?php
	require_once "header.php";
?>
		<div class="content">
			<h1><?php echo $_SERVER['REQUEST_URI'];?></h1>
			<pre>
			<?php 
				define(ROOT, __DIR__);
				include_once "classes/Router.php";
				$router = new Router();
				$router->run();


			?>
			</pre>

		</div>
<?php
	require_once "footer.php";
?>