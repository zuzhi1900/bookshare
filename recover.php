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

    <title>恢复 | bookshare</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

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
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Monster Mars</a>
        </div>
        <div class="navbar-collapse collapse">
          <?php include 'includes/menu.php' ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
      <div class="container">
        <h1>恢复密码</h1>
      </div>
    </div>

    <div class="container">
      <?php
      if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
          ?>
          <h3>成功，我们生成了一个随机密码并已发送到你的邮箱。</h3>
          <?php
          
      } else if (isset ($_GET['email'], $_GET['generated_string']) === true) {
          
          $email    =trim($_GET['email']);
          $string     =trim($_GET['generated_string']); 
          
          if ($users->email_exists($email) === false || $users->recover($email, $string) === false) {
              $errors[] = '抱歉，发生了未知的错误，我们暂时不能恢复你的密码。';
          }
          
          if (empty($errors) === false) {       

          echo '<p>' . implode('</p><p>', $errors) . '</p>';
        
          } else {

              header('Location: recover.php?success');
              exit();
          }
      
      } else {
          header('Location: index.php'); // If the required parameters are not there in the url. redirect to index.php
          exit();
      }
      ?>

      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->


    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
