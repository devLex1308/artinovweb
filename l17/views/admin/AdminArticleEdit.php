<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1 class="text-center"><?php echo $title;echo " ".$article['name'] ?></h1>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Назва статті</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Опис</label>
                    <div class="col-sm-9">  <!-- тут треба вставити випадаюче меню з назвами зупинок -->
                        <textarea type="text" class="form-control" rows="3" id="description" name="description" placeholder="Текст статті" required></textarea>
                    </div>
                </div>
                <!-- не зрозуміло як додати форму 
                <div class="form-group">
                  <label for="description">Створення статті</label>
                  <script>$('#editor').wysiwyg();</script>
                </div>-->
                <div class="form-group row">
                    <label for="context" class="col-sm-3 control-label">Контекст</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="context" name="context" placeholder="Введіть щонебудь" required>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="user_id" class="col-sm-3 control-labell">Іd користувача</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="number" value="42" id="user_id" name="user_id">
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="category_id" class="col-sm-3 control-labell">Іd категорії</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="category_id" type="number" value="42" id="category_id">
                  </div>
                </div> 
                <div class="form-group row">
                    <label for="time_edit" class="col-sm-3 control-labell">Дата та час редагування</label>
                    <div class="col-sm-9">
                    <input class="form-control" type="datetime-local" name="time_edit" value="2017-01-01T01:00:00" id="time_edit">
                 </div>
                 </div>
                 <a class="btn btn-primary" href="#" role="submit" class="control-labell">Підтвердити</a>
            </form>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
    </div>
</div>
<?php
  require_once ROOT."/views/admin/footer.php";
?>

