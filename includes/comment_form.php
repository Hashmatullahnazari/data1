<h2>post your comment</h2>

<?php
include('includes/database.php');

if(isset($_GET['post'])){

$post_id = $_GET['post'];

$get_posts = "select * from posts where post_id='$post_id'";

$run_posts = mysqli_query($conn,$get_posts);

$row=mysqli_fetch_array($run_posts);

$post_new_id=$row['post_id'];

}
?>
<h3>Comment so far
<?php

$get_comments = "select * from comments where post_id='$post_new_id' AND status='approve'";

$run_comments = mysqli_query($conn,$get_comments);

$count = mysqli_num_rows($run_comments);

echo "(". $count .")";

?>

</h3>

<?php
include('includes/database.php');

$get_comments = "select * from comments where post_id='$post_new_id' AND status='approve'";

$run_comments = mysqli_query($conn,$get_comments);

while($row_comments=mysqli_fetch_array($run_comments)){

$comment_name=$row_comments['comment_name'];
$comment_text=$row_comments['comment_text'];

echo "<h3>$comment_name<i>Says:</i></h3>";
    
echo "<h3>$comment_text</h3>";
}

?>



<form method="post" action="details.php?post=<?php echo $post_new_id; ?>">
<table width="500">

<tr>  
<td>Your Name</td>
<td align=""><input type="text" name="comment_name" /></td>
</tr>

<tr>
<td> Your Email:</td>
<td align=""><input type="text" name="comment_email" /></td>
</tr>

<tr>
<td>Your Comment:</td>
<td><textarea align="center"  name="comment" colspan="10" rows="10"></textarea></td>
</tr>

<tr>
<td align="center" colspan="5"><input type="submit" name="submit" value="Post Comment"></td>

</tr>


</table>

</form>


<?php


if(isset($_POST['submit'])){

$post_com_id = $post_new_id;
$comment_name = $_POST['comment_name'];
$comment_email = $_POST['comment_email'];
$comment = $_POST['comment'];
$status = "unapproved";

if($comment_name=='' || $comment_email=='' || $comment==''){

echo "<script>alert('please fill in all the blanks')</script>";
echo "<script>window.open('details.php?post=$post_id')</script>";
exit();
}

else{


$query_comment = "insert into comments (post_id,comment_name,comment_email,comment_text,status) values('$post_com_id','$comment_name','$comment_email','$comment','$status')";

$run_query = mysqli_query($conn,$query_comment);


echo "<script>alert('your comment is been reviewed please wait for approval')</script>";

echo "<script>window.open('details.php?post=$post_id')</script>";



}

}







?>