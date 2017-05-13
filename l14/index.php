<?php
?>
	
			<?php 
				define('ROOT', dirname(__FILE__));
				define('LOCALPATH',"/l14");
				include_once "classes/Router.php";
				$router = new Router();
				$router->run();


			?>

<?php

?>