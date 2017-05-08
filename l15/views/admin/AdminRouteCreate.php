<?php
  require_once ROOT."/views/admin/header.php";
  $select = "";
  $select .= "<select name='station[]'>";
  foreach ($stations as $key => $station) {
      $select .= "<option value='{$station['id']}'>{$station['name']}</option>";
  }
   $select .= "</select>";
?>
    <h1><?php echo $title;?></h1>
     <?php
        for ($i=0; $i < $countStation; $i++) { 
            echo "$select";
        }
     ?>
<?php
  require_once ROOT."/views/admin/footer.php";
?>

