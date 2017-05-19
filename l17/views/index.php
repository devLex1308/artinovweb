<?php
require_once ROOT."/views/header.php";
?>
<body>
	<div id="wrapper">
		<header id="header">
			<div class="container cont"> 
				<div class="row">
					<div class="menu col-lg-2 col-md-2 hidden-xs"></div>
					<div class="menu col-lg-10 col-md-11 head">
						<div class="row logo">
							<div class="col-xs-2 logo-img">
								<img src="<?php echo LOCALPATH; ?>/template/images/logo.png">
							</div>
							<div class="col-xs-1 logo-txt">
								розклад руху онлайн
							</div>
							<div class="login col-xs-offset-8">
								<div class = "login-txt"><a href="<?php echo LOCALPATH; ?>/admin/authorization">Вхід/Реєстрація</a></div>
							</div>
						</div>
						<div class="part-images">
							<span class="head-image">
								<img src="<?php echo LOCALPATH; ?>/template/images/head.png">
							</span>
							<span class="head-pic-1">
								<img src="<?php echo LOCALPATH; ?>/template/images/pic-1.png">
							</span>
						</div>
					</div>
					<div class="menu col-lg-2 col-md-2 hidden-xs"></div>
				</div>
			</div>
		</header>
		<div class="content">
			<div class="container">
				<div class="row content-all">
					<div class="col-lg-2 col-md-2 hidden-xs"></div>
					<div class="col-lg-10 col-md-8 block">
						<div class="row general-text">
							<div class="col-xs-2 uzor-2">
								<span class="head-pic-2">
									<img src="<?php echo LOCALPATH; ?>/template/images/pic-2.png">
								</span>
							</div>
							<div class="col-xs-8 general"">
								<div class="general-text">
									Прибуття найближчого <br> громадського транспорту
								</div>
								<br>
								<form class="form-inline" method="POST">
									<div class="row text">
										Вкажіть який транспорт ви очікуєте:
									</div>
									<div class="row transport">
										<label class="radio-inline t t1">
											<input type="radio" value="tram" name="transport" id="tram-id-1" onClick="tram('tram-id')">
											<img src="<?php echo LOCALPATH; ?>/template/images/tram.png" id="tram-id">
											<span class="rez" id="tram-txt">Трамвай</span>
										</label>
										<label class="radio-inline t t2">
											<input type="radio" value="trolleybus" name="transport" id="trolleybus-id-1" onClick="tram('trolleybus-id')">
											<img src="<?php echo LOCALPATH; ?>/template/images/trolleybus.png" id="trolleybus-id">
											<span class="rez" id="trolleybus-txt">Тролейбус</span>
										</label>
										<label class="radio-inline t t3">
											<input type="radio" value="bus" name="transport" id="bus-id-1" onClick="tram('bus-id')">
											<img src="<?php echo LOCALPATH; ?>/template/images/bus.png" id="bus-id"><span class="rez" id="bus-txt">Автобус</span>
										</label>
									</div>
									<div class="form-group row is">
										<input class="form-control input-station" type="text" name="station" placeholder="Назва зупинки">
										<input type="submit" class="btn btn-primary go" value="GO">
									</div>
								</form>
								<div class="txt-1">
									<p><a href="#">ПЕРЕГЛЯНУТИ КАРТУ</a></p>
								</div>
								<div class="txt-2">
									<p>Або використайте розширенні <a href="#" class="setting">налаштування</a> </p>
								</div>
							</div>
							<div class="col-xs-2"></div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 hidden-xs"></div>
				</div>
			</div>
			<div class="container news">
				<div class="row">
					<div class="col-md-2 hidden-xs hidden-sm"></div>
					<div class="col-md-8">
						<div class="slider">
							<div class="cycle-slideshow" 
							data-cycle-fx=scrollHorz 
							data-cycle-timeout=2000
							data-cycle-pager-event="mouseover"
							>
							<div class="cycle-pager"></div>
							<div class="cycle-overlay"></div>
							<div class="cycle-prev"></div>
							<div class="cycle-next"></div>

							<img src="http://malsup.github.io/images/p1.jpg" 
							data-cycle-title="Spring" 
							data-cycle-desc="Sonnenberg Gardens">
							<img src="http://malsup.github.io/images/p2.jpg" 
							data-cycle-title="Redwoods" 
							data-cycle-desc="Muir Woods National Monument">
							<img src="http://malsup.github.io/images/p3.jpg" 
							data-cycle-title="Angel Island" 
							data-cycle-desc="San Franscisco Bay">
							<img src="http://malsup.github.io/images/p4.jpg" 
							data-cycle-title="Raquette Lake" 
							data-cycle-desc="Adirondack State Park">
							</div>
						</div>
					</div>	
					<div class="col-md-2 hidden-xs hidden-sm"></div>
				</div>
			</div>
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-2 hidden-xs hidden-sm"></div>
						<div class="col-md-8">
							<p>Copyright © Goto.vn.ua Використання матеріалів допускається тільки при наявності прямого гіпертекстового посилання на цей сайт.</p>
						</div>
						<div class="col-md-2 hidden-xs hidden-sm"></div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<?php
	require_once ROOT."/views/footer.php";
	?>