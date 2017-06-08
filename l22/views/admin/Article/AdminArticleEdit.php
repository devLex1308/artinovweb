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

  .block img{
    height: 100%;
  }

  .gallery .block{
    display: block;
    float: left;
    margin: 0.6%;
    width: 100px;
    height: 75px;
    border-radius: 14px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 1s ease;
  }

  label > input{
    display: inline-block;
    visibility: hidden;
    position: absolute;
  }

  label > input + img{
    cursor: pointer;
  }

  .block[type=radio] + div {

  } 

  [type=radio]:checked + div img {
    border: 2px solid red;
    border-radius: 43px;
    width: 100%; 
    opacity: 0.5;
  }

  .gallery .block:hover img{
    border-radius: 15px;
  }

  .gallery .block:hover{
    overflow: visible;
    transform: scale(5);
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
          <label for="name" class="col-sm-12 control-label">Головне зображення статті</label>
          <div class="col-sm-12 gallery">
            <?php 
            if(isset($images)){
              foreach ($images as $key => $image) {
                ?>
                <label>
                  <input type="radio" name="resources_id" <?php if($article['resources_id'] == $image['id']) echo 'checked'; ?> value="<?php echo $image['id']; ?>" required>
                  <div class="block"><img src="<?php echo LOCALPATH; ?>/resourses/images/<?php echo $image['name']; ?>"></div>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="description" class="col-sm-12 control-label">Короткий опис</label>
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
          <label for="category_id" class="col-sm-12 control-labell">Категорія</label>
          <div class="col-sm-12">
            <select class="form-control" name="category_id" required>
              <?php
              if(!empty($categories)){
                foreach ($categories as $key => $category) {
                  echo "<option "; if(isset($article)) if($category['id'] == $article['category_id']) echo "selected"; echo " value=".$category['id'].">".$category['name']."</option>";
                }
              }
              ?>
            </select>
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

