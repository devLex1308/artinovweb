<?php
require_once ROOT."/views/admin/header.php";

if(!empty($errors)){
	foreach ($errors as $key => $error) {
		?>		
		<p class="error text-center" style="color: red">*<?=@$error;?></p>
		<?php
	}
}
?>
<style>
	.card{
		width: 30%;
		float: left;
		margin: 1%;	
	}
	.edit{
		display: block;
		float: left;
	}
	.deleteAjax{
		float: right;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-112 content">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<?php
			if (!empty($images)) {
				$address = '/resourses/images/';
				foreach ($images as $key => $image) {
					$info = pathinfo($image['name']);
					$filename = basename($image['name'],'.'.$info['extension']);
					?>
					<div class="card">
						<div class="img">
							<img class="img-fluid" src="..<?php echo $address.$image['name']; ?>" alt="Card image cap">
						</div>
						<div class="card-block">
							<form method="POST">
								<input type="hidden" value="<?php echo $image['name']; ?>" name="old">
								<input type="hidden" value="<?php echo $image['id']; ?>" name="id">
								<input type="text" value="<?php echo $filename; ?>" name="new">
								<button type="submit" class="btn btn-default edit"><span class="custom glyphicon glyphicon-ok" aria-hidden="true"></button>
							</form>
							<button class="deleteAjax btn btn-danger glyphicon glyphicon-remove" data-nameModel="images" data-id="<?php echo $image['id']; ?>"></button>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>