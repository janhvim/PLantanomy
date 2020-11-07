<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="register_styles.css">
</head>
<body>
    <div class="main">
        <header>
            <div class="icon"><img src="images/Logo.png"></div>
            <br> <h4>Registration</h4>
        </header>
        <form action="registration.php" method="post" id="register-box">
            <label for="username">Username</label><br>
            <input type ="text" name="uname" placeholder="Enter Username" class="inp" required><br><br>
            <label for="email">Email ID</label><br>
            <input type ="email" name="email" placeholder="Enter Email" class="inp" required><br><br>
            <label for="name">Full Name</label><br>
            <input type ="text" name="name" placeholder="Enter Full Name" class="inp" required><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="pass" placeholder="Enter Password" class="inp" required><br><br>
            <label for="confirmPassword">Confirm Password</label><br>
            <input type="password" name="cpass" placeholder="Enter Cofirmed Password" class="inp" required><br><br>
            <input type="submit" name="submit" value="Register" class="sub-btn">
        </form>
        <a href="login.php" id="log">Already signed up?</a>
    </div>

</body>
</html>
