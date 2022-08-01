<?php
@session_start();

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
<?php
include('database.php');
    
if(isset($_GET['edit_cat'])){

$edit_id = $_GET['edit_cat'];

$get_cat = "select * from categories where cat_id='$edit_id'";

$run_cat_new = mysqli_query($conn,$get_cat);


while($row_cat=mysqli_fetch_array($run_cat_new)){

$cat_id  = $row_cat['cat_id'];
$cat_title = $row_cat['cat_title'];



}
}


?>

</body>
</html>

<form action="index.php?insert_cat" method="post">
<b>Insert new category</b><input type="text" name="new_cat" value="<?php echo $cat_title; ?>"/>

<input type="submit" name="update_cat" value="Update Category">

</form>


<?php
  include('includes/database.php');
if(isset($_POST['update_cat'])){
$cat_title = $_POST['new_cat'];

if($cat_title==''){
echo"<script>alert('please insert category name')</script>";
echo "<script>window.open('index.php?insert_cat','_self')</script>";
}
else{

$update_cat = "update categories set cat_title='$cat_title' where cat_id='$cat_id'";

$run_update = mysqli_query($conn,$update_cat);

echo"<script>alert('Category Updated')</script>";
echo "<script>window.open('index.php?view_cats','_self')</script>";

}

}

?>


<?php } ?>