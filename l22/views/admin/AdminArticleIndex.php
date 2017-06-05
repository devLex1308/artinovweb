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
                        <th>id автора</th>
                        <th>Час створення</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    <?php
                    foreach ($articles as $key => $article) {?>
                    <tr>
                        <td><?php echo $article['id']; ?></td>
                        <td><?php echo $article['name']; ?></td>
                        <td><?php echo $article['user_id']; ?></td>
                        <td><?php echo $article['time_create']; ?></td>
                        <td><a href="<?php echo LOCALPATH;?>/admin/article/edit/<?php echo $article['id']; ?>"><span class="custom glyphicon glyphicon-pencil text-center"></span></a></td>
                        <td>
                            <button class="deleteAjax" data-nameModel="article" data-id="<?php echo $article['id']; ?>"><span class="custom glyphicon glyphicon-trash text-center"></span></button>
                        </td>
                    </tr>
                    <?php
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