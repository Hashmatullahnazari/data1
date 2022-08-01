
    

    
<div class="topnav">

    <?php
    include('includes/database.php');

    $get_cats = 'select * from categories';

    $run_cats = mysqli_query($conn,$get_cats);

    while($cats_row=mysqli_fetch_array($run_cats)){

    $cat_id    = $cats_row['cat_id'];
    $cat_title = $cats_row['cat_title'];

    echo"<a href='index.php?cat=$cat_id'>$cat_title</a>";

    }

    ?>

    <div class="search-container">
    <form method="get"  action="results.php" enctype="multipart/form-data">
      <input type="text"  name="search_query"/>
      <input type="submit"  name="search" value="Search Now"/>
    </form>
    </div>
  
</div>