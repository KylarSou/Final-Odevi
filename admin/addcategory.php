<?php

include 'header.php';
include 'ft.php';
include 'db.php';
?>

<div class="container">
    <div class="head">
        <h1>Add a category</h1>
        <div class="jumbotron">
  <h1 class="display-4">Add a Category</h1>
  <p class="lead">Add Category and adlso please mention their category ID</p>
  <hr class="my-4">
  <form action="addcategory.php" method="post">
  <div class="form-row">
    <div class="col-7">
      <input type="text" name="catname" class="form-control" placeholder="Category Name">
    </div>
    <div class="col">
      <input type="text" name="catid" class="form-control" placeholder="Category ID">
    </div>
    <div class="col">
      <input type="text" name="genid" class="form-control" placeholder="Genre ID">
    </div>
  
  </div>
  <br><br>
  <button class="btn btn-primary btn-lg" name="submit" href="#" role="button">Add Category</button>
</form>
  
</div>
    </div>
</div>
<?php 

if (isset($_POST['submit'])) {
    $catname = $_POST['catname'];
    $catid = $_POST['catid'];
    $genre = $_POST['genid'];

    $query = "INSERT INTO `category`( `category_id`, `category_name`, `genre_id`) VALUES ($catid,'$catname',$genre)";
    $run = mysqli_query($con,$query);
    if ($run) {
        echo "<script>alert('Category Added');window.location.href='categorylist.php';</script>";
    }
    else{
        echo "nonono";
    }

}


?>
