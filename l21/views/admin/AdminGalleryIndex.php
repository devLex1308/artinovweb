<?php
require_once ROOT."/views/admin/header.php";

$address = '/resourses/images/';
if ($_POST) {
	if($_POST['new'] != ''){
		$file = $_POST['old'];
		$info = pathinfo($file);
		rename(ROOT.'/resourses/images/'.$_POST['old'], ROOT.$address.$_POST['new'].'.'.$info['extension']);
	} else {
		echo "Введіть назву, не залишайте поле пустим";
	}
}

?>
<style>
	.card{
		width: 30%;
		float: left;
		margin: 1%;	
	}
	@media (max-width: 578px) {
		
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-112 content">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<?php
			$dir = ROOT."/resourses/images";
			$allFiles = (scandir($dir));
			unset($allFiles[0]);
			unset($allFiles[1]);
			sort($allFiles);
			 // int unlink ( string filename)
			 // int rename ( string old, string new)
			if (!empty($allFiles)) {
				$i = 1;
				foreach ($allFiles as $key => $img) {
					$info = pathinfo($img);
					$filename = basename($img,'.'.$info['extension']);
					?>
					<form method="POST">
					<div class="card">
						<div class="img">
							<img class="img-fluid" src="..<?php echo $address.$img; ?>" alt="Card image cap">
						</div>
						<div class="card-block">
						<input type="hidden" value="<?php echo $img; ?>" name="old">
						<input type="text" value="<?php echo $filename; ?>" name="new">
						<button type="submit" class="btn btn-default"><span class="custom glyphicon glyphicon-ok" aria-hidden="true"></button>
						<button class="deleteAjax btn btn-danger glyphicon glyphicon-remove" data-nameModel="img" data-id=""></button>
						</div>
					</div>
					</form>
					<?php
					$i++;
				}
			}
			?>
		</div>
	</div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>