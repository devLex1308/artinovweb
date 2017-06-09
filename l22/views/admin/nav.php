<style>
	.mr-auto {
	    margin-left: auto !important;
   	 	margin-right: 15px !important;
	}
	.btn-group{
    	align-self: flex-end;
	}
</style>
<nav class="navbar navbar-toggleable-sm navbar-dark bg-primary">
	<div class="container">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="<?php echo LOCALPATH;?>/">
			<strong>Головна</strong>
		</a>
		<div class="collapse navbar-collapse" id="navbarNav1">
			<ul class="navbar-nav mr-auto">

				<?php
				if(User::isAdmin()){
					?>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Додати (+)</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/station/create">Зупинки</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/route/create">Маршрути</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/category/create">Категорію для статтей</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/type_carriage/create">Вид транспорту</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/user/create">Користувача</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/transport/create">Транспорт</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/article/create">Статті</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/gallery/upload">Медіафайли</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Переглянути</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/station">Зупинки</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/route">Маршрути</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/category">Категорії для статтей</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/type_carriage">Вид транспорту</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/users">Користувачі</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/transport">Весь транспорт</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/article">Статті</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/gallery">Медіафайли</a>
						</div>
					</li>

					<?php
				} else {
					?>
					<li class="nav-item active">
						<a class="nav-link">Головна <span class="sr-only">(current)</span></a>
					</li>
					<?php
				}
				if(User::isLogged()){
					?>

					<li class="nav-item dropdown btn-group active">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']; ?></a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/logout">Вихід</a>
						</div>
					</li>

					<?php
				} else {
					?>

					<li class="nav-item btn-group">
						<a href="<?php echo LOCALPATH;?>/admin/authorization" class="nav-link">Вхід</a>
					</li>

					<li class="nav-item btn-group">
						<a href="<?php echo LOCALPATH;?>/admin/logout" class="nav-link">Реєстрація</a>
					</li>

					<?php
				}
				?>
			</ul>
		</div>
	</div>
</nav>
