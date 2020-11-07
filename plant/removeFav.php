<?php

session_start();

$plantName = $_POST['plantNameValue'];
if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];

    $conn = new mysqli('localhost', 'root', '', 'plantanomy');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
        
        // sql to delete a record
        $sql = "DELETE FROM wishlist WHERE user_id = '$user' AND plant_name = '$plantName'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                location.href='wishlist.php';
                alert('Deleted successfully');
            </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }
}else{
        echo "<script>location.href='login.php'</script>";
}

?>
