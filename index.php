<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css" media="all">


<title>A News Platform</title>
</head>
<body>

<!-- header start -->

<div class="row">
<div class="header">
    <a href="index.php"><h2>Blog Name</h2></a>
</div>

<!-- header end -->

<!-- navigation bar start -->
<?php include('includes/navbar.php');?>
<!-- navigation bar end -->


  
<?php include('includes/post_content.php');?>

 

  <div class="rightcolumn">
<?php include('includes/sidebar.php');?>
 
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
     <script src="js/app.js"></script>
</body>
</html>