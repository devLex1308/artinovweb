<?php
require_once ROOT."/views/admin/header.php";
?>
<center>
 <h1><?php echo $title; 
     echo " <br><b>".$route['name_start']." - ".$route['name_end']." <br>№".$route['number']."</b>"; ?></h1>

     <?php
     if(!empty($errors)){
        foreach ($errors as $key => $error) {
            ?>      
            <p class="error" style="color: red">*<?=@$error;?></p>
            <?php
        }
    }
    ?>
</center>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
  .custom-combobox {
    position: relative;
    display: inline-block;
}
.custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
}
.custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-lg-1"></div>
        <div class="col-xs-10 col-sm-10 col-md-12 col-lg-10 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">name_start</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name_start" value="<?php echo $route['name_start']; ?>" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">name_end</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name_end" value="<?php echo $route['name_end']; ?>" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">number</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="number" placeholder="number" value="<?php echo $route['number']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">carriage_id</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="carriage_id" required>
                            <?php
                            if(!empty($carriages)){
                                foreach ($carriages as $key => $carriage) {
                                    echo "<option "; if($carriage['id'] == $route['carriage_id']) echo "selected"; echo " value=".$carriage['id'].">".$carriage['name']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>Рух за прямим маршрутом</h2>
                        <table class="table" id="forwardDirection">
                            <tr>
                                <th>№</th>
                                <th>Зупинка</th>
                                <th>Різниця часу</th>
                                <th></th>
                            </tr>
                            <?php
                            $count = 0;
                            if(isset($id_stations_start_prev)){
                                foreach ($id_stations_start_prev as $key => $value) {
                                    $count++;
                                    ?>

                                    <tr id="stationsDirect">
                                        <td><?=$count?></td>
                                        <td>
                                            <select class="form-control" name="id_stations_start_<?=$count?>" required>
                                                <?php
                                                if(!empty($stations)){
                                                    foreach ($stations as $key => $station) {
                                                        echo "<option "; if($station['id'] == $value) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control delta-time" value="<?=$delta_time_start_prev[$count - 1]?>" name="delta_time_start_<?=$count?>" required>
                                        </td>
                                        <td><button class="deleteStation btn btn-danger glyphicon glyphicon-remove"></button></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                            }
                            ?>
                        </table>
                        <button id="addStation1" class="btn btn-success glyphicon glyphicon-plus" title="Додати зупинку">
                        </button>
                        <button id="calculateTime1" style="float: right;" class="btn btn-info glyphicon glyphicon-time" title="Автоматичний розрахунок часу">
                        </button>
                    </div>
                    <div class="col-md-6">
                        <h2>Рух за зворотнім маршрутом</h2>
                        <table class="table" id="backDirection">
                            <tr class="name">
                                <th>№</th>
                                <th>Зупинка</th>
                                <th>Різниця часу</th>
                                <th></th>
                            </tr>
                            <?php
                            $count = 0;
                            if(isset($id_stations_end_prev)){
                                foreach ($id_stations_end_prev as $key => $value) {
                                    $count++;
                                    ?>
                                    <tr id="stationRevers">
                                        <td><?=$count?></td>
                                        <td>
                                            <select class="form-control" name="id_stations_end_<?=$count?>" required>
                                                <?php
                                                if(!empty($stations)){
                                                    foreach ($stations as $key => $station) {
                                                        echo "<option "; if($station['id'] == $value) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control delta-time" value="<?=$delta_time_end_prev[$count - 1]?>" name="delta_time_end_<?=$count?>" required>
                                        </td>
                                        <td><button class="deleteStation btn btn-danger glyphicon glyphicon-remove"></button></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                        <button id="addStation2" class="btn btn-success glyphicon glyphicon-plus" title="Додати зупинку">
                        </button>
                        <button id="calculateTime2" style="float: right;" class="btn btn-info glyphicon glyphicon-time" title="Автоматичний розрахунок часу">
                        </button>

                    </div>
                </div>
                <br>
                <div class="form-group" align="center">
                    <div class="col-sm-offset-0">
                        <input name="editRoute" type="submit" class="btn btn-warning" value="Відправити">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-1 col-sm-1 col-lg-1"></div>
    </div>
</div>

<script src="<?php echo LOCALPATH; ?>/template/js/routeEdit.js"></script>    
<?php
require_once ROOT."/views/admin/footer.php";
?>