<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

$query = "select * from books";
$result = mysqli_query($conLib, $query);
global $S_result;
$_GET['reset'] = false;
if ($_GET['reset'] === true) {
    unset($S_result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_title = $_POST['search'];
    $book_title = addslashes($book_title);
    $query = "select * from books where title like '%$book_title%'";
    $S_result = mysqli_query($conLib, $query);
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
                <div class="text-center display-4">The Library Inventory</div>
            </div>
        </div>
        <div class="row">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="col-12 d-flex m-4">
                <div class="col-4"><button class="btn-danger btn"><a href="<?php echo $_SERVER["PHP_SELF"] . "?reset=true" ?>" style="text-decoration: none; color: white;">Reset Page</a></button></div>
                <div class="col-6 d-flex justify-content-end"><input type="text" name="search" placeholder="Search"></div>
                <div class="col-2"><input type="submit" value="submit" class="btn btn-primary btn-sm"></div>
            </form>
        </div>
        <?php
        if (isset($S_result)) {
            for ($i = 0; $i < mysqli_num_rows($S_result); $i++) {
                $row = mysqli_fetch_assoc($S_result);
                echo "<div class=\"row\">";
                echo "<div class=\"col-6 text-center border-primary\" style=\"border: 2px solid;\">" . $row['title'] . "</div>";
                echo "<div class=\"col-4 text-center border-primary\" style=\"border: 2px solid;\">" . $row['author_name'] . "</div>";
                echo "<div class=\"col-2 text-center border-primary\" style=\"border: 2px solid;\">" . $row['pub_year'] . "</div>";
                echo "</div>";
            }
        } else {
            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $row = mysqli_fetch_assoc($result);
                echo "<div class=\"row\">";
                echo "<div class=\"col-6 text-center border-primary\" style=\"border: 2px solid;\">" . $row['title'] . "</div>";
                echo "<div class=\"col-4 text-center border-primary\" style=\"border: 2px solid;\">" . $row['author_name'] . "</div>";
                echo "<div class=\"col-2 text-center border-primary\" style=\"border: 2px solid;\">" . $row['pub_year'] . "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <script src="./bootstrap-4.0.0-dist/js/bootstrap.js"></script>
</body>

</html>