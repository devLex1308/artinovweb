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
            font-size: 20px;
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
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    <?php
                    foreach ($typeCarriages as $key => $typeCarriage) {?>
                    <tr>
                        <td><?php echo $typeCarriage['id']; ?></td>
                        <td><?php echo $typeCarriage['name']; ?></td>
                        <td><a href="<?php echo LOCALPATH;?>/admin/type_carriage/edit/<?php echo $typeCarriage['id']; ?>">Редагувати</a></td>
                        <td>
                            <button class="deleteAjax" data-nameModel="typeCarriage" data-id="<?php echo $typeCarriage['id']; ?>"><span class="custom glyphicon glyphicon-trash text-center"></span></button>
                        </td>
                    </tr>
                    <?
                }
                ?>
            </table>
        </div>
    </div>
</div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>