<?php

session_start();

if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];

    $conn = new mysqli('localhost', 'root', '', 'plantanomy');
    if ($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{

        echo '
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plantanomy</title>
        <link rel="stylesheet" href="styles.css">
        
        </head>
        
        <body>
        
        <header>
                
            <img src="images/logo.svg" alt="logo" id="logoImage">
            <nav class="navbar">
                <span class="open-slide">
                     <a href="#" onclick="openSlideMenu()">
                        <svg width="30" height="30">
                            <path d="M0,5 30,5" stroke="#33bb55" stroke-width="5" />
                             <path d="M0,14 30,14" stroke="#33bb55" stroke-width="5" />
                             <path d="M0,23 30,23" stroke="#33bb55" stroke-width="5" />
                         </svg>
                     </a>
                </span>
                <ul class="navbar-nav">
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="#">Wishlist</a></li>';
                        if (isset($_SESSION["user"])){
                            echo "<li><a href='logout.php'>Logout</a></li>";
                        }else{
                            echo "<li><a href='login.php'>Your Account</a></li>";
                        }
                    echo '
                    <li><a href="index.php">Home</a></li>
                    
                    
                </ul>
            </nav>
        </header>
        
        
        
        
        <div id="side-menu" class="side-nav">
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
            <a href="index.php">Home</a>';
            if (isset($_SESSION["user"])){
                echo "<a href='logout.php'>Logout</a>";
            }else{
                echo "<a href='login.php'>Your Account</a>";
            }
            echo '
            <a href="#">Wishlist</a>
            <a href="aboutUs.php">About Us</a>
        </div>
        
        <script>
            function openSlideMenu(){
                document.getElementById("side-menu").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }
        
            function closeSlideMenu(){
                document.getElementById("side-menu").style.width = "0px";
                document.getElementById("main").style.marginLeft = "0px";
            }
        </script>
        
        <div id="main">
        
        <section id= "showcase">
            <div class="container">
                <h1> Plant Encyclopedia</h1>
            </div>
        </section>
        
        <section id= "searchYourPlant">
            <div class="container">
                <h1>Seach Your Plant</h1>
                <form action="search.php" method="post">
                    <input type="search" name="searchPlantName" id="searchPlantName" placeholder="Enter Plant Name">
                    <button type="submit" class="button1">Search</button>
                </form>
        </div>
        </section>
        
        
        ';
        
        $sql = "select distinct plant_name from wishlist where user_id = '$user'";
        $result = $conn -> query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
                $plant_name = $row['plant_name'];
                $counter = 1;
                $sql1 = "select * from plants where plant_name = '$plant_name'";
                $result1 = $conn -> query($sql1);

                if ($result1->num_rows == 1){
                    while ($row1 = $result1 -> fetch_assoc()) {

                        echo '
                
                        <div class="modal-container-search" id="wishFlower-modal-container'.$counter.'">
                            <div class="modal-search">
                                <div class="modal-search-img">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row1['plant_image'] ).'" alt="Spring flower">
                                </div>
                                <h1 id="wishFlower-plant-name'.$counter.'">'.$row1['plant_name'].'<h1>
                                <table class="popupTable">
                                    <tr>                   
                                        <th>Type<th>
                                        <td>'.$row1['plant_type'].'<td>
                                        <th>Height<th>
                                        <td>'.$row1['plant_height'].'<td>
                                        <th>Sunlight<th>
                                        <td>'.$row1['plant_sunlight'].'<td>
                                    </tr>
                                    <tr>
                                        <th>Features<th>
                                        <td>'.$row1['plant_features'].'<td>
                                        <th>Seasons<th>
                                        <td>'.$row1['plant_seasons'].'<td>
                                        <th>Regions<th>
                                        <td>'.$row1['plant_region'].'<td>
                                    </tr>
                                </table>
                                <p>'.$row1['plant_info'].'</p>
                                <form action="removeFav.php" method="post">
                                    <input type="hidden" id="plantNameValue" name="plantNameValue" value="'.$row1['plant_name'].'" />
                                    <button type="submit" class="Flower-cta" id="wishFlower-remove'.$counter.'"> Remove Fav </button>
                                </form>
                            </div>
                        </div>
                    
                    ';

                    }
                }
                else{
                    echo "error in plants query";
                }
                $counter++;
            }       
            
            
        }
        else{
            echo "<h1 style='text-align:center; padding: 50px 50px;'>No items in wishlist<h1>";
            
        }

        echo '

            <footer class="mainFooter">

            <div class="footer-content">
                <div class="footer-section-about">
                    <img src="images/logo.svg" alt="logo" id="logoImage">
                    <h2>Plantanomy</h2>
                    <p>Plantanomy is a perfect heavan for all those plant and gardening lovers out there. You can all the information about any plant you want to search about. Also by signing up you can get acces to your personalized wishlist to keep all your favourites together.</p>
                    <p>123 - 456 - 789</p>
                    <p>info@Plantanomy.com</p>
                </div>
            </div>
        
            <div class="footerBottom">
                &copy; <a href="#" class="footer-cta" title="Plantanomy">Plantanomy.com</a> | Designed with HTLM5 & CSS
            </div>
           
        </footer>
        </body>
        </html>
            
            ';
    }
    $conn->close();

}else{
   echo "<script>location.href='login.php'</script>";
}


?>
