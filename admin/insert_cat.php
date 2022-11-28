    <?php
    @session_start();

    if(!isset($_SESSION['user_name']))
    {

        echo "<script>window.open('../login.php?not_authorize=You are not authorize to access!','_self')</script>";

    }

    else {

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="../admin/sty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    
    <form action="index.php?insert_cat" method="post">
        <b>Insert new category</b><input type="text" name="new_cat">
        
        <input type="submit" name="insert_cat" value=" Insert Category Now">
        
    </form>
</head>
<body>
    
</body>
</html>


<?php
  include('database.php');
if(isset($_POST['insert_cat'])){
    $cat_title = $_POST['new_cat'];
    
    if($cat_title==''){
          echo"<script>alert('please insert category name')</script>";
     echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
    $insert_cat = "insert into categories (cat_title) values ('$cat_title')";
    
    $run_cat = mysqli_query($conn,$insert_cat);
    
     echo"<script>alert('New Category Added')</script>";
     echo "<script>window.open('index.php?insert_cat','_self')</script>";

}

}

?>


<?php } ?>