<?php
  require_once ROOT."/views/admin/header.php";
?>
    <h1><?php echo $title; ?></h1>
    <div class="container">
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-6 create-station">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <form class="form-horizontal" role="form" action="" method="post">
            
                <div class="form-group">
                    <label for="name" maxlength="20" class="col-sm-3 control-label">Введіть назву категорії</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $categories['name'];?>" required>
                    </div>
                </div>   
                
                <input type="hidden" name="typeform" value="editCategory">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input name="editCategory" type="submit" class="btn btn-warning">
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

