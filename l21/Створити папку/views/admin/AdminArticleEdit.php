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
<script src="<?php echo LOCALPATH; ?>/template/js/ckeditor_4.6.0_standard/ckeditor/ckeditor.js"></script>

<h1 class="text-center"><?php echo $title;echo " ".$article['name'] ?></h1>
<div class="container">
  <div class="row">
    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
    <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
      <form class="form-horizontal" role="form" method="post">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Назва статті</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" value="<?php echo $article['name'];?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-3 control-label">Опис</label>
          <div class="col-sm-9">  <!-- тут треба вставити випадаюче меню з назвами зупинок -->
            <textarea type="text" class="form-control" rows="3" id="description" name="description" placeholder="Короткий опис статті" required>
                <?php echo $article['description'];?>
            </textarea>
              <script type="text/javascript">
                  CKEDITOR.replace( 'description');
              </script>
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
                    <textarea type="text" class="form-control" rows="3" id="context" name="context" placeholder="Текст статті" required>
                        <?php echo $article['context'];?>
                    </textarea>
                      <script type="text/javascript">
                          CKEDITOR.replace( 'context');
                      </script>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="category_id" class="col-sm-3 control-labell">Іd категорії</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="category_id" type="number" value="42" id="category_id">
                  </div>
                </div> 

                <button class="btn btn-primary" href="#" type="submit" name="editArticle" role="submit" class="control-labell">Підтвердити</button>
              </form>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
          </div>
        </div>
        <?php
        require_once ROOT."/views/admin/footer.php";
        ?>

