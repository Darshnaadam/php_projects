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
            // Read from database
            $query = "select * from users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if(password_verify($password, $user_data['password']))
                    {

                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("location: index.php");
                        die;
                    }
                }
            }

            echo "Wrong username or password!";
        }
        else
        {
            echo "Wrong username or password!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
        <form method="post">
            <h2>Login Here</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="user_name" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>

    <p>Click here to <a href="signup.php">Signup</a></p>
</body>
</html>