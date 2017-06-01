<?php
require_once ROOT."/views/admin/header.php";
?>
<style>
    .table-my{
        width: 100%;
    }
    @media (max-width: 768px) {
        table{
            font-size: 70%;
        }
        h1{
            font-size: 30px;
        }
    }
    .table th, .table td {
        padding: 1%;
        text-align: center;
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
                        <th>Видалити</th>
                    </tr>
                    <?php
                    if(!empty($routes)){
                        foreach ($routes as $key => $route) {
                            ?>
                            <tr>
                            <td><?php echo $route['id']; ?></td>
                                <td><?php echo $route['number']." ".$route['name_start']."-".$route['name_end']; ?></td>
                                <td><?=$carriage_name[$key]['name']; ?></td>
                                <td><a href="<?php echo LOCALPATH; ?>/route/<?=$route['id'] ?>"><span class="custom glyphicon glyphicon-map-marker text-center"></a></td>
                                <td><a href="<?php echo LOCALPATH; ?>/admin/route/edit/<?=$route['id']; ?>"><span class="custom glyphicon glyphicon-pencil text-center"></a></td>
                                <td>
                                    <button class="deleteAjax" data-nameModel="route" data-id="<?php echo $route['id']; ?>"><span class="custom glyphicon glyphicon-trash text-center"></span></button>
                                </td>
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
