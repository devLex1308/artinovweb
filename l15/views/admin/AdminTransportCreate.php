<?php
  require_once ROOT."/views/admin/header.php";
?>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Назва</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву транспорту" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Опис транспорту</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="Короткий опис при необхідності..."></textarea>
                    </div>
                </div>

                <input type="hidden" name="typeform" value="createCarriage">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="createCarriage" type="submit" class="btn btn-warning" value="Створити">
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

