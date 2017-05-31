<?php
require_once ROOT."/views/admin/header.php";
?>
<div class="container text-center">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-sm-12 col-lg-10 create-transport">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-12 control-label">Назва транспорту</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-12 control-label">Опис транспорту</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="Короткий опис транспорту при необхідності...(description)"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="carriage_id" class="col-sm-12 control-label">Вид транспорту</label>
                    <div class="col-sm-12">
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
                    <label for="route_id" class="col-sm-12 control-label">Маршрут</label>
                    <div class="col-sm-12">
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
                    <div class="col-sm-offset-3 col-sm-12">
                        <input name="createTransport" type="submit" class="btn btn-success" value="Відправити">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<?php
require_once ROOT."/views/admin/footer.php";
?>