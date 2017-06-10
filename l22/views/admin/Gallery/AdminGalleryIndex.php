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
	.content{
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
	}
	.img{
		align-self:center;
		margin-top:4%;
	}
	.card{
		margin:1%;
		flex-direction: column;
		align-self:flex-end;
	}
	.deleteAjax{
		float: right;	}
</style>
<h1 class="text-center"><?php echo $title; ?></h1>
<div class="container">
		<div class="content">
			
			<?php
			if (!empty($images)) {
				$address = '/resourses/images/';
				foreach ($images as $key => $image) {
					$info = pathinfo($image['name']);
					$filename = basename($image['name'],'.'.$info['extension']);
					?>
					<div class=" col-md-3 col-sm-5 col-xs-10 card">
						<div class="img">
							<img class="img-fluid" src="..<?php echo $address.$image['name']; ?>" alt="Card image cap">
						</div>
						<div class="card-block">
							<form method="POST">
								<input type="hidden" value="<?php echo $image['name']; ?>" name="old">
								<input type="hidden" value="<?php echo $image['id']; ?>" name="id">
								<input type="text" value="<?php echo $filename; ?>" name="new">
								<div class="gallery-buttons">
									<button type="submit" class="btn btn-default edit"><span class="custom glyphicon glyphicon-ok" aria-hidden="true"></button>
									<button class="deleteAjax btn btn-danger glyphicon glyphicon-remove" data-nameModel="images" data-id="<?php echo $image['id']; ?>"></button>
								</div>
							</form>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>