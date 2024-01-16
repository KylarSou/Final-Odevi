<?php 

include 'db.php';
include 'ft.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cross Cinema</title>


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="height: 50px; width: auto; max-width: 100%;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact Us</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="disclaimer.php">Disclaimer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="privacy.php">Privacy Policy</a>
      </li>
    </ul>
  </div>
</nav>

<!-- contact -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="valicontact.php" method="post">
       	<input type="text" required name="username" placeholder="Enter Your Name" class="form-control">
       	<br>
       	<input type="text" required name="email" placeholder="Enter Your Mail" class="form-control">
       	<br>
       	<input type="text" required name="msg" placeholder="Type Your Message" class="form-control">
       	<br>
       	<button name="csub" class="btn btn-" style="background-color: #726297;color: #fff;">Submit</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- second nav -->
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Category</a>
  
<?php

$q1 = "select * from category";
$run = mysqli_query($con,$q1);
if ($run) {
  while ($row = mysqli_fetch_assoc($run)) {
 
    
    ?>
<?php 

$id = $row['id'];
$enc1 = (($id*123456789*54321)/956783);
$url = "category.php?id=".urldecode(base64_encode($enc1));

 ?>
  <a href="<?php echo$url ?>"><?php  echo $row['category_name']; ?></a>
 <?php
  }

}
?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  
</div>
<br>
<!-- marq -->
<?php 

$q2 = "SELECT * FROM movie ORDER BY mv_name DESC limit 1";
$r2 = mysqli_query($con,$q2);
if ($r2) {
  while ($ro = mysqli_fetch_assoc($r2)) {
    ?>

<marquee style="background-color: #ccc;" onmouseover="this.stop();" onmouseout="this.start();"><a class="nav-link" href="#"><?php echo $ro['mv_name']; ?></a></marquee>

    <?php
  }

}

 ?>

<!-- Third Nav -->

<div class="topnav1" id="mytopnav1">
    <a href="index.php" class="active">Genre</a>
  <?php 

$query = "SELECT * FROM genre";
$run = mysqli_query($con,$query);
if ($run) {
  while ($rows=mysqli_fetch_assoc($run)) {
    ?>
    <?php 

    $id = $rows['id'];
$enc1 = (($id*123456789*54321)/956783);
$url = "genre.php?id=".urldecode(base64_encode($enc1));

     ?>
    <a href="<?php echo$url; ?>"><?php echo $rows['genre_name']; ?></a>
    <?php
  }
}


   ?>

 

  <a href="javascript:void(0);" class="icon1" onclick="myFunction1()">
    <i class="fa fa-bars"></i>
  </a>
</div>
 
<!-- sidbar -->
<?php
include 'sidebar.php';
 ?>

