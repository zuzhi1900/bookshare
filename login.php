<?php 
# Including our init.php
require 'core/init.php';
$general->logged_in_protect();

if (empty($_POST) === false) {

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($username) === true || empty($password) === true) {
    $errors[] = 'Sorry, but we need your username and password.';
  } else if ($users->user_exists($username) === false) {
    $errors[] = 'Sorry that username doesn\'t exists.';
  } else if ($users->email_confirmed($username) === false) {
    $errors[] = 'Sorry, but you need to activate your account. 
           Please check your email.';
  } else {
    if (strlen($password) > 18) {
      $errors[] = 'The password should be less than 18 characters, without spacing.';
    }
    $login = $users->login($username, $password);
    if ($login === false) {
      $errors[] = 'Sorry, that username/password is invalid';
    }else {
      // username/password is correct and the login method of the $users object returns the user's id, which is stored in $login
      session_regenerate_id(true); // destroying the old session id and creating a new one
      $_SESSION['id'] =  $login;   // The user's id is now set into the user's session in the form of $_SESSION['id']
      // Redirect the user to home.php.
      header('Location: home.php');
      exit();
    }
  }
}
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

    <title>登录 | bookshare</title>

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
        <h1>登录</h1>
      </div>
    </div>

    <div class="container">
      <!-- Show errors -->
      <?php 
      if(empty($errors) === false){
      ?>
      <div class="alert alert-warning fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <p><strong>错误！</strong>
      <?php
        echo '' . implode('</p><p>', $errors) . '</p>';
      ?>
      </div>
      <?php
      }
      ?>
      <!-- Login form -->
      <div class="row">
        <div class="col-md-4">
          <form role="form" method="post" action="">
            <div class="form-group">
              <label for="inputUsername">用户名:</label>
              <input type="text"  name="username" class="form-control" id="inputUsername" placeholder="Enter username" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" />
            </div>
            <div class="form-group">
              <label for="inputPassword">密码:</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password" />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">登录</button>
          </form>
          <br>
          <a href="confirm-recover.php">忘记了 用户名/密码？</a>
        </div>
      </div>

      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->

    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
