<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-transport">
            <h2 class="text-center"><?php echo $title; ?></h2>
            <form class="form-horizontal" role="form" method="post">

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Назва транспорту</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Опис транспорту</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="Короткий опис транспорту при необхідності..."></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label for="carriage_id" class="col-sm-3 control-label">Вид транспорту</label>
                 <!-- Кнопка с выпадающим меню -->
                  <div class="btn-group">
                 <?php 
                      $select = "";
                      $select .= "<select name='carriage_id' class='form-control'>";
                      foreach ($categories as $key => $type) {
                      $select .= "<option value='{$type['id']}'>{$type['name']}</option>";
                      }
                      $select .= "</select>";
                      echo "$select"; 
                    ?>                        
                  </div>
                </div> 

                <div class="form-group">
                    <label for="route_id" class="col-sm-3 control-label">id маршруту</label>
                 <!-- Кнопка с выпадающим меню -->
                  <div class="btn-group">
                 <?php 
                      $select = "";
                      $select .= "<select name='route_id' class='form-control'>";
                      foreach ($routers as $key => $route) {
                      $select .= "<option value='{$route['id']}'>{$type['id']}</option>";
                      }
                      $select .= "</select>";
                      echo "$select"; 
                    ?>                        
                  </div>
                </div>                
                
                <input type="hidden" name="typeform" value="createTransport">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="createTransport" type="submit" class="btn btn-warning">
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

