<div class="topnav" id="myTopnav">

<?php
include('includes/database.php');

$get_cats = "select * from categories";

$run_cats = mysqli_query($conn,$get_cats);

while($cats_row=mysqli_fetch_array($run_cats))
{

$cat_id    = $cats_row['cat_id'];
$cat_title = $cats_row['cat_title'];

echo "<a href =index.php?cat='$cat_id'>$cat_title</a>";

}

    
?>


<div class="search-container">
<form method="get" "result.php" enctype="multipart/form-data">
<input type="text" placeholder="Search.." name="search_query">
<button type="submit" name="search"><i class="fa fa-search"></i></button>
</form>
</div>

<a href="javascript:void(0);" class="icon" onclick="myFunction()">
<i class="fa fa-bars"></i>
</a>
</div>