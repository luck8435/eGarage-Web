<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Service | eGarage</title>
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <!-- Header -->
    <section class="bike-header">

    <?php
        include "includes/header.php";
    ?>

        <h1>Our Service For <br> Bikes</h1>
        <form id="search-form" action="garage_list.php" method="GET">
            <div class="input-group city-search">
                <input type="text" class="input-city " id='city' name='city' placeholder="Search for Garages here"/>
                    <button type="submit" >
                        <i class="fa fa-search btn"></i>
                    </button>
            </div>
        </form>
    </section>

        <!-- Car service -->

    <section class="bike-service">
        <div class="row">
            <div class="bike-col">
                <h1>We Provide Fastest Bike Service</h1>
                <p>Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 </p>
                 <a href="garage_list.php?city=Delhi" class="hero-btn red-btn">EXPLORE NOW</a>
            </div>
            <div class="bike-col">
                 <img src="img/bg2.jpeg" >
            </div>
        </div>
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