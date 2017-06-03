<?php
  require_once ROOT."/views/admin/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-1"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-10">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Назва</th>
                    <th>Редагувати</th>
                    <th>Видалити</th>
                    <th>Видалити через ajax</th>
                </tr>
                <?php
                foreach ($stations as $key => $station) {
                    $edit = '<span class="custom glyphicon glyphicon-pencil"></span>';
                    $delete = '<span class="custom  glyphicon glyphicon-trash" aria-hidden="true"></span>';
                    ?>
                    <tr>
                        <td><?php echo $station['id']; ?></td>
                        <td><?php echo $station['name']; ?></td>
                        <td><a href="<?php echo LOCALPATH;?>/admin/station/edit/<?php echo $station['id']; ?>"><?=$edit?></a></td>
                        <td><a href="<?php echo LOCALPATH;?>/admin/station/delete/<?php echo $station['id']; ?>"><?=$delete?></a></td>
                        <td>
                            <button class="deleteAjax" data-nameModel="station" data-id="<?php echo $station['id']; ?>"><?=$delete?></button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <?php
            if($countPage > 1){
                echo "<ul class='pagination'>";
                for ($i = 1; $i <= $countPage; $i++) {
                    if($page==$i){
                        echo "<li class='active'><a href='".LOCALPATH."/admin/station/$i' >$i</a></li>";
                    }else{
                        echo "<li><a href='".LOCALPATH."/admin/station/$i'>$i</a></li>";
                    }

                }
                echo "</ul>";
            }

            require_once ROOT."/views/admin/footer.php";
            ?>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-1"></div>
    </div>
</div>