<?php
require_once ROOT."/views/news/header.php";
?>
<body>
	<input type="hidden" name = "LOCALPATH" id="LOCALPATH" value="<?php echo LOCALPATH;?>">
	<header>
		<div class="container"> 
			<div class="row">
				<div class="col-lg-3 col-md-3 hidden-xs align-head"></div>
				<div class="col-lg-6 col-md-6 head">
					<div class="row">
						<div class="col-xs-2 logo">
							<a href="<?php echo LOCALPATH; ?>">
								<div class="logo-img">
									<div class="logo-txt">розклад руху онлайн</div>
								</div>
							</a>
						</div>
						<div class="login col-xs-offset-8">
							<div class = "login-txt">
								<a href="<?php echo LOCALPATH; ?>/admin/authorization">Вхід/Реєстрація</a>
							</div>
						</div>
					</div>
					<div class="head-text">
						<h1>Архів новин</h1>
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
			<div class="fon">
				<div class="fon_content_down"></div>
			</div>
		</div>
		<style>
			.context{
				width:80%;
			}
			.content-all img{
				width: 100%;
			}

		</style>
		<div class="container news">
			<div class="row">
				<div class="col-lg-2 col-md-2 hidden-sm left-right-block-wrap"></div>
				<div class="col-lg-8 col-md-8 block">
					<div class="row content-all">
						<h1><?php echo $article['name'] ;?></h1>
						<div class="articleAuthor"> <?php echo $user['fio'] ;?></div>
						<div class="articleTime"><?php echo $article['time_create'] ;?></div>
						<div class="context">
							<?php
							echo $article['context'];
							?>
						</div>
					</div>
					<div class="row button_more" align="center">
						<a href="<?php echo LOCALPATH; ?>/news"><button class="btn other-news">Інші новини</button></a>
					</div>
				</div>
			</div>	
			<div class="col-lg-2 col-md-2 hidden-sm left-right-block-wrap"></div>
		</div>
	</div>
</div>
<footer>
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
require_once ROOT."/views/news/footer.php";
?>