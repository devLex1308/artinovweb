<?php
require_once ROOT."/views/admin/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-transport">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Назва транспорту</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Опис транспорту</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="Короткий опис транспорту при необхідності...(description)"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="carriage_id" class="col-sm-4 control-label">Вид транспорту</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="carriage_id" required>
                            <?php
                            if(!empty($carriages)){
                                foreach ($carriages as $key => $carriage) {
                                    echo "<option "; if($key == 0) echo "selected"; echo " value=".$carriage['id'].">".$carriage['name']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="route_id" class="col-sm-4 control-label">Маршрут</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="route_id" required>
                            <?php
                            if(!empty($routes)){
                                foreach ($routes as $key => $route) {
                                    echo "<option "; if($key == 0) echo "selected"; echo " value=".$route['id'].">(№".$route['number'].") ".$route['name_start']." - ".$route['name_end']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="typeform" value="createTransport">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="createTransport" type="submit" class="btn btn-success" value="Відправити">
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