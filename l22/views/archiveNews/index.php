<?php
require_once ROOT."/views/archiveNews/header.php";
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
		<div class="container news">
			<div class="row">
				<div class="col-lg-2 col-md-2 hidden-sm left-right-block-wrap"></div>
				<div class="col-lg-8 col-md-8 block">
					<div class="allNews">
						<?php 
						if(isset($archiveNews)){
							foreach ($archiveNews as $key => $news) {
								?>

								<div id="news" class="row" align="center">
									<div class="block-news">
										<a href="<?php echo LOCALPATH.'/'.'news/'.$news['id']; ?>">
											<div class="image-news-block">
												<?php
												if(isset($news['image'])){
													?>
													<div class="image-news" style="background: url(<?php echo $news['image']; ?>) no-repeat center center; background-size: cover;"></div>
													<?php
												} else {
													?>
													<div class="image-news" style="background: url(resourses/images/Koala.jpg) no-repeat center center; background-size: cover;"></div>
													<?php
												}
												?>
											</div>
											<div class="head-text-news"><?php echo $news['name']; ?></div>
											<div class="text-news">
												<?php 
												$text = substr($news['description'], 0, 247);
												if(substr($text,-1,1) === ' ' || substr($text,-1,1) == '.' || substr($text,-1,1) == ',' || substr($text,-1,1) == '!'){
													$text = substr($news['description'], 0, 246);
												}
												echo strip_tags($text);
												?>...
											</div>
											<div class="block-time">
												<div class="time-image"></div>
												<div class="text-time">
													<?php 
													$date = new DateTime($news['time_create']);
													echo $date->format('d.m.Y');
													?>

												</div>
											</div>
										</a>
									</div>
								</div>

								<?php
							}
						} else {
							?>
							<div class="row" align="center">
								<div class="block-news">
									<div class="image-news-block">
										<div class="image-news" style="background: url(resourses/images/Koala.jpg) no-repeat center center; background-size: cover;"></div>
									</div> 
									<div class="head-text-news">Історія вінницького трамваю</div>
									<div class="text-news">Ідея створення трамвайного руху в Вінниці бере початок з 1898 року. У цей час Вінницька міська рада...</div>
									<div class="block-time">
										<div class="time-image"></div>
										<div class="text-time">17.05.2017</div>
									</div>
								</div>
							</div>
							<div class="row" align="center">
								<div class="block-news">
									<div class="image-news-block">
										<div class="image-news" style="background: url(resourses/images/Koala.jpg) no-repeat center center; background-size: cover;"></div>
									</div>
									<div class="head-text-news">Історія вінницького трамваю</div>
									<div class="text-news">Ідея створення трамвайного руху в Вінниці бере початок з 1898 року. У цей час Вінницька міська рада...</div>
									<div class="block-time">
										<div class="time-image"></div>
										<div class="text-time">17.05.2017</div>
									</div>
								</div>
							</div>
							<?php 
						}
						?>
					</div>
					<div class="row button_more" align="center">
						<button id="moreNews" class="btn">Більше новин</button>
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
require_once ROOT."/views/archiveNews/footer.php";
?>