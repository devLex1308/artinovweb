<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo LOCALPATH;?>/template/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Адмінка</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
              <a href="<?php echo LOCALPATH;?>/admin/station" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Зупинки <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo LOCALPATH;?>/admin/station">Всі</a></li>
                <li><a href="<?php echo LOCALPATH;?>/admin/station/create">Створити</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo LOCALPATH;?>/admin/route" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Маршрути <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo LOCALPATH;?>/admin/route">Всі</a></li>
                <li><a href="<?php echo LOCALPATH;?>/admin/route/create">Створити</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo LOCALPATH;?>/admin/category" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Категорії <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo LOCALPATH;?>/admin/category">Всі</a></li>
                <li><a href="<?php echo LOCALPATH;?>/admin/category/create">Створити</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo LOCALPATH;?>/admin/transport" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Транспорт <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo LOCALPATH;?>/admin/transport">Всі</a></li>
                <li><a href="<?php echo LOCALPATH;?>/admin/transport/create">Створити</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?php echo LOCALPATH;?>/admin/users" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Користувачі <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo LOCALPATH;?>/admin/users">Всі</a></li>
                <li><a href="<?php echo LOCALPATH;?>/admin/user/create">Створити</a></li>
              </ul>
            </li>
          </ul>
          <?php
            if(isset($_SESSION["login"])){?>
            <ul>
               <li>Привіт <?php echo $_SESSION["login"]; ?></li>
               <li><a href="<?php echo LOCALPATH.'/admin/logout'; ?>">Вихід</a></li>
            </ul>
          <?php
          }else{ ?>
             <ul>
               <li><a href="<?php echo LOCALPATH.'/admin/authorization'; ?>">Увійти</a></li>
            </ul>
          <?php }
          ?>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>