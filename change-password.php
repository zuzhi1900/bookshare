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

    <title>修改密码 | bookshare</title>

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
        <h1>修改密码</h1>
      </div>
    </div>

    <div class="container">
<?php
        if(empty($_POST) === false) {
           
            if(empty($_POST['current_password']) || empty($_POST['password']) || empty($_POST['password_again'])){

                $errors[] = 'All fields are required';

            }else if($bcrypt->verify($_POST['current_password'], $user['password']) === true) {

                if (trim($_POST['password']) != trim($_POST['password_again'])) {
                    $errors[] = 'Your new passwords do not match';
                } else if (strlen($_POST['password']) < 6) { 
                    $errors[] = 'Your password must be at least 6 characters';
                } else if (strlen($_POST['password']) >18){
                    $errors[] = 'Your password cannot be more than 18 characters long';
                } 

            } else {
                $errors[] = 'Your current password is incorrect';
            }
        }

        if (isset($_GET['success']) === true && empty ($_GET['success']) === true ) {
        echo '<p>你的密码已修改成功！</p>';
        } else {?>
            
            <?php
            if (empty($_POST) === false && empty($errors) === true) {
                $users->change_password($user['id'], $_POST['password']);
                header('Location: change-password.php?success');
            } else if (empty ($errors) === false) {
                    
                echo '<p>' . implode('</p><p>', $errors) . '</p>';  
            
            }
            ?>
      <div class="row">
        <div class="col-md-4">
            <form role="form" action="" method="post">
              <div class="form-group">
                  <label for="inputPassword">当前密码：</label>
                  <input type="password" name="current_password" id="inputPassword" class="form-control">
              </div>
              <div class="form-group">
                  <label for="inputNewPassword">新密码：</label>
                  <input type="password" name="password" id="inputNewPassword" class="form-control">
              </div>
              <div class="form-group">
                  <label for="inputReNewPassword">再次输入新密码：</label>
                  <input type="password" name="password_again" id="inputReNewPassword" class="form-control">
              </div>
              <button class="btn btn-primary" type="submit">确认修改</button>
            </form>
          </div>
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
