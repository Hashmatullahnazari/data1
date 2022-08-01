<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../admin/syle_login.css" media="all">
</head>
<body>


<form action="login.php" method="post">

<h2 align='center'>Login Form</h2>

  <div class="container">
    <label for="user_name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user_name" required>

    <label for="user_pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="user_pass" required>
        
    <button type="submit" name="login">Admin Login</button>
   
  </div>

  
</form>

</body>

</html>


<?php
include('database.php');
    if(isset($_POST['login'])){
        
        $user_name = mysqli_real_escape_string ($conn,$_POST['user_name']);
        $user_pass = mysqli_real_escape_string ($conn,$_POST['user_pass']);
        
        
        $select_user = "select * from users where user_name='$user_name' AND user_password='$user_pass'";
            
        $run_user = mysqli_query($conn,$select_user);
        
        if(mysqli_num_rows($run_user)>0){
            
        $_SESSION['user_name']=$user_name;

        
        echo "<script>window.open('index.php?logged=You Have Logged in Successfully!','_self')</script>";

        echo "<script>alert('Your Name or Password is Incorrect)</script>";

        
    }
    }
    
    ?>