
<!DOCTYPE html>
<html>

<head>
    <title>HTML, CSS and JavaScript demo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class='row'>
<?php include('includes/navbar.php');?>


<?php include('includes/post_left.php');?>
     


<div class='middlecolumn'>

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
        
        echo "
        
        <div class='card'>
                <h2>$post_title</h2>
                 <h5>$post_author</h5>
                <h5>$post_date</h5>
                
                <div><img class='' src='admin/fresh_images/$post_image'></div>
               
                <p>$post_content</p>
            </div>
            
            ";
        
    
        
        
        
        
    }
    }
    ?>


      <?php include('includes/comment_form.php');?>


 
   </div>
   
      <?php include('includes/post_right.php');?>
      
      
    </div>
    
     <script src='js/app.js'></script>
</body>

</html>