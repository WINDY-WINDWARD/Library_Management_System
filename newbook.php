<?php

session_start();


include("connection.php");
include("functions.php");
$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_name = $_POST['Bname'];
    $book_name = addslashes($book_name);
    $Author_name = $_POST['Aname'];
    $pub_year = $_POST['Pub_year'];

    $query = "insert into books (title,author_name,pub_year) values('$book_name','$Author_name', '$pub_year')";
    mysqli_query($conLib, $query);
    header("location: newbook.php");
    die;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <div class="text-center display-4">Add To Library Inventory</div>
            </div>
        </div>
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="col-12 d-flex flex-column mt-3" style="border: 2px solid black; padding: 6px;">
                <label>Book Name:</label>
                <input type="text" name="Bname" required>

                <label>Author Name:</label>
                <input type="text" name="Aname" required>

                <label>Publish Year:</label>
                <input type="date" name="Pub_year" class="mb-3" required>
                <input type="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.js"></script>
</body>

</html>