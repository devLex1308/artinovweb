<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title;echo " ".$station['name'] ?></h1>
     <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Назва зупинки</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" value="<?php echo $station['name'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Опис зупинки</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="Короткий опис зупинки при необхідності..." value="<?php echo $station['description'];?>"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_real" class="col-sm-9 control-label">Чи це справжня зупинка чи необхідна для руху по карті?</label>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label>
                                <input type="checkbox" name="is_real" id="is_real" value="option1"
								<?php
									if($station['is_real']){
										echo "checked";
									}
								?>
                                 >
                                Так
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="neighboring_stop" class="col-sm-3 control-label">Сусідні або зв'язані зупинки</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" id="neighboring_stop" name="neighboring_stop" placeholder="Перелік зупинок" value="<?php echo $station['neighboring_stop'];?>"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="map_x" class="col-sm-3 control-label">Координата Х на карті-схемі</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="map_x" name="map_x" placeholder="Координата Х" value="<?php echo $station['map_x'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="map_y" class="col-sm-3 control-label">Координата Y на карті-схемі</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="map_y" name="map_y" value="<?php echo $station['map_y'];?>" placeholder="Координата Y" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="latitude" class="col-sm-3 control-label">Широта</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="49° 13'" value="<?php echo $station['latitude'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="longitude" class="col-sm-3 control-label">Довгота</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="28° 28'" value="<?php echo $station['longitude'];?>" required>
                    </div>
                </div>
                <input type="hidden" name="typeform" value="editStation">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="editStation" type="submit" value="Зберегти" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
    </div>
</div>
<?php
  require_once ROOT."/views/admin/footer.php";
?>

