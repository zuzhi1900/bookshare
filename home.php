<?php 
# Including our init.php
require 'core/init.php';
$general->logged_out_protect();

$username   = htmlentities($user['username']); // storing the user's username after clearning for any html tags.

header("Content-Type:text/html; charset=utf-8");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>主页 | bookshare</title>

    <!-- External CSS -->
    <?php include 'includes/external-css.php' ?>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- navbar -->
    <?php include 'includes/navbar-default.php' ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
      <div class="container">
        <h1>Hello <i><?php echo $username; ?></i> !</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>你已登录成功。</h2>
          <p>点击其他页面试试吧。</p>
          <!--
          <p><?php echo $_SERVER['PHP_SELF']; print_r($_SERVER); ?></p>
          -->
          <?php
          
          ?>
        </div>
      </div>

      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->


    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
