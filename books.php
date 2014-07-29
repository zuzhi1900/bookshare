<?php 
# Including our init.php
require 'core/init.php';
$general->logged_out_protect();

# If form is submitted
if(empty($_POST) === false) {
    if(empty($_POST['bookname']) || empty($_POST['author']) || empty($_POST['isbn'])){

    $errors[] = 'All fields are required.';
  } else {

    if (isset($_POST['bookname']) && !empty($_POST['bookname'])) {
      # code...
    }
    if (isset($_POST['author']) && !empty($_POST['author'])) {
      # code...
    }
    if (isset($_POST['isbn']) && !empty($_POST['isbn'])) {
      # code...
    }
  }
  if(empty($errors) === true) {
    $bookname   = htmlentities($_POST['bookname']);
    $author   = htmlentities($_POST['author']);
    $isbn    = htmlentities($_POST['isbn']);

    $books->add_book($bookname, $author, $isbn); // Calling the add_book function, which we will create soon.
    header('Location: books.php?success');
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

    <title>书籍 | bookshare</title>

    <!-- External CSS -->
    <?php include 'includes/external-css.php' ?>

  </head>

  <body>
    <!-- navbar -->
    <?php include 'includes/navbar.php' ?>

    <div class="container">
      <!-- Show info -->
      <?php
      if (isset($_GET['success']) && empty($_GET['success'])) {
      ?>
      <div class="alert alert-info fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <p>
      <?php
          echo "已添加！";
      ?>
        </p>
      </div>
      <?php
      }
      ?>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>添加图书</h2>
          <form class="form-horizontal" method="post" action="" role="form">
            <div class="form-group">
              <label for="bookname" class="col-sm-2 control-label">书名</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="bookname" name="bookname" placeholder="bookname">
              </div>
            </div>
            <div class="form-group">
              <label for="author" class="col-sm-2 control-label">作者</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" placeholder="author">
              </div>
            </div>
            <div class="form-group">
              <label for="isbn" class="col-sm-2 control-label">isbn</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="isbn">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <h2>你的图书</h2>
      
      <?php
      $booksdata = $books->get_books();
      foreach ($booksdata as $bookdata) {?>
      <div class="row">
<<<<<<< HEAD
        <div class="col-md-4">
          <h2>你的图书</h2>
          <p>书名：</p>
          <p>作者：</p>
          <p>isbn：</p>
          <?php
          $booksdata = $books->get_books();
          foreach ($booksdata as $bookdata) {
            echo "id: ".$bookdata['id']."<br>";
            echo "bookname: ".$bookdata['bookname']."<br>";
            echo "auhtor: ".$bookdata['author']."<br>";
            echo "isbn: ".$bookdata['isbn']."<br>";
          };
          ?>
=======
        <div class="col-md-offset-4 col-md-4">
      <?php
          echo '<p>书名：'.$bookdata['bookname']."</p>";
          echo '<p>作者：'.$bookdata['author']."</p>";
          echo '<p>isbn：'.$bookdata['isbn']."</p>";
      ?>
>>>>>>> origin/master
        </div>
      </div>
      <?php
      };
      ?>
      

      <!-- footer -->
      <?php include 'includes/footer.php' ?>
    </div> <!-- /container -->

    <!-- External JS -->
    <?php include 'includes/external-js.php' ?>
  </body>
</html>
