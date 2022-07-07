<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$garageid = $_GET["garage_id"];

$sql_1 = "SELECT *, g.id AS garage_id, g.name AS garage_name, c.name AS city_name 
            FROM garages g
            INNER JOIN cities c ON g.city_id = c.id 
            WHERE g.id = $garageid";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$garage = mysqli_fetch_assoc($result_1);
if (!$garage) {
    echo "Something went wrong!";
    return;
}


$sql_2 = "SELECT * FROM testimonials WHERE garage_id = $garageid";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$testimonials = mysqli_fetch_all($result_2, MYSQLI_ASSOC);


$sql_3 = "SELECT f.* 
            FROM facilities f
            INNER JOIN garages_facilities gf ON f.id = gf.facility_id
            WHERE gf.garage_id = $garageid";
$result_3 = mysqli_query($conn, $sql_3);
if (!$result_3) {
    echo "Something went wrong!";
    return;
}
$facilities = mysqli_fetch_all($result_3, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking | eGarage</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/booking1.css">
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
                <li class="breadcrumb-item">
                    <a href="garage_list.php?city=<?=$garage['city_name']; ?>"><?=$garage['city_name']; ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                 Book: <?= $garage['garage_name']; ?>
            </li>
            </ol>
        </nav>
    </div>
    <section >
    <form id="booking-form" class="booking-page"  role="form" method="post" action="api/booking_submit.php">
        <div class="register col-md-8">
            <div class="heading">
                <h2>Add Your Info</h2>
                <p>Tell us about yourself</p>
            </div>
            <div class="form ">
                <label for="name">Name* </label>
                <div class="input-text">
                <input type="text" name="full_name" placeholder="Enter your name" required>
                </div>

                <label for="email">Email*</label>
                <div class="input-text">
                <input type="email" name="email" placeholder="Enter your name" required>
                </div>
                
                <label for="phone">Phone number*</label>
                <div class="input-text">
                <input type="text" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" required>
                </div>
                
                <label for="address">Location</label>
                <div class="input-text">
                <input type="text" name="address" placeholder="Enter your location" >
                </div>
                <div class="submit">
                <button type="submit" class="submit-btn">Submit</button>
                </div>  
            </div>
            <span class="sign">* Required info</span>
        </div>
        <div class="booking-container col-md-4">
            <div class="mechanic ">
                <h4>Book mechanic</h4>
                <p>Check for mechanic availability</p>
                <hr/>
                <div class="garage-details">
                    <div class="gname">
                    <?=$garage['garage_name'];?>
                    </div>
                    <div class="gaddress">
                    <?=$garage['address'];?>
                    </div>
                </div>
                <div class="submit">
                <!-- <button type="submit" class="submit-btn">Check here</button> -->
                <a href="mechanic_order.php?garage_id=<?=$garageid;?>" class="submit-btn"> Check here </a>
                </div>
            </div>
        </div>
    </form>
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