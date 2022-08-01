    <?php
    session_start();

    if(!isset($_SESSION['user_name']))
    {

        echo "<script>window.open('../login.php?not_authorize=You are not authorize to access!','_self')</script>";

    }

    else {

    ?>



<?php
  include('database.php');

if(isset($_GET['delete_post'])){
    
$delete_id = $_GET['delete_post'];

$delete_post = "delete from posts where post_id='$delete_id'";

$run_delete = mysqli_query($conn,$delete_post);
    
 echo "<script>alert('A post has been deleted')</script>";

 echo "<script>window.open('../index.php?view_posts','_self')</script>";
}



?>


<?php } ?>