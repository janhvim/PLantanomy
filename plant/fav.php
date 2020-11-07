<?php

session_start();

$plantName = $_POST['plantNameValue'];
if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];

    $conn = new mysqli('localhost', 'root', '', 'plantanomy');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
        
        $stmt = $conn->prepare("INSERT INTO `wishlist`(`user_id`, `plant_name`) VALUES (?, ?)");
        $stmt->bind_param("is",$user, $plantName);
        $stmt->execute();
        
        echo "
            <script>
                location.href='index.php';
                alert('Added successfully');
            </script>";
    }
    }else{
        echo "<script>location.href='login.php'</script>";
    }

?>
