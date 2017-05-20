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

            <?php 
         
              $select = "";
              $select .= "<select name='station_id'>";
              foreach ($stations as $key => $station) {
                $select .= "<option value='{$station['id']}'>{$station['name']}</option>";
              }
              $select .= "</select>";

              echo "$select"; 
            ?>            
              <input type="hidden" name="typeform" value="fillRoute">
              <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                      <input name="fillRoute" type="submit" value="Занести зупинку до маршруту" class="btbtn-warning">
                  </div>
              </div>

            <?php                
              echo '<table border="1">';
              echo '<thead>';
              echo '<tr>';
              echo '<th>Зупинки, які добавлені <br>до нового маршруту</th>'; 
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
           
              foreach ($stations_route as $key => $station_route){               
                echo '<tr>';
                echo '<td>' . $station_route['name']. '</td>';
                echo '</tr>';
                }
                 echo '</tbody>';
                 echo '</table>';
            ?>
              <input type="hidden" name="typeform" value="outFill">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="outFill" type="submit" value="Завершити заповнення маршруту" class="btn btn-warning">
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

