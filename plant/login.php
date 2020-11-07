<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="login_styles.css">
    </head>

<body>
    <div class="main">
        <header>
            <div class="icon"><img src="images/Logo.png"></div>
            <br> <h4>Login</h4>
        </header>

        <form action="user_login.php" method="POST" id="login-box">
            <label for="username">Username</label><br>
            <input type ="text" name="uname" placeholder="Enter Username" class="inp" required><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="pass" placeholder="Enter Password" class="inp" required><br><br>
            <input type="submit" name="submit" value="Login" class="sub-btn">
        </form>

        <a href="register.php" id="reg">Sign Up?</a>
        <a href="index.php" id="home">Back to Home</a>
    </div>

</body>
</html>
