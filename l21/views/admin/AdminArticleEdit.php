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
<div class="container text-center">
  <div class="row">
  <div class="col-lg-1"></div>
    <div class="col-md-12 col-lg-10 create-station">
      <form class="form-horizontal" role="form" method="post">
      
        <div class="form-group row">
          <label for="name" class="col-sm-12 control-label">Назва статті</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="name" name="name" placeholder="Ввести назву" value="<?php echo $article['name'];?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="description" class="col-sm-12 control-label">Опис</label>
          <div class="col-sm-12">
            <textarea type="text" class="form-control" rows="12" id="description" name="description" placeholder="Короткий опис статті" required>
              <?php echo $article['description'];?>
            </textarea>
            <script type="text/javascript">
              CKEDITOR.replace( 'description');
            </script>
          </div>
        </div>

        <div class="form-group row">
          <label for="context" class="col-sm-12 control-label">Контекст</label>
          <div class="col-sm-12">
            <textarea type="text" class="form-control" rows="12" id="context" name="context" placeholder="Текст статті" required>
              <?php echo $article['context'];?>
            </textarea>
            <script type="text/javascript">
              CKEDITOR.replace( 'context');
            </script>
          </div>
        </div>

        <div class="form-group row">
          <label for="category_id" class="col-sm-12 control-labell">Іd категорії</label>
          <div class="col-sm-12">
            <input class="form-control" name="category_id" type="number" value="42" id="category_id">
          </div>
        </div> 

        <button class="btn btn-primary" href="#" type="submit" name="editArticle" role="submit" class="control-labell">Підтвердити</button>
      </form>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>
<?php
require_once ROOT."/views/admin/footer.php";
?>

