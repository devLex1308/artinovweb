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
                <table class="table table-striped table-hover table-condensed">
                    <tr>
                        <th>id</th>
                        <th>Назва</th>
                        <th>Вид транспорту</th>
                        <th>Маршрут</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    <?php
                    foreach ($transports as $key => $transport) { ?>
                    <tr>
                        <td><?php echo $transport['id']; ?></td>
                        <td><?php echo $transport['name']; ?></td>
                        <td><?php
                            foreach ($carriages as $key => $carriage) {
                                if($carriage['id'] == $transport['carriage_id'])
                                    echo $carriage['name'];
                            }
                            ?></td>
                            <td><?php
                                foreach ($routes as $key => $route) {
                                    if($transport['route_id'] == $route['id'])
                                        echo "(№".$route['number'].") ".$route['name_start']." - ".$route['name_end'];
                                }
                                ?></td>

                                <td><a href="<?php echo LOCALPATH;?>/admin/transport/edit/<?php echo $transport['id']; ?>"><span class="custom glyphicon glyphicon-pencil text-center"></span></a></td>
                                <td>
                                    <button class="deleteAjax" data-nameModel="transport" data-id="<?php echo $transport['id']; ?>"><span class="custom glyphicon glyphicon-trash text-center"></span></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once ROOT."/views/admin/footer.php";
        ?>