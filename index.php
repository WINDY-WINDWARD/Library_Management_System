<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY webpage</title>
    <link rel="stylesheet" href="./bootstrap-4.0.0-dist/css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">LIB-MAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="books.php">Book List</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="display-3 text-center">Welcome To the Library System</p>
            </div>
        </div>
        <div class="row mt-4 d-flex align-content-center justify-content-center">
            <div class="col-6" style="font-size: 25px;">
                Hello, <?php echo $user_data['user_name']; ?>
            </div>
            <div class="col-2"><button class="btn btn-danger"><a href="logout.php">Logout</a></button></div>
        </div>
        <div class="row d-flex align-content-center justify-content-center mt-3">
            <div class="col-4">
                <a href="newbook.php" class="page-link">Add new book</a>
            </div>
            <div class="col-4">
                <a href="books.php" class="page-link">Book List</a>
            </div>
        </div>
    </div>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.js"></script>
</body>

</html>