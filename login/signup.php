<?php
    session_start();

        include("connection.php");
        include("functions.php");

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];


            if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
            {

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // save to database
                $user_id = random_num(10);
                $query = "insert into users (user_id,user_name,password) values ('$user_id', '$user_name', '$hashed_password')";

                mysqli_query($con, $query);

                header("location: login.php");
                die;
            }
            else
            {
                echo "Please enter valid information";
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
        <form method="post">
            <h2>Signup</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="user_name" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Signup">
        </form>
    </div>

    <p>Click here to <a href="login.php">Login</a></p>
</body>
</html>