<?php 
# Including our init.php
include 'core/init.php';
if(isset($_GET['username']) && empty($_GET['username']) === false) { // Putting everything in this if block.

  $username   = htmlentities($_GET['username']); // sanitizing the user inputed data (in the Url)
  if ($users->user_exists($username) === false) { // If the user doesn't exist
    header('Location:index.php'); // redirect to index page. Alternatively you can show a message or 404 error
    die();
  }else{
    $profile_data   = array();
    $user_id    = $users->fetch_info('id', 'username', $username); // Getting the user's id from the username in the Url.
    $profile_data = $users->userdata($user_id);
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

    <title><?php echo $username; ?> | bookshare</title>

    <!-- External CSS -->
    <?php include 'includes/external-css.php' ?>
    <link href="css/profile.css" rel="stylesheet">

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
        <h1><?php echo $profile_data['username']; ?></h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <?php 
            $image = $profile_data['image_location'];
            echo "<img class='img-thumbnail img-circle img-responsive' src='$image'>";
          ?>
        </div>
        <div class="col-md-10">

          <?php if(!empty($profile_data['first_name']) || !empty($profile_data['last_name'])){?>

            <span><strong>姓名</strong>：</span>
            <span><?php if(!empty($profile_data['first_name'])) echo $profile_data['first_name'], ' '; ?></span>
            <span><?php if(!empty($profile_data['last_name'])) echo $profile_data['last_name']; ?></span>

            <br>  
          <?php 
          } 
          
          if($profile_data['gender'] != 'undisclosed'){
          ?>
            <span><strong>性别</strong>：</span>
            <span><?php echo $profile_data['gender']; ?></span>
        
            <br>
          <?php } 

          if(!empty($profile_data['bio'])){
            ?>
            <span><strong>个人简介</strong>：</span>
            <span><?php echo $profile_data['bio']; ?></span>
            <?php 
          }
          ?>
        </div>
      </div>

    </div> <!-- /container -->
    <div class="container">
      
      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div>


    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
  <?php
}else{
  header('Location: index.php'); // redirect to index if there is no username in the Url
}