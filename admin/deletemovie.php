<?php 

include 'header.php';
include 'ft.php';
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `movie` WHERE id=$id";
    $run = mysqli_query($con,$query);
    if ($run) {
        header('location:movielist.php');
    }
    else{
        echo "<script>alert('something went wrong');window.location.href='movielist.php';</script>";
    }
}
else{
    header('location:movielist.php');
}


?>