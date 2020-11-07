<?php

// Start the session
session_start();

$user_name = $_POST['uname'];
$user_password = $_POST['pass'];
$full_name = $_POST['name'];
$user_email = $_POST['email'];

$conn = new mysqli('localhost', 'root', '', 'plantanomy');
if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO `users`(`user_name`, `full_name`, `user_email`, `user_password`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$user_name, $full_name, $user_email, $user_password);
    $stmt->execute();
    echo "<script>location.href='index.php'</script>";
    $stmt->close();
    $conn->close();
}

?>