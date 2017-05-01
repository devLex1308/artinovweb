<?php
	require_once "header.php";
?>
		<div class="content">
			<?php
				require_once ("classes/Station.php");
				$user = new Station();
				$user->actionEdit();
			?>
		</div>
<?php
	require_once "footer.php";
?>