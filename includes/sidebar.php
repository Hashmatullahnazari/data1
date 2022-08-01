
<div class="card">
     <h1 align='center'>Recent Stories</h1>

     <?php
    include('includes/database.php');

    $get_posts = "select * from posts order by 1 DESC LIMIT 0,5";

    $run_posts = mysqli_query($conn,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts))
    {

        $post_id      =   $row_posts['post_id'];
        $post_title   =   $row_posts['post_title'];
        $post_image   =   $row_posts['post_image'];
        
        echo"
        
        
        <h2><a href='details.php?post=$post_id'>$post_title</a></h2>
        <img class='fakeimg' src='admin/news_images/$post_image'>

        
        
        ";
        
    
        
        
        
        
    }
    

    ?>
        
      
   
</div>