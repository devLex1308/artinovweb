<?php
  require_once ROOT."/views/admin/header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <h1 class="text-center"><?php echo $title; ?></h1>
                <table class="table">
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
                            <td><a href="<?php echo LOCALPATH;?>/admin/article/edit/<?php echo $article['id']; ?>">Редагувати</a></td>
                            <td><a href="<?php echo LOCALPATH;?>/admin/article/delete/<?php echo $article['id']; ?>">Видалити</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
    </div>
<?php
  require_once ROOT."/views/admin/footer.php";
?>