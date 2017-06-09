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
					<div class="title">
						<div class="text-last-news"><a href="<?php echo LOCALPATH; ?>/news">Останні новини</a></div>
						<div class="head-text">
							<h1><?php echo $article['name'] ;?></h1>
						</div>
						<div class="description">
							<?php
							echo $article['description'];
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 hidden-xs align-head"></div>
			</div>
		</div>
	</header>
	<div class="content">
		<div class="fon_content">
			<div class="fon">
				<div class="fon_content_down"></div>
			</div>
		</div>
		<div class="container news">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"></div>
				<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 block">
					<div class="block-news-border">
						<div class="row">
							<div class="block-news">
								<div class="image-news-block">
									<?php
									if(isset($image['name'])){
										?>
										<div class="image-news" style="background: url(<?php echo LOCALPATH; ?>/resourses/images/<?php echo $image['name']; ?>) no-repeat center center; background-size: cover;"></div>
										<?php
									} else {
										?>
										<div class="image-news" style="background: url(<?php echo LOCALPATH; ?>/template/images/no-image.png) no-repeat center center; background-size: cover;"></div>
										<?php
									}
									?>
								</div>
								<div class="social">
									<div class="share-txt">Поділитися:</div>
									<div class="social-fb"><div class="social-count"><?php echo $article['shared_fb']; ?></div></div>
									<div class="social-g"><div class="social-count"><?php echo $article['shared_google']; ?></div></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row content-all">
						<div class="context">
							<?php
							echo $article['context'];
							?>
						</div>
					</div>
					<div class="time-image"></div>
					<div class="text-time">
						<?php 
						$date = new DateTime($article['time_create']);
						echo $date->format('d.m.Y');
						?>
					</div>
					<div class="row button_more" align="center">
						<a href="<?php echo LOCALPATH; ?>/news"><button class="btn other-news">Інші новини</button></a>
					</div>
				</div>
			</div>	
			<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"></div>
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