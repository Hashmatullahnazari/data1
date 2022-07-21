             <div class="rightcolumn">
            <div class="card">
               <?php
                
    include('includes/database.php');

    $get_posts = "select * from posts order by 1 DESC LIMIT 0,5";

    $run_posts = mysqli_query($conn,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts))
    {

        $post_id      =   $row_posts['post_id'];
        $post_title   =   $row_posts['post_title'];
        $post_image   =   $row_posts['post_image'];
        
        echo "
        
        
        <h2><a href='details.php?post=$post_id'>$post_title</a></h2>
        <div><img src='admin/fresh_images/$post_image'></div>
        
        
        ";
        
    
        
        
        
        
    }
    

    ?>
            </div>
      
        </div>