<?php
require_once ROOT."/views/admin/header.php";
?>
<center>
   <h1><?php echo $title; 
       echo " <br><b>".$route['name_start']." - ".$route['name_end']." <br>№".$route['number']."</b>"; ?></h1>

       <form method="POST" style="max-width: 500px;">
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
    <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 create-station">
                <h1 class="text-center"><?php echo $title; ?></h1>
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">name_start</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name_start" value="<?php echo $route['name_start']; ?>" placeholder="Ввести назву" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">name_end</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name_start" value="<?php echo $route['name_end']; ?>" placeholder="Ввести назву" required>
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
                            <table class="table">
                                <tr>
                                    <th>№</th>
                                    <th>Зупинка</th>
                                    <th>Різниця часу</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select class="form-control" name="id_stations_start[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_start[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <select class="form-control" name="id_stations_start[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_start[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <select class="form-control" name="id_stations_start[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_start[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <select class="form-control" name="id_stations_start[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_start[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <select class="form-control" name="id_stations_start[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_start[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>

                            </table>
                            <button>
                                Додати ще одну зупинку
                            </button>

                        </div>
                        <div class="col-md-6">
                            <h2>Рух за зворотнім маршрутом</h2>
                            <table class="table">
                                <tr>
                                    <th>№</th>
                                    <th>Зупинка</th>
                                    <th>Різниця часу</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select class="form-control" name="id_stations_end[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_end[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <select class="form-control" name="id_stations_end[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_end[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <select class="form-control" name="id_stations_end[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_end[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <select class="form-control" name="id_stations_end[]" required>
                                            <?php
                                            if(!empty($stations)){
                                                foreach ($stations as $key => $station) {
                                                    echo "<option "; if($station['name'] == $route['name_start']) echo "selected"; echo " value=".$station['id'].">".$station['name']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="delta_time_end[]">
                                    </td>
                                    <td><button>X</button></td>
                                </tr>
                            </table>
                            <button>
                                Додати ще одну зупинку
                            </button>

                        </div>
                    </div>


                    <input type="hidden" name="typeform" value="editRoute">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input name="editRoute" type="submit" class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        </div>
    </div>



    <?php
    require_once ROOT."/views/admin/footer.php";
    ?>

