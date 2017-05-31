<?php
require_once ROOT."/views/admin/header.php";
?>
<style>
  input[type='number'] {
    -moz-appearance:textfield;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
  }
  .content{
    text-align: center;
  }
</style>
<h1 class="text-center"><?php echo $title; ?></h1>
<div class="container text-center">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-md-12 col-lg-8 create-station">
      <form class="form-horizontal" role="form" method="post">

        <div class="form-group row">
          <label for="name" class="col-sm-12 control-label">Назва статті</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" pattern="^[А-Яа-яЁё\s]{,15}" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-12 control-label">Опис</label>
          <div class="col-sm-12">  <!-- тут треба вставити випадаюче меню з назвами зупинок ***а нашо це?-->
            <textarea type="text" class="form-control" rows="12" id="description" name="description" placeholder="Текст статті"  required></textarea>
          </div>
        </div>
        <!-- не зрозуміло як додати форму ***тре багато коду, шоби воно усе робило -->
        <div class="form-group">
          <label for="description"><h2>Створення статті</h2></label>
          <div class="editor"></div>
          <script type="text/javascript" src="../../js/bootstrap-wysiwyg.js"></script>
          <script>
            $(document).ready(function(){
              $('.editor').wysiwyg();
            })
          </script>
        </div>
        <div class="form-group row">
          <label for="context" class="col-sm-12 control-label">Контекст</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="context" name="context" placeholder="Введіть щонебудь"  required>
          </div>
        </div>
        <div class="form-group row">
          <label for="user_id" class="col-sm-12 control-labell">Іd користувача</label>
          <div class="col-sm-12">
            <input class="form-control" type="number" value="42" id="user_id" name="user_id">
          </div>
        </div> 
        <div class="form-group row">
          <label for="category_id" class="col-sm-12 control-labell">Іd категорії</label>
          <div class="col-sm-12">
            <input class="form-control" name="category_id" type="number" value="42" id="category_id">
          </div>
        </div> 
        <div class="form-group row">
          <label for="time_create" class="col-sm-12 control-labell">Дата та час створення</label>
          <div class="col-sm-12">
            <input class="form-control" type="datetime-local" name="time_create" value="2017-01-01T01:00:00" id="time_create">
          </div>
        </div>
        <input type="hidden" name="typeform" value="createArticle">
        <div class="form-group row">
          <div class="col-sm-offset-3 col-sm-12">
            <input name="createArticle" type="submit" class="btn btn-success" value="Створити">
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>

