<?php 
# Including our init.php
require 'core/init.php';
$general->logged_in_protect();

# If form is submitted
if (isset($_POST['submit'])) {
  if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
    
    $errors[] = 'All fields are required.';
  } else {
        
        # Validating user's input with functions that we will create next
        if ($users->user_exists($_POST['username']) === true) {
            $errors[] = 'That username already exists';
        }
        if(!ctype_alnum($_POST['username'])){
            $errors[] = 'Please enter a username with only alphabets and numbers';  
        }
        if (strlen($_POST['password']) <6){
            $errors[] = 'Your password must be at least 6 characters';
        } else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }else if ($users->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
  }

  if(empty($errors) === true){
    
    $username   = htmlentities($_POST['username']);
    $password   = $_POST['password'];
    $email    = htmlentities($_POST['email']);

    $users->register($username, $password, $email); // Calling the register function, which we will create soon.
    header('Location: register.php?success');
    exit();
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

    <title>注册 | bookshare</title>

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
        <h1>注册</h1>
      </div>
    </div>

    <div class="container">
      <!-- Show info -->
      <?php 
      if (isset($_GET['success']) && empty($_GET['success'])) {
      ?>
      <div class="alert alert-info fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <p>
      <?php
        echo "Thank you for registering. Please check your email to activate your account";
      ?>
        </p>
      </div>
      <?php
      }
      ?>
      <!-- Register form -->
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
            <div class="form-group">
              <label for="inputEmail">邮箱:</label>
              <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Enter email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>"/>
              <p class="help-block">请填写你常用的邮箱，稍后我们将发送激活邮件到你的邮箱里，激活账户之后，你才能正常登录。</p>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">注册</button>
          </form>
        </div>
      </div>

      <hr>

      <!-- Show errors -->
      <?php 
      # If there are errors, they would be dispalyed here.
      if(empty($errors) === false){
      ?>
      <div class="alert alert-warning fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <strong>错误！</strong>
      <?php
        echo '<p>' . implode('</p><p>', $errors) . '</p>';
      ?>
      </div>
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
