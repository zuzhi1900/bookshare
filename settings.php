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

    <title>设置 | bookshare</title>

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
    <?php include 'includes/navbar.php' ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
      <div class="container">
        <h1>设置</h1>
      </div>
    </div>

    <div class="container">

<?php
      if (isset($_GET['success']) && empty($_GET['success'])) {
          echo '<h3>你的资料已更新！</h3>';         
      } else {

            if(empty($_POST) === false) {
        
        // Make First name and Last name are only letters.
        // if (isset($_POST['first_name']) && !empty ($_POST['first_name'])){
        //  if (ctype_alpha($_POST['first_name']) === false) {
        //  $errors[] = 'Please enter your First Name with only letters!';
        //  } 
        // }
        // if (isset($_POST['last_name']) && !empty ($_POST['last_name'])){
        //  if (ctype_alpha($_POST['last_name']) === false) {
        //  $errors[] = 'Please enter your Last Name with only letters!';
        //  } 
        // }
        
        if (isset($_POST['gender']) && !empty($_POST['gender'])) {
          
          $allowed_gender = array('保密', '男', '女');

          if (in_array($_POST['gender'], $allowed_gender) === false) {
            $errors[] = 'Please choose a Gender from the list'; 
          }

        } 

        if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])) {
          
          $name         = $_FILES['myfile']['name'];
          $tmp_name     = $_FILES['myfile']['tmp_name'];
          $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif' );
          $a            = explode('.', $name);
          $file_ext     = strtolower(end($a)); unset($a);
          $file_size    = $_FILES['myfile']['size'];    
          $path         = "assets/avatars";
          
          if (in_array($file_ext, $allowed_ext) === false) {
            $errors[] = 'Image file type not allowed';  
          }
          
          if ($file_size > 2097152) {
            $errors[] = 'File size must be under 2mb';
          }
          
        } else {
          $newpath = $user['image_location'];
        }

        if(empty($errors) === true) {
          
          if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && $_POST['use_default'] != 'on') {
        
            $newpath = $general->file_newpath($path, $name);

            move_uploaded_file($tmp_name, $newpath);

          }else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
                        $newpath = 'assets/avatars/default_avatar.png';
                    }
              
          $first_name   = htmlentities(trim($_POST['first_name']));
          $last_name    = htmlentities(trim($_POST['last_name']));  
          $gender       = htmlentities(trim($_POST['gender']));
          $bio          = htmlentities(trim($_POST['bio']));
          $image_location = htmlentities(trim($newpath));
          
          $users->update_user($first_name, $last_name, $gender, $bio, $image_location, $user_id);
          header('Location: settings.php?success');
          exit();
        
        } else if (empty($errors) === false) {
          echo '<p>' . implode('</p><p>', $errors) . '</p>';  
        } 
            }
?>
      <p><b>注意：你在这儿填写的信息对他人可见。</b></p>
      <hr class="styled">
      <div class="row">
        <div class="col-md-3">
          <form role="form" action="" method="post" enctype="multipart/form-data">
            <h3>更换个人头像</h3>
            <div class="form-group">
            <?php if(!empty ($user['image_location'])) {
              $image = $user['image_location'];
              echo "<img class='img-thumbnail img-circle img-responsive' src='$image'>";
            }
            ?>
            </div>
            <div class="form-group">
              <input type="file" name="myfile" class="form-control"/>
            </div>
            <?php if($image != 'assets/avatars/default_avatar.png'){ ?>
            <div class="form-group">
              <input type="checkbox" name="use_default" id="use_default" />
              <label for="use_default">使用默认头像</label>
            </div>
            <?php } ?>
        </div>

        <div class="col-md-offset-1 col-md-4">
          <div class="form-group">
              <h3 >更改个人资料</h3>
              <label for="inputLastName">姓：</label>
              <input type="text" name="last_name" id="inputLastName" class="form-control" value="<?php if (isset($_POST['last_name']) ){echo htmlentities(strip_tags($_POST['last_name']));} else { echo $user['last_name']; }?>">
          </div>
          <div class="form-group">
              <label for="inputFirstName">名：</label>
              <input type="text" name="first_name" id="inputFirstname" class="form-control" value="<?php if (isset($_POST['first_name']) ){echo htmlentities(strip_tags($_POST['first_name']));} else { echo $user['first_name']; }?>">
          </div>
          <div class="form-group">
              <label>性别：</label>
              <?php
                $gender   = $user['gender'];
                $options  = array("保密", "男", "女");
                  echo '<select name="gender" class="form-control">';
                  foreach($options as $option){
                      if($gender == $option){
                        $sel = 'selected="selected"';
                      }else{
                        $sel='';
                      }
                      echo '<option '. $sel .'>' . $option . '</option>';
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label>个人简介：</label>
            <textarea name="bio" class="form-control"><?php if (isset($_POST['bio']) ){echo htmlentities(strip_tags($_POST['bio']));} else { echo $user['bio']; }?></textarea>
          </div>
          <div class="form-group">
            <label>确认修改：</label>
            <button class="btn btn-primary form-control" type="submit">更新</button>
          </div>
        </div>
    </div> <!-- /.row -->

    <!-- footer -->
    <?php include 'includes/footer.php' ?>

    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
<?php
}