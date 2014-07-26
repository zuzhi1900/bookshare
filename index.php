<?php 
# Including our init.php
require 'core/init.php';
$general->logged_in_protect();

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

    <title>欢迎 | bookshare</title>

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
    <?php include 'includes/navbar.php' ?>

    <!-- page-header -->
    <div class="page-header">
      <div class="container">
        <h1>hi!</h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          
          <p>欢迎来到BookShare.</p>
          <img class="img-circle" src="assets/img/smile_when_youre_winning_print@140x140.jpg">
        </div>
      </div>

      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->

    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
    <script src="http://cdn.bootcss.com/holder/2.3.1/holder.min.js"></script>
  </body>
</html>
