<?php
session_start();
if(!isset($_SESSION['user_name']))
{

echo "<script>window.open('login.php?not_authorize=You are not authorize to access!','_self')</script>";

}

else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="header">
<a href="index.php"><h2>Manage Your Content</h2></a>
</div>

<div class="sidenav">
<h2 class="center">Manage Content</h2>

<a href="index.php?insert_post">Insert New Post</a>
<a href="index.php?view_posts">View all Posts</a>
<a href="index.php?insert_cat">Insert New Category</a>
<a href="index.php?view_cats">View all Categories</a>
<a href="index.php?view_comments">View all Comments</a>
<a href="logout.php">Admin Logout</a>
</div>

<div class="content">
<p>To Do Tasks: <strong><a href="index.php?view_comments">Pending Comments</a></strong></p><?php 

include('database.php');

$get_comments = "select * from comments where status='unapprove'";

$run_comments = mysqli_query($conn,$get_comments);

$count = mysqli_num_rows($run_comments);

echo "(". $count .")";



?>


<h1 align='center'><?php echo @$_GET['logged']; ?></h1>

<?php

if(isset($_GET['insert_post']))
{
include('insert_post.php');
} 


if(isset($_GET['view_posts']))
{
include('view_posts.php');
} 

if(isset($_GET['edit_post']))
{
include('edit_post.php');
} 

if(isset($_GET['insert_cat']))
{
include('insert_cat.php');
} 

if(isset($_GET['view_cats']))
{
include('view_cats.php');
} 


if(isset($_GET['delete_cat']))
{
include('delete_cat.php');
} 


 if(isset($_GET['edit_cat']))
{
include('edit_cat.php');
} 

  if(isset($_GET['view_comments']))
{
include('view_comments.php');
} 

    if(isset($_GET['unapprove']))
{
include('comment_status.php');
} 


    if(isset($_GET['approve']))
{
include('comment_status.php');
} 


      if(isset($_GET['del_comment']))
{
include('del_comment.php');
} 
?>
</div>



</body>
</html>
<?php } ?>



