<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Service | eGarage</title>
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <!-- Header -->
    <section class="fuel-header">
       
    <?php
        include "includes/header.php";
    ?>

        <h1>Running Out of Fuel! <br> Don't Worry</h1>
        <form id="search-form" action="garage_list.php" method="GET">
            <div class="input-group city-search">
                <input type="text" class="input-city " id='city' name='city' placeholder="Search for Nearby Fuel Station here"/>
                    <button type="submit" >
                        <i class="fa fa-search btn"></i>
                    </button>
            </div>
        </form>
    </section>

        <!-- Fuel service -->

    <section class="fuel-service">
        <div class="row">
            <div class="fuel-col">
                <h1>For Diesel </h1>
                <p>Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 </p>
                 <a href="garage_list.php?city=Mumbai" class="hero-btn " id='city' name='city'>CLICK HERE</a>
            </div>
            <div class="fuel-col">
                <h1>For Petrol</h1>
                <p>Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 Don't worry you are on the Right Place. 
                 We will help you solve every problems that happemed with your vehicle.
                 </p>
                 <a href="garage_list.php?city=Delhi" class="hero-btn" id='city' name='city'>CLICK HERE</a>
             </div>
             <div class="fuel-col">
                 <h1>For Charging</h1>
                 <p>Don't worry you are on the Right Place. 
                  We will help you solve every problems that happemed with your vehicle.
                  Don't worry you are on the Right Place. 
                  We will help you solve every problems that happemed with your vehicle.
                  Don't worry you are on the Right Place. 
                  We will help you solve every problems that happemed with your vehicle.
                  </p>
                  <a href="garage_list.php?city=Mumbai" class="hero-btn" id='city' name='city'>CLICK HERE</a>
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