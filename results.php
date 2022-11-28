<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>A News Platform</title>
</head>
<body>

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
    if(isset($_GET['search'])){
        
     $get_query = $_GET['search_query'];
        
        if($get_query==''){
            echo"<script>alert('please write a keyword')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
        }

    $get_posts = "select * from posts where post_keywords like '%$get_query%'";

    $run_posts = mysqli_query($conn,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts))
    {

        $post_id      =   $row_posts['post_id'];
        $post_title   =   $row_posts['post_title'];
        $post_date    =   $row_posts['post_date'];
        $post_author  =   $row_posts['post_author'];
        $post_image   =   $row_posts['post_image'];
        $post_content =   substr($row_posts['post_content'],0,300);
        
        echo "
        
        <h2><a id='1title' href='details.php?post=$post_id'>$post_title</a></h2>
        <h5><i>Posted by&colon;</i>&nbsp;$post_author &nbsp;$post_date</b></h5>
        <img class='fakeimg' src='admin/news_images/$post_image'>
        <p>$post_content <a id='rmlink' href='details.php?post=$post_id'>&nbsp;Read More</a></p>

        
        
        ";
        
    
        
      }
    }

        if(isset($_GET['cat'])){
            
            $cat_id = $_GET['cat'];

    $get_posts = "select * from posts where category_id='$cat_id'";

    $run_posts = mysqli_query($conn,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts))
        
    {

        $post_id      =   $row_posts['post_id'];
        $post_title   =   $row_posts['post_title'];
        $post_date    =   $row_posts['post_date'];
        $post_author  =   $row_posts['post_author'];
        $post_image   =   $row_posts['post_image'];
        $post_content =   substr($row_posts['post_content'],0,300);
        
        echo "
        
        <h2><a id='1title' href='details.php?post=$post_id'>$post_title</a></h2>
        <h5><i>Posted by&colon;</i>&nbsp;$post_author &nbsp;$post_date</h5>
        <img class='fakeimg' src='admin/news_images/$post_image'>
        <p>$post_content <a id='rmlink' class='btn' href='details.php?post=$post_id'>Read More
                </a></p>
            
               
            </div>
        

        
        
        ";
        
    
    }
        
        
        
    }

?>

</div> 
  </div>

  <div class="rightcolumn">
<?php include('includes/sidebar.php');?>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
    
</body>
</html>