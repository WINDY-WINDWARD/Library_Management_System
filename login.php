<?php
session_start();

include("connection.php");
include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user_name = $_POST['username'];
        $password = $_POST['pass'];
        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)){
            //read from database
            $query = "select * from users where user_name = '$user_name' and password = '$password'";

            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password']===$password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header('location: index.php');
                        die;
                    }
                }
            }
            else{
                echo "wrong user name or password";
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <form action="login.php" method="POST">
        <h1>Login Page</h1>

            <label for="">Username:</label>
            <input type="text" name="username">
            <label for="">Password:</label>
            <input type="password" name="pass">
            <input type="submit" value="login">
            <a href="signup.php">Signup</a>
        </form>
    </div>
</body>
</html>