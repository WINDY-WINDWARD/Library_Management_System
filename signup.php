<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = $_POST['username'];
        $password = $_POST['pass'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            $user_id = randnum(20);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name', '$password')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        }
        else{
            echo "Please enter a valid username and password";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: auto;
            margin-top: 20%;
        }
        a{
            padding: 10px;
        }
        input{
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div>
        <form method="POST">
            <h1>Signup Page</h1>
            <label for="">Username:</label>
            <input type="text" name="username">
            <label for="">Password:</label>
            <input type="password" name="pass">
            <input type="submit" value="signup">
            <a href="login.php">login</a>
        </form>
    </div>
</body>
</html>