<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Адмінка</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

				<li class="active"><a href="<?php echo LOCALPATH;?>/">Home</a></li>

				<li class="dropdown">
					<a href="<?php echo LOCALPATH;?>/admin/station" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Зупинки <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo LOCALPATH;?>/admin/station">Всі</a></li>
						<li><a href="<?php echo LOCALPATH;?>/admin/station/create">Створити</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="<?php echo LOCALPATH;?>/admin/route" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Маршрути <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo LOCALPATH;?>/admin/route">Всі</a></li>
						<li><a href="<?php echo LOCALPATH;?>/admin/route/create">Створити</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="<?php echo LOCALPATH;?>/admin/category" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категорії <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo LOCALPATH;?>/admin/category">Всі</a></li>
						<li><a href="<?php echo LOCALPATH;?>/admin/category/create">Створити</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="<?php echo LOCALPATH;?>/admin/users" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Користувачі <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo LOCALPATH;?>/admin/users">Всі</a></li>
						<li><a href="<?php echo LOCALPATH;?>/admin/user/create">Створити</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="<?php echo LOCALPATH;?>/admin/transport" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Транспорт <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo LOCALPATH;?>/admin/transport">Весь транспорт</a></li>
						<li><a href="<?php echo LOCALPATH;?>/admin/transport/create">Створити</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="<?php echo LOCALPATH;?>/admin/article" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Статті <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo LOCALPATH;?>/admin/article">Всі</a></li>
						<li><a href="<?php echo LOCALPATH;?>/admin/article/create">Створити</a></li>
					</ul>
				</li>

				<?php
				if(User::isLogged()){
					?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo LOCALPATH;?>/admin/logout">Вихід</a></li>
						</ul>
					</li>
					<?php
				} else {
					?>
					<li class="dropdown">
						<a href="<?php echo LOCALPATH;?>/admin/authorization" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Вхід</a>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
</nav>