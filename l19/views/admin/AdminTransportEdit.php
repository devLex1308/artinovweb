<?php
require_once ROOT."/views/admin/header.php";
function inputTimeRouteStart($array,$id_name){
    ?>
    <style type="text/css">
    .inputTimeRouteStart{
        display:block; 
        text-align: right;     
    }
    .btn{
        /* display: block; */
        text-align: right;
        right:0px;
    }      
    </style>
    <form class="form-horizontal" role="form" method="post" id="<?php echo $id_name; ?>">
        <div class="time">
    <?php
    $i=1;
    foreach ($array as $TimeStartDirect) {
        $pencil = '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
        $delete = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
        echo "<span class = 'inputTimeRouteStart'>";
            echo $i.". <input type='time' name='time_start[{$TimeStartDirect['id']}]' value='{$TimeStartDirect['time_start']}'>";
            echo "<a href='".LOCALPATH."/admin/timeroutestart/edit/{$TimeStartDirect['id']}''>$pencil </a>";
            echo "<a href='".LOCALPATH."/admin/timeroutestart/delete/{$TimeStartDirect['id']}''>$delete </a>";
        echo "</span>";
        $i++;
    }?>
        </div>
        <button name="createTimeStart" type="submit" value="<?php echo $id_name; ?>" id="create<?php echo ucfirst($id_name);?>" class="btn btn-success glyphicon glyphicon-plus"></button>
        <button type="submit" name="action" value="saveTimeRouteStart" class="btn btn-warning glyphicon glyphicon-ok"></button>
    </form>
    <!-- <form class="form-horizontal" role="form" method="post">
        <button name="createTimeStart" type="submit" value="<?php echo $id_name; ?>" id="create<?php echo ucfirst($id_name);?>" class="btn btn-warning glyphicon glyphicon-plus"></button>
    </form> -->
    <?php
}
?>
    <a href=></a>
<h1><?php echo $title; echo " ".$transport['name'] ?></h1>
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-transport">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Назва транспорту</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" value="<?php echo $transport['name'];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Опис транспорту</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="2" id="description" name="description"  placeholder="Короткий опис транспорту при необхідності..."><?php echo $transport['description']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="carriage_id" class="col-sm-4 control-label">Вид транспорту</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="carriage_id" required>
                            <?php
                            if(!empty($carriages)){
                                foreach ($carriages as $key => $carriage) {
                                    echo "<option "; if($carriage['id'] == $transport['carriage_id']) echo "selected"; echo " value=".$carriage['id'].">".$carriage['name']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="route_id" class="col-sm-4 control-label">id маршруту</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="route_id" required>
                            <?php
                            if(!empty($routes)){
                                foreach ($routes as $key => $route) {
                                    echo "<option "; if($route['id'] == $transport['route_id']) echo "selected"; echo " value=".$route['id'].">(№".$route['number'].") ".$route['name_start']." - ".$route['name_end']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="typeform" value="editTransport">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="editTransport" type="submit" value="Зберегти" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-12 create-transport">
            <div class="col-xs-10 col-sm-10 col-md-8 col-lg-3">
                <h2 class="text-center">Час відправлення за прямим маршрутом</h2>
                <h4 class="text-center"><?php inputTimeRouteStart($aTimeStartDirect,"timeStartDirect"); ?></h4>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-8 col-lg-3">
                <h2 class="text-center">Час відправлення за зворотнім маршрутом</h2>
                <h4 class="text-center"><?php inputTimeRouteStart($aTimeStartRevert,"timeStartRevert"); ?></h4>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-8 col-lg-3">
                <h2 class="text-center">Час відправлення за прямим маршрутом у вихідний</h2>
                <h4 class="text-center"><?php inputTimeRouteStart($aTimeStartDirectRest,"timeStartDirectRest"); ?></h4>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-8 col-lg-3">
                <h2 class="text-center">Час відправлення за зворотнім маршрутом у вихідний</h2>
                <h4 class="text-center"><?php inputTimeRouteStart($aTimeStartRevertRest,"timeStartRevertRest"); ?></h4>
            </div>
        </div>
    </div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>