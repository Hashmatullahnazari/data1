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

     
  
     
     <?php
    include('includes/database.php');
    if(!isset($_GET['cat'])){


    $get_posts = "select * from posts order by rand() LIMIT 0,5";

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
       <div class='card'>
                <h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
                 <h5>$post_author</h5>
                <h5>$post_date</h5>
                
                <div><img src='admin/news_images/$post_image'></div>
               
                <p>$post_content <br><a class='btn' href='details.php?post=$post_id'>Read More
                </a></p>
            </div>
        
        ";
        
    
        
      }
    }
         else
         
        if(isset($_GET['cat'])){
            
            $cat_id = $_GET['cat'];

    $get_posts = "select * from posts where category_id='$cat_id'";

    $run_posts = mysqli_query($conn,$get_posts);

    while($row_posts = mysqli_fetch_array($run_posts))
        
    {

        $post_id      =   $row_posts['post_id'];
        $post_title   =   $row_posts['post_title'];
        $post_date    =   $row_posts['post_date'];
        $post_author  =   $row_posts['post_author'];
        $post_image   =   $row_posts['post_image'];
        $post_content =   substr($row_posts['post_content'],0,300);
        
        echo "
        <div class='card'>
                <h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
                 <h5>$post_author</h5>
                <h5>$post_date</h5>
                
                <div><img src='admin/news_images/$post_image'></div>
               
                <p>$post_content <br><a class='btn' href='details.php?post=$post_id'>Read More
                </a></p>
            </div>
        
        
        
        ";
        
    
    }
        
        
        
    }

?>
     <script src="js/app.js"></script>
</body>
</html>

