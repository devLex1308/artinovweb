<?php
  require_once ROOT."/views/admin/header.php";
?>
     <h1><?php echo $title; ?></h1>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">name_start</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name_start" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">name_end</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name_end" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="number" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">carriage_id</label>
                    <div class="col-sm-9">

                                            
                       
                        <input type="text" class="form-control" id="name" name="carriage_id" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">id_stations_start</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="id_stations_start" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">id_stations_end</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="id_stations_end" placeholder="Ввести назву" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">delta_time_start</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="delta_time_start" placeholder="Ввести назву" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">delta_time_end</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="delta_time_end" placeholder="Ввести назву" required>
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

