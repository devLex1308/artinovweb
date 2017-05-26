<?php
require_once ROOT."/views/admin/header.php";
?>
<script src="<?php echo LOCALPATH; ?>/template/js/leaflet.js"></script>
<link rel="stylesheet" href="<?php echo LOCALPATH; ?>/template/css/leaflet.css">
<script src="<?php echo LOCALPATH; ?>/template/js/stationEdit.js"></script>
<?php
if(!empty($errors)){
    foreach ($errors as $key => $error) {
        ?>      
        <p class="error" style="color: red">*<?=@$error;?></p>
        <?php
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-lg-1"></div>
        <div class="col-xs-10 col-sm-10 col-md-12 col-lg-10 create-station">
            <div class="form-group">
                <label>Введіть назву нової зупинки:</label>
                <input class="form-control" type="text" name="name" placeholder="name" required>
            </div>

            <div class="form-group">
                <label>Додайте опис до зупинки (не обов'язково):</label>
                <textarea class="form-control" cols="30" name="description" placeholder="description"></textarea>
            </div>

            <div class="form-group">
            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Чи це справжня зупинка чи необхідна для руху по карті?</b>
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionWarning" name="is_real" type="checkbox" checked="checked"/>
                    <label for="someSwitchOptionWarning" style="height: 12px;" class="label-warning"></label>
                </div>
            </div>

            <div class="form-group">
                <label>Утримуючи клавішу <b>Shift</b> Виберіть сусідні зупинки або зв`язані:</label>
                <select class="form-control" size="5" name="neighboring_stop[]" multiple required>
                    <?php
                    if(!empty($stations)){
                        foreach ($stations as $key => $station) {
                            echo "<option "; if($key == 0) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div id="map"></div>
            <div class="form-group hide">
                <label>Додайте Координату X на карті схемі:</label>
                <input class="form-control" type="number" name="map_x" placeholder="map_x(25,2123)" step="0.0001" required>
            </div>

            <div class="form-group hide">
                <label>Додайте Координату Y на карті схемі:</label>
                <input class="form-control" type="number" name="map_y" placeholder="map_y(45,1113)" step="0.0001" required>
            </div>

            <div class="form-group">
                <label>Додайте Широту:</label>
                <input class="form-control" type="text" name="latitude" placeholder="28° 28'" required>
            </div>

            <div class="form-group">
                <label>Додайте Довготу:</label>
                <input class="form-control" type="text" name="longitude" placeholder="28° 28'" required>
            </div>

            <div class="form-group">
                <button type="submit" name="createStation" class="btn btn-default">Створити Зупинку</button>
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-lg-1"></div>
    </div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>