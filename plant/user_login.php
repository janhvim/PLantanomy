<?php

session_start();

$user_name = $_POST['uname'];
$user_password = $_POST['pass'];



$conn = new mysqli('localhost', 'root', '', 'plantanomy');
if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}else{
    
    $sql = "select * from users where user_name = '$user_name'";

    $result = $conn -> query($sql);

    if ($result->num_rows == 1) {
        while ($row = $result -> fetch_assoc()) {
            if ($user_password == $row['user_password']){
                $_SESSION["user"] = $row['user_id'];
                echo "<script>location.href='index.php'</script>";
                $conn->close();
            } 
            else{
                echo "Login failed";
                $conn->close();
            }
        }
        
    }
    else{
        echo "Query Failed";
        $conn.close();
    }
    
}


?>