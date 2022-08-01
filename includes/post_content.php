       <div class="leftcolumn">


     
     <div class="card">
     
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
        
        <h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</h2>
        
        <h5><i>Posted by&colon;</i>&nbsp;$post_author &nbsp;$post_date</b></h5>
        
        <img class='fakeimg' src='admin/news_images/$post_image'>
        
        <p>$post_content <a id='rmlink' href='details.php?post=$post_id'>Read More</a></p>

        
        
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
        
        <h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
        
        <h5><i>Posted by&colon;</i>&nbsp;$post_author &nbsp;$post_date</h5>
        <img class='fakeimg' src='admin/news_images/$post_image'>
        <p>$post_content <a id='rmlink' href='details.php?post=$post_id'>Read More</a></p>

        
        
        ";
        
    
    }
        
        
        
    }

?>

</div>
  </div>