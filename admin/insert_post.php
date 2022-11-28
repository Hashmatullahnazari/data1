
<!DOCTYPE html>
<html>

<head>
    <title>HTML, CSS and JavaScript demo</title>
  <link rel="stylesheet" href="../admin/sty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    
</head>

<body>




<h2>Insert Post Here</h2>
 

 <div class="container">
 <form action="index.php?insert_post" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Post Title</label>
      </div>
      
      
      <div class="col-75">
        <input type="text" name="post_title" placeholder="Your name..">
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="">Post Catergory</label>
      </div>
      <div class="col-75">
        <select name='cat'>
        
<option value="null">Select Category</option>
<?php
include('database.php');

$get_cats = "select * from categories";

$run_cats = mysqli_query($conn,$get_cats);

while($cats_row=mysqli_fetch_array($run_cats))
{

$cat_id    = $cats_row['cat_id'];
$cat_title = $cats_row['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}

?>

</select>

      </div>
    </div>
    
       <div class="row">
      <div class="col-25">
        <label for="">Post Autor</label>
      </div>
      
      
      <div class="col-75">
        <input type="text"  name="post_author" placeholder="Your name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Post Keywords</label>
      </div>
      <div class="col-75">
        <input type="text" name="post_keywords" placeholder="Your last name..">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="fname">Post Image</label>
      </div>
      
      
      <div class="col-75">
        <input type="file" name="post_image" placeholder="Your name..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="">Post Content</label>
      </div>
      
      
      
      <div class="col-75">
        <textarea  id="editor" name="post_content" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" name="submit" value="Publish Now">
    </div>
  </form>
</div>

<script src="../js/app.js"></script>
</body>

</html>


<?php

if(isset($_POST['submit'])) {
    
    
echo $post_title      = $_POST['post_title'];
echo $post_date       = date('m/d/Y');
echo $post_cat        = $_POST['cat'];
echo $post_author     = $_POST['post_author'];
echo $post_keywords   = $_POST['post_keywords']; 
echo $post_image      = $_FILES['post_image']['name'];
echo $post_image_tmp  = $_FILES['post_image']['tmp_name'];
echo $post_content    = $_POST['post_content'];
    
    
if($post_title=='' || $post_cat =='' || $post_author=='' || $post_keywords=='' || $post_image=='' || $post_content=='')
{

echo "<script>alert('please fill in all the fields')</script>";
exit();
}

else
{


move_uploaded_file($post_image_tmp,"news_images/$post_image");


$insert_posts = "insert into posts (category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) 
values ('$post_cat', '$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";

$run_posts = mysqli_query($conn,$insert_posts);



echo "<script>alert('your post has been published')</script>";

echo "<script>window.open('index.php?insert_post','_self')</script>";






}
}


?>



