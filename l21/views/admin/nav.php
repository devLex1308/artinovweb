<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
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
				if(User::isLogged()){
					?>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Зупинки</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/station">Всі</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/station/create">Створити</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Маршрути</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/route">Всі</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/route/create">Створити</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Вид</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/category">Вид транспорту</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/category/create">Створити</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Користувачі</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/users">Всі</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/user/create">Створити</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Транспорт</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/transport">Весь транспорт</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/transport/create">Створити</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Статті</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/article">Всі</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/article/create">Створити</a>
						</div>
					</li>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Медіафайли</a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/gallery/upload">Всі</a>
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/gallery/upload">Додати</a>
						</div>
					</li>

					<?php
				} else {
					?>
					<!-- <li class="nav-item active">
						<a class="nav-link">Головна <span class="sr-only">(current)</span></a>
					</li> -->
					<?php
				}
				if(User::isLogged()){
					?>

					<li class="nav-item dropdown btn-group">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']; ?></a>
						<div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
							<a class="dropdown-item" href="<?php echo LOCALPATH;?>/admin/logout">Вихід</a>
						</div>
					</li>

					<?php
				} else {
					?>

					<li class="nav-item">
						<a href="<?php echo LOCALPATH;?>/admin/authorization" class="nav-link">Вхід</a>
					</li>

					<li class="nav-item">
						<a href="<?php echo LOCALPATH;?>/admin/logout" class="nav-link">Реєстрація</a>
					</li>

					<?php
				}
				?>
			</ul>
		</div>
	</div>
</nav>
