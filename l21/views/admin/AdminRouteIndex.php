<?php
  require_once ROOT."/views/admin/header.php";
?>
<style>
    .table-my{
        width: 100%;
    }
</style>
<div class="container table-my">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed">
                    <tr>
                        <th>id</th>
                        <th>Назва</th>
                        <th>Тип транспорту</th>
                        <th>Зупинки</th>
                        <th>Редагувати</th>
                        <th>Заповнення маршруту</th>
                        <th>Видалити</th>
                    </tr>
                    <?php
                    if(!empty($routes)){
                        foreach ($routes as $key => $router) {
                            ?>
                            <tr>
                                <td><?php echo $router['id']; ?></td>
                                <td><?php echo $router['number']." ".$router['name_start']."-".$router['name_end']; ?></td>
                                <td><?=$carriage_name[$key]['name']; ?></td>
                                <td><a href="<?php echo LOCALPATH; ?>/route/<?=$router['id'] ?>"><span class="custom glyphicon glyphicon-map-marker text-center"></a></td>
                                <td><a href="<?php echo LOCALPATH; ?>/admin/route/edit/<?=$router['id']; ?>"><span class="custom glyphicon glyphicon-pencil text-center"></a></td>
                                <td><a href="<?php echo LOCALPATH; ?>/admin/route/fill/<?=$router['id']; ?>"><span class="custom glyphicon glyphicon-edit text-center"></a></td>
                                <td><a href="<?php echo LOCALPATH; ?>/admin/route/delete/<?=$router['id']; ?>"><span class="custom glyphicon glyphicon-trash text-center"></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        
        <?php

        if($countPage > 1){
            echo "<ul class='pagination'>";
            for ($i = 1; $i <= $countPage; $i++) {
                if($page==$i){
                    echo "<li class='active'><a href='".LOCALPATH."/admin/route/$i' >$i</a></li>";
                }else{
                    echo "<li><a href='".LOCALPATH."/admin/route/$i'>$i</a></li>";
                }

            }
            echo "</ul>";
        }
        require_once ROOT."/views/admin/footer.php";
        ?>
    </div>

</div>
