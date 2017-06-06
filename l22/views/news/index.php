<?php
require_once ROOT."/views/header.php";
?>
<body>
<header>
	<div class="container"> 
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-xs align-head"></div>
			<div class="col-lg-6 col-md-6 head">
				<div class="row">
					<div class="col-xs-2 logo">
						<div class="logo-img">
							<div class="logo-txt">розклад руху онлайн</div>
						</div>
					</div>
					<div class="login col-xs-offset-8">
						<div class = "login-txt">
							<a href="<?php echo LOCALPATH; ?>/admin/authorization">Вхід/Реєстрація</a>
						</div>
					</div>
				</div>
				<div class="head-images">
					<div class="head-image"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 hidden-xs align-head"></div>
		</div>
	</div>
</header>
<div class="fon">
	<div class="fon_content_up"></div>
</div>
<div class="content">
	<div class="fon_content">
		<div class="container">
			<div class="row content-all">
				<h1><?php echo $article['name'] ;?></h1>
				<span class="articleAuthor"> <?php echo $user['fio'] ;?></span>
				<span class="articleTime"><?php echo $article['time_create'] ;?></span>
				<?php
					echo $article['context'];
				?>
			</div>
		</div>
		<div class="fon">
			<div class="fon_content_down"></div>
		</div>
	</div>
	
</div>
<footer>
	<div class="fon_down">
		<div class="news_fon_down"></div>
	</div>
	<div class="container">
		<div class="row footer">
			<div class="col-md-2 hidden-xs hidden-sm"></div>
			<div class="col-md-8">
				<p>Copyright © Goto.vn.ua Використання матеріалів допускається тільки при наявності прямого гіпертекстового посилання на цей сайт.</p>
			</div>
			<div class="col-md-2 hidden-xs hidden-sm"></div>
		</div>
	</div>
</footer>
<?php
require_once ROOT."/views/footer.php";
?>