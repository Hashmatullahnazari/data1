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
<title>Document</title>
</head>
<body>

<table width="600" align="center" border="3">

<tr>

<td align="center" colspan="9" bgcolor="orange">
<h1>View All Comments</h1></td>
</tr>

<tr>
<th>ID</th>
<th>Comment</th>
<th>Name</th>
<th>Email</th>
<th>Satus</th>
<th>Delete</th>


</tr>



  <?php
include('database.php');

$get_comments = "select * from comments";

$run_comments = mysqli_query($conn,$get_comments);

$i=1;

while ($row_comments = mysqli_fetch_array($run_comments))
{

        $comment_id = $row_comments['comment_id'];
        $comment_name  = $row_comments['comment_name'];
        $comment_email = $row_comments['comment_email'];
        $comment_text = $row_comments['comment_text'];
        $status = $row_comments['status'];




?>



<tr align="center">
<td><?php echo $i++; ?></td>
<td><?php echo $comment_text; ?></td>
<td><?php echo $comment_name; ?></td>
<td><?php echo $comment_email; ?></td>


 <td>
<?php
if($status=='approve'){

 echo "<a href='index.php?unapproved=$comment_id'>Unapproved</a>";

}

else{

 echo "<a href='index.php?approve=$comment_id'>Approved</a>";

}



?>
</td>
<td><a href="index.php?del_comment=<?php echo $comment_id; ?>">Delete</a></td>
</tr>

<?php } ?>


</table>


</body>
</html>


<?php } ?>