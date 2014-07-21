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

    <title>激活 | bookshare</title>

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
        <h1>激活你的账户</h1>
      </div>
    </div>

    <div class="container">
      <?php
        
      if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
        ?>
        <h3>我们已成功激活你的账户，你现在可以登录使用了。</h3>
        <?php
            
      } else if (isset ($_GET['email'], $_GET['email_code']) === true) {
          
          $email    =trim($_GET['email']);
          $email_code =trim($_GET['email_code']); 
          
          if ($users->email_exists($email) === false) {
              $errors[] = 'Sorry, we couldn\'t find that email address';
          } else if ($users->activate($email, $email_code) === false) {
              $errors[] = '抱歉，发生了未知的错误，我们暂时不能激活你的账户。';
          }
          
    if(empty($errors) === false){
    
      echo '<p>' . implode('</p><p>', $errors) . '</p>';  
  
    } else {
              header('Location: activate.php?success');
              exit();
          }
      
      } else {
          header('Location: index.php');
          exit();
      }
      ?>

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
