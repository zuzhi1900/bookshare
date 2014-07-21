<?php 
# Including our init.php
require 'core/init.php';
$general->logged_out_protect();

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

    <title><?php include 'includes/title.php' ?></title>

    <!-- External CSS -->
    <?php include 'includes/external-css.php' ?>
    <link href="css/docs.min.css" rel="stylesheet">

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
        <h1>公告</h1>
      </div>
    </div>

    <div class="container bs-docs-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-8">
          <div class="bs-docs-section">
            <h3 class="page-header">关于</h3>
            <p class="lead">a webapp helps students share their spare books.
              <a href="http://blog.monstermars.com" target="_blank">by zuzhi</a></p>
          </div> <!-- /.bs-docs-section -->
          <div class="bs-docs-section">
            <h3 class="page-header">公告</h3>
            <p class="lead">当网站有大的改动或重要的通知时，我会将其发布到这里。</p>
            <!-- callout-example
            <div class="bs-callout bs-callout-info">
            </div>
            -->
            <!-- info-example
            <p><b> date </b><br /> content </p>
            -->
            
          </div> <!-- /.bs-docs-section -->
        </div> <!-- /.col-md-8 -->
      </div> <!-- /.row -->
      
      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>     
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
