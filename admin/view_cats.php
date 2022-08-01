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
</head>
<body>
   
  <table width="600" align="center" border="3">
    
    <tr>
       
        <td align="center" colspan="9" bgcolor="orange">
        <h1>View All Posts</h1></td>
    </tr>
 
     <tr>
        <th>Post ID</th>
        <th>Post Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    
   
          <?php
    include('database.php');

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($conn,$get_cats);
      
    $i=1;
      
    while($row_cats = mysqli_fetch_array($run_cats))
    {

        $cat_id      =   $row_cats['cat_id'];
        $cat_title   =   $row_cats['cat_title'];
    

    

    ?>
        

   
   <tr align="center">
        <td><?php echo $i++;?></td>
        <td><?php echo $cat_title;?></td>
        <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
        <td><a href="index.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
    </tr>
   
   <?php }?>
   
   
    </table>
    

    
</body>
</html>


<?php } ?>