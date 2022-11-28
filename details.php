<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<title>A News Platform</title>
</head>
<body>
<div class="contain">
<!-- header start -->
<div class="header">
  <a href="index.php"><h2>Blog Name</h2></a>
</div>

<!-- header end -->

<!-- navigation bar start -->
<?php include('includes/navbar.php');?>
<!-- navigation bar end -->


<div class="row">
  <div class="leftcolumn">
    <div class="card">
    
    
     <?php
        
    include('includes/database.php');
        
    if(isset($_GET['post'])){
        
       $post_id = $_GET['post'];
    

    $get_posts = "select * from posts where post_id='$post_id'";

    $run_posts = mysqli_query($conn,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts))
    {

        $post_title   =   $row_posts['post_title'];
        $post_date    =   $row_posts['post_date'];
        $post_author  =   $row_posts['post_author'];
        $post_image   =   $row_posts['post_image'];
        $post_content =   $row_posts['post_content'];
        
        echo"
        
        <h2>$post_title</h2>
        <h5><i>Posted by  &nbsp; $post_author &nbsp;$post_date</h5>
        <img class='fakeimg' src='admin/news_images/$post_image'>
        <p>$post_content</p>
        
        ";
        
    
        
        
        
        
    }
    }
    ?>
        
        

   
    </div>   
    <?php include('includes/comment_form.php'); ?>

  </div>
  
  
  <div class="rightcolumn">
<?php include('includes/sidebar.php');?>
  </div>
 
  
  
</div>



<div class="footer">
  <h2>Footer</h2>
</div>
    </div>
</body>
</html>