<?php
    require_once ROOT."/views/admin/header.php";
?>
    
    <script src="<?php echo LOCALPATH; ?>/template/js/leaflet.js"></script>
    <link rel="stylesheet" href="<?php echo LOCALPATH; ?>/template/css/leaflet.css">
    <script src="<?php echo LOCALPATH; ?>/template/js/stationEdit.js"></script>
<center>
    <h1><?php echo $title; echo " <b><".$station['name']."></b>";  ?></h1>

    <form action="" method="POST" style="max-width: 500px;">
    <?php
        if(!empty($errors)){
            foreach ($errors as $key => $error) {
    ?>      
                <p class="error" style="color: red">*<?=@$error;?></p>
    <?php
            }
        }
    ?>
        <div class="form-group">
            <label>Введіть назву нової зупинки:</label>
            <input class="form-control" type="text" name="name" placeholder="name" value="<?php echo $station['name']; ?>" required>
        </div>

        <div class="form-group">
            <label>Додайте опис до зупинки (не обов'язково):</label>
            <textarea class="form-control" cols="30" name="description" placeholder="description"><?php echo $station['description']; ?></textarea>
        </div>

        <div class="form-group">
            <b>Чи це справжня зупинка чи необхідна для руху по карті?</b>
            <div class="material-switch pull-left">
                <input id="someSwitchOptionWarning" name="is_real" type="checkbox" <?php
                                    if($station['is_real']){
                                        echo "checked";
                                    }
                                ?>/>
                <label for="someSwitchOptionWarning" class="label-warning"></label>
            </div>
        </div>

        <div class="form-group">
            <label>Утримуючи клавішу <b>Shift</b> Виберіть сусідні зупинки або зв`язані:</label>
            <select class="form-control" size="5" name="neighboring_stop[]" multiple>
                <?php
                if(!empty($stations)){
                    foreach ($stations as $key => $station_edit) {
                        echo "<option "; 
                        if(!empty($id_stations_neighboring_stop)) {
                            foreach ($id_stations_neighboring_stop as $key => $id) {
                                if($id == $station_edit['id']) echo "selected";
                            } 
                        }
                        echo " value=".$station_edit['id'].">".$station_edit['name']."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div id="map"></div>
        <div class="form-group">
            <label>Додайте Координату X на карті схемі:</label>
            <input class="form-control" type="number" name="map_x" placeholder="map_x(25,2123)" step="0.0001" value="<?php echo $station['map_x']; ?>" required>
        </div>

        <div class="form-group">
            <label>Додайте Координату Y на карті схемі:</label>
            <input class="form-control" type="number" name="map_y" placeholder="map_y(45,1113)" step="0.0001" value="<?php echo $station['map_y']; ?>" required>
        </div>

        <div class="form-group">
            <label>Додайте Широту:</label>
            <input class="form-control" type="text" name="latitude" placeholder="28° 28'" value="<?php echo $station['latitude']; ?>" required>
        </div>

        <div class="form-group">
            <label>Додайте Довготу:</label>
            <input class="form-control" type="text" name="longitude" placeholder="28° 28'" value="<?php echo $station['longitude']; ?>" required>
        </div>

        <div class="form-group">
            <button type="submit" name="editStation" class="btn btn-default">Редагувати Зупинку</button>
        </div>
        
    </form>
</center>
<?php
    require_once ROOT."/views/admin/footer.php";
?>