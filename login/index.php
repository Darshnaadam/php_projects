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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>
    <a href="logout.php">Logout</a>

    <h2>Hello, <?php echo $user_data['user_name']; ?></h2>

    <h3>Welcome to our website!</h3>
</body>
</html>