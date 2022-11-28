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
</head>
<body>
   
  <table width="50%" align="center" border="3">
    
    <tr>
       
        <td align="center" colspan="9" bgcolor="orange">
        <h1>View All Posts</h1></td>
    </tr>
 
     <tr>
        <th>Post ID</th>
        <th>Post Title</th>
        <th>Post author</th>
        <th>Post image</th>
        <th>comments</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    
   
          <?php
    include('database.php');

    $get_posts = "select * from posts";

    $run_posts = mysqli_query($conn,$get_posts);
      
    $i=1;
        
    while($row_posts = mysqli_fetch_array($run_posts))
    {

        $post_id      =   $row_posts['post_id'];
        $post_title   =   $row_posts['post_title'];
        $post_author  =   $row_posts['post_author'];
        $post_image   =   $row_posts['post_image'];

    

    ?>
        

   
   <tr align="center">
        <td><?php echo $i++; ?></td>
        <td><?php echo $post_title; ?></td>
        <td><?php echo $post_author; ?></td>
        <td><img src="news_images/<?php echo $post_image; ?>" width="50" height="50"></td>
        <td>
        
<?php

        $get_comments = "select * from comments where post_id='$post_id'";

        $run_comments = mysqli_query($conn,$get_comments);
        
        $count = mysqli_num_rows($run_comments);

        echo $count;


?>
            
        </td>
        <td><a href="index.php?edit_post=<?php echo $post_id; ?>">Edit</a></td>
        <td><a href="delete_post.php?delete_post=<?php echo $post_id; ?>">Delete</a></td>
    </tr>
   
   <?php } ?>
   
   
    </table>
    
</body>
</html>


<?php } ?>