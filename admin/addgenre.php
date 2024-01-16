<?php
include 'db.php';
include 'header.php';
include 'ft.php';
?>

<div class="container">
    <div class="head">
        <h1>Add a category</h1>
        <div class="jumbotron">
            <h1 class="display-4">Add a Genre</h1>
            <p class="lead">Add Genre and also please mention their genre ID</p>
            <hr class="my-4">
            <form action="addgenre.php" method="post">
                <div class="form-row">
                    <div class="col-7">
                        <input type="text" name="genrename" class="form-control" placeholder="Genre Name">
                    </div>
                    <div class="col">
                        <input type="text" name="cat_id" class="form-control" placeholder="Category ID">
                    </div>
                    <div class="col">
                        <input type="text" name="genre_id" class="form-control" placeholder="Genre ID">
                    </div>
                </div>
                <br><br>
                <button class="btn btn-primary btn-lg" name="submit" type="submit" role="button">Add Genre</button>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $gename = $_POST['genrename'];
    $catid = $_POST['cat_id'];
    $genre = $_POST['genre_id'];

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO `genre`(`genre_name`, `category_id`, `genreid`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'sii', $gename, $catid, $genre);

    // Execute the statement
    $run = mysqli_stmt_execute($stmt);

    if ($run) {
        echo "<script>alert('Genre Added');window.location.href='genrelist.php';</script>";
    } else {
        echo "<script>alert('Something went wrong')window.location.href='addgenre.php';</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

?>
