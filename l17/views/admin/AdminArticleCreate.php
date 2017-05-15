<?php
  require_once ROOT."/views/admin/header.php";
?>
    <style type="text/css">
    #editor {overflow:scroll; max-height:300px}
    </style>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Назва статті</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" pattern="^[А-Яа-яЁё\s]{,15}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Опис</label>
                    <div class="col-sm-9">  <!-- тут треба вставити випадаюче меню з назвами зупинок -->
                        <textarea type="text" class="form-control" rows="3" id="description" name="description" placeholder="Текст статті" pattern="^[А-Яа-яЁё\s]+$" required></textarea>
                    </div>
                </div>
                 <!-- не зрозуміло як додати форму  -->
                <div class="form-group">
                  <label for="description">Створення статті</label>
                  <div class="editor"></div>
                  <script type="text/javascript" src="../../js/bootstrap-wysiwyg.js"></script>
                  <script>
                  $(document).ready(function(){
                    $('.editor').wysiwyg();
                  })
                  
                  </script>
                </div>
                <div class="form-group row">
                    <label for="context" class="col-sm-3 control-label">Контекст</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="context" name="context" placeholder="Введіть щонебудь" pattern="^[А-Яа-яЁё\s]+$" required>
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
                    <label for="time_create" class="col-sm-3 control-labell">Дата та час створення</label>
                    <div class="col-sm-9">
                    <input class="form-control" type="datetime-local" name="time_create" value="2017-01-01T01:00:00" id="time_create">
                 </div>
                 </div>
                 <input type="hidden" name="typeform" value="createArticle">
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="createArticle" type="submit" class="btn btn-warning">
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

