    <?php
    session_start();

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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css" media="all">
<title>A News Platform</title>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

</head>
<body>

<?php
  include('database.php');

if(isset($_GET['edit_post'])){
    
$edit_id = $_GET['edit_post'];

$select_post = "select * from posts where post_id='$edit_id'";

$run_query=mysqli_query($conn,$select_post);

while ($row_post=mysqli_fetch_array($run_query)){

$post_id    = $row_post['post_id'];
$title      = $row_post['post_title'];
$post_cat   = $row_post['category_id'];
$author     = $row_post['post_author'];
$keywords   = $row_post['post_keywords'];
$image      = $row_post['post_image'];
$content    = $row_post['post_content'];
    
    
    
}
    
}
    

    ?>
    


<form action="" method="post"  enctype="multipart/form-data">
<table align="center" colspan="5"  border="1" width="600">

    <tr>  
    <td align="center" colspan="5"><h1>Update This Post</h1></td>
    </tr>
    
    <tr>
    <td align="center"> Post Title:</td>
    <td><input type="text" name="post_title" size="40" value="<?php echo $title; ?>"/></td>
    </tr>
    
    <tr>
    <td align="center">Post Category:</td><td>
    
    <select name='cat'>
    
     <?php

    $get_cats = "select * from categories where cat_id='$post_cat'";

    $run_cats = mysqli_query($conn,$get_cats);

    while($cats_row=mysqli_fetch_array($run_cats))
    {

    $cat_id=$cats_row['cat_id'];
    $cat_title=$cats_row['cat_title'];

    echo "<option value='$cat_id'>$cat_title</option>";

    $get_more_cats = "select * from categories";
    
    $run_more_cats = mysqli_query($conn,$get_more_cats);
    
        
    while($row_more_cats=mysqli_fetch_array($run_more_cats)){
        
        $cat_id=$row_more_cats['cat_id'];
        $cat_title=$row_more_cats['cat_title'];

        echo "<option value='$cat_id'>$cat_title</option>";
    }
    }

    ?>
    
    </select>
       
    </td>
        
    </tr>

    <tr>
    <td align="center">Post Author:</td>
    <td><input type="text" name="post_author" size="40" value="<?php echo $author; ?>"/></td>
    </tr>
    
    <tr>
    <td align="center">Post Keywords:</td>
    <td><input type="text" name="post_keywords" size="40" value="<?php echo $keywords; ?>"/></td>
    </tr>
    
    <tr>
    <td align="center">Post Image:</td>
    <td><input type="file" name="post_image"><img src="news_images/<?php echo $image; ?>"/></td>
    </tr>
    
    <tr>
    <td align="center">Post Content:</td>
    <td><textarea name="post_content" cols="40" rows="15"><?php echo $content; ?></textarea></td>
    </tr>
    
    <tr>
    <td align="center" colspan="5"><input type="submit" name="update" value="Update Now"></td>

</tr>


</table>

</form>
    
</body>
</html>


<?php

if(isset($_POST['update'])) {
    
    $update_id = $post_id;

    
    $post_title      = $_POST['post_title'];
        
    $post_date       = date('m-d-Y');
        
    $post_cat1        = $_POST['cat'];
        
    $post_author     = $_POST['post_author'];
        
    $post_keywords   = $_POST['post_keywords'];
        
    $post_image      = $_FILES['post_image']['name'];
        
    $post_image_tmp  = $_FILES['post_image']['tmp_name'];
        
    $post_content    = $_POST['post_content'];


       
    
    
    if($post_title=='' || $post_cat=='null' || $post_author=='' || $post_keywords=='' || $post_image=='' || $post_content=='')
{
       
        echo "<script>alert('please fill in all the fields')</script>";
        exit();
}
    
else
{
    
    
    move_uploaded_file($post_image_tmp,"news_images/$post_image");
    
    
        $update_posts = "update posts set category_id='$post_cat1',post_title='$post_title',post_date='$post_date',post_author='$post_author',post_keywords='$post_keywords',post_image='$post_image',post_content='$post_content' where post_id='$update_id'"; 
        
        
        $run_update = mysqli_query($conn,$update_posts);
    
    

        echo "<script>alert('your post has been Updated')</script>";

        echo "<script>window.open('index.php?view_posts','_self')</script>";
    
    

   
    

}
}


?>
<?php } ?>