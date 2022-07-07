<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : NULL;
$city_name = $_GET["city"];

$sql_1 = "SELECT * FROM cities WHERE name = '$city_name'";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$city = mysqli_fetch_assoc($result_1);
if (!$city) {
    echo "Sorry! We do not have any Garage listed in this city.";
    return;
}
$city_id = $city['id'];

$sql_2 = "SELECT * FROM garages WHERE city_id = $city_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$garages = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garages in <?php echo "$city_name" ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <!-- Header -->
    <section class="garage-header">


    <?php
        include "includes/header.php";
    ?>


    </section>
    <div class="breadcrumb-container" >
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                   <?php echo "$city_name"; ?>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Garage list -->
    <section>
        <div class="page-container">

        <?php
        foreach ($garages as $garage) {
            $garage_images = glob("img/garages/" . $garage['id'] . "/*");
        ?>
            <div class="garage-card">
                <div class="image-container col-md-4">
                    <img src="<?= $garage_images[0] ?>">
                </div>
                <div class="content-box col-md-8">
                <?php
                        $total_rating = ($garage['rating_mechanic'] + $garage['rating_service'] + $garage['rating_safety']) / 3;
                        $total_rating = round($total_rating, 1);
                        ?>
                    <div class="star-container" title="<?= $total_rating ?>">
                        <?php
                        $rating = $total_rating;
                        for($i=0; $i<5; $i++){
                            if($rating >= $i+ 0.8){
                        ?>
                                <i class="fas fa-star"></i>
                            <?php
                            } elseif ($rating>= $i+ 0.3) {
                            ?>
                                 <i class="fas fa-star-half-alt"></i>
                                 <?php
                            }else {
                                ?>
                                <i class="far fa-star"></i>
                                <?php
                            }
                        }?>     
                        
                    </div>
                    <div class="detail-container">
                        <div class="garage-name"><h2><?= $garage['name'] ?></h2></div>
                        <div class="garage-address"><p><?= $garage['address']; ?></div>
                    </div>
                    <div class="grow">
                        <div class="garage-type ">
                            <?php
                            if($garage['garage_type'] == "two+four"){
                                ?>
                            <img src="img/car+bike.png" >
                            <?php
                            } elseif ($garage['garage_type']=="four-wheeler"){
                                ?>
                                <img src="img/newcar-image.jpg">
                                <?php
                            }elseif ($garage['garage_type']=="two-wheeler"){
                                ?>
                                <img src="img/newbike-image.jpg">
                                <?php
                            }else {
                                ?>
                                <img src="img/fuel.jpg">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="button-container">
                            <a href="garage_detail.php?garage_id=<?= $garage['id'] ?>" class=" gbtn">View</a>
                        </div>
                    </div>
                     </div>
                </div>
        <?php
        }
        if(count($garages) == 0){
        ?>
        <div class="no-garage">
            <p>Garage Not Listed</p>
        </div>
        <?php
        }
        ?>


    </section>
        <!-- Footer -->
    <section class="footer">
        <h4>About Us</h4>
        <p> Our objective is to make electronic services easier for users. </p>
        <div class="icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin"></i>
            <i class="fab fa-twitter"></i>
        </div>
        <p>Made with  <i class="fas fa-heart"></i> by group</p>
        <ul>
            <li>Lokendra</li>
            <li>Gaurav</li>
            <li>Dhirendra</li>
            <li>Priyash</li>
        </ul> 
    </section>

    <!-- Javascript for the toggle menu -->

    <script>
        var navLinks = document.getElementById("navLinks");
        
        function showMenu(){
            navLinks.style.display= "block";
            navLinks.style.right = "0";
            
        }

        function hideMenu(){   
            navLinks.style.right = "-200px";
            navLinks.style.display= "none";
        }
    </script>
</body>
</html>