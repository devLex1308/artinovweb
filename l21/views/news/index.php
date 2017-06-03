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
				<div class="col-lg-3 col-md-3 hidden-sm left-right-block-wrap"></div>
				<div class="col-lg-6 col-md-6 block">
					<div class="row">
						<div class="col-xs-2 hidden-xs align-general">
							<div class="head-pic">
								<div class="uzor"></div>
							</div>
						</div>
						<div class="col-xs-8 general">
						<div class="row">
							<div class="hidden-lg hidden-md hidden-sm col-xs-1 mobile-align"></div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-10 mobile-general">
									<div class="general-text">
										Прибуття найближчого <br> громадського транспорту
									</div>
									<form class="form-inline" method="POST">
										<div class="text">
											Вкажіть який транспорт ви очікуєте:
										</div>
										<div class="row transports">
											<label class="radio-inline transport transport-1">
												<input type="radio" checked="checked" value="tram" name="transport" id="tram-id-1">
												<div class="transport-fon">
													<div class="transport-fon-1" id="tram-id"></div>
												</div>
												<div class="transport-name" id="tram-txt">Трамвай</div>
											</label>
											<label class="radio-inline transport transport-2">
												<input type="radio" value="trolleybus" name="transport" id="trolleybus-id-1">
												<div class="transport-fon">
													<div class="transport-fon-2" id="trolleybus-id"></div>
												</div>
												<div class="transport-name" id="trolleybus-txt">Тролейбус</div>
											</label>
											<label class="radio-inline transport transport-3">
												<input type="radio" value="bus" name="transport" id="bus-id-1">
												<div class="transport-fon">
													<div class="transport-fon-3" id="bus-id"></div>
												</div>
												<div class="transport-name" id="bus-txt">Автобус</div>
											</label>
										</div>
										<div class="station">
											<div class="form-group col-xs-9 mobile-input">
												<input size="100%" class="form-control input-station" type="text" name="station" placeholder="Назва зупинки">
											</div>
											<div class="form-group col-xs-3 mobile-go">
												<input type="submit" class="btn go" value="GO">
											</div>
										</div>
									</form>
									<div class="txt-1">
										<a href="#">ПЕРЕГЛЯНУТИ КАРТУ</a>
									</div>
									<div class="txt-2">
										Або використайте розширенні <a href="#">налаштування</a>
									</div>
							</div>
							<div class="hidden-lg hidden-md hidden-sm col-xs-1 mobile-align"></div>
						</div>
							
						</div>
							<div class="col-xs-2 hidden-xs align-general"></div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 hidden-sm left-right-block-wrap"></div>
			</div>
		</div>
		<div class="fon">
			<div class="fon_content_down"></div>
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