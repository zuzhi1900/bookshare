<?php 
# Including our init.php
require 'core/init.php';
$general->logged_out_protect();
$members        = $users->get_users();
$member_count   = count($members);
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

    <title>用户列表 | bookshare</title>

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

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
      <div class="container">
        <h1>注册用户</h1>
      </div>
    </div>

    <div class="container">
      <p>我们现在总共有 <strong><?php echo $member_count; ?></strong> 位注册用户。</p>
      
      <?php 

      # Showing the username and the data of joining, using the data() function
      foreach ($members as $member) {
        $username = htmlentities($member['username']);
        ?>

        <p><a href="profile.php?username=<?php echo $username; ?>"><?php echo $username?></a> 加入时间：<?php echo date('F j, Y', $member['time']) ?></p>
        <?php
      }

      ?>

      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->

    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
