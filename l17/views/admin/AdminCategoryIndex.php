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
                    <th>Редагувати</th>
                    <th>Видалити</th>
                </tr>
                <?php
                foreach ($categories as $key => $category) {?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><a href="<?php echo LOCALPATH;?>/admin/category/edit/<?php echo $category['id']; ?>">Редагувати</a></td>
                        <td><a href="<?php echo LOCALPATH;?>/admin/category/delete/<?php echo $category['id']; ?>">Видалити</a></td>
                    </tr>
                    <?
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

