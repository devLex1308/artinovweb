<?php
  require_once ROOT."/views/admin/header.php";
?>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Назва початку маршруту</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="name_start" placeholder="name_start" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Назва кінця маршруту</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="name_end" placeholder="name_end" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Номер маршруту</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="number" placeholder="number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Тип маршруту</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="carriage_id" placeholder="carriage_id" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">id зупинок по яким відбувається рух від початку маршруту</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="id_stations_start" placeholder="id_stations_start" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">id зупинок по яким відбувається рух від кінця маршруту</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="id_stations_end" placeholder="id_stations_end" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Через скільки хвилин транспорт буде на зупинці від початку</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="delta_time_start" placeholder="delta_time_start" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="name" class="col-sm-5 control-label">Через скільки хвилин транспорт буде на зупинці від початку</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="delta_time_end" placeholder="delta_time_end" required>
                    </div>
                </div>

                <input type="hidden" name="typeform" value="createRoute">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="createRoute" type="submit" class="btn btn-warning">
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

