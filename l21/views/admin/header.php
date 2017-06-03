<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="<?php echo LOCALPATH;?>/template/menu/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo LOCALPATH;?>/template/menu/css/mdb.css">
  <link rel="stylesheet" href="<?php echo LOCALPATH;?>/template/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo LOCALPATH; ?>/template/css/checkbox.css">
  <script src="<?php echo LOCALPATH; ?>/template/menu/js/jquery-3.1.1.js"></script>
</head>
<body>
  <input type="hidden" name = "LOCALPATH" id="LOCALPATH" value="<?php echo LOCALPATH;?>">
  <header>
    <?php
    require("nav.php");
    ?>
  </header>