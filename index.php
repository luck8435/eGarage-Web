<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to eGarage</title>
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <!-- Header -->
    <section class="header">
        <?php
        include "includes/header.php";
        ?>

        <div class="text-box">
            <h1>Stucked Somewhere...</h1>
            <p>Don't worry you are on the Right Place. 
             We will help you solve every problems that <br> happened with your vehicle.</p>
             <h2>Enter City Name  </h2>
            <!-- <a class= "hero-btn" href="#">Visit Us to know More</a> -->
            <form id="search-form" action="garage_list.php" method="GET">
                <div class="input-group city-search">
                    <input type="text" class="input-city " id='city' name='city' placeholder="Search for Garages here"/>
                        <button type="submit" >
                            <i class="fa fa-search btn"></i>
                        </button>
                </div>
            </form>
        </div>
    </section>

    <!--  cities We available -->
    <section class="available">
        <h1>We are Available in the following Cities</h1>
        <p>For now we are resticted to these cities. We are working hard to exapand our service all around the Globe.<br>
             <span>We're Sorry for the inconvenience caused.</span></p>
             <div class="row">
                 <div class="city-col">
                    <a href="garage_list.php?city=Delhi">
                    <img src="img/delhi2.jpg">
                    <div class="layer">
                        <h3>DELHI</h3>
                    </div>
                    </a>
                 </div>
                
                 <div class="city-col">
                    <a href="garage_list.php?city=Mumbai">
                    <img src="img/mumbai.jpg">
                    <div class="layer">
                        <h3>MUMBAI</h3>
                    </div>
                    </a>
                 </div>
                
                 <div class="city-col">
                    <a href="garage_list.php?city=Chennai">
                    <img src="img/chenna.jpeg">
                    <div class="layer">
                        <h3>CHENNAI</h3>
                    </div>
                    </a>
                 </div>
             </div>
    </section>


     <!-- services -->
     <section class="service">
        <h1>Service we provide</h1>
        <p>We help people finding  garages nearby
            so that their vehicle can be repaired.
        </p>
        <div class="row">
            <div class="service-col">
                <h3>Find Garage Nearby</h3>
                <p> Our objective is to make electronic services easier for user's. When you are driving
                     long distances or your vehicle is damage by some reason, they can visit our website and can call 
                     nearby electricians or petrol pump to get immediate repairing or fuel. 
                </p>
            </div>
            <div class="service-col">
                <h3>Help Tow Your vehicle </h3>
                <p> Our objective is to make electronic services easier for user's. When you are driving
                     long distances or your vehicle is damage by some reason, they can visit our website and can call 
                     nearby electricians or petrol pump to get immediate repairing or fuel. 
                </p>
            </div>
            <div class="service-col">
                <h3>Get Fuel For You</h3>
                <p> Our objective is to make electronic services easier for users. When you are driving
                     long distances or your vehicle is damage by some reason, they can visit our website and can call 
                     nearby electricians or petrol pump to get immediate repairing or fuel. 
                </p>
            </div>
        </div>
    </section>
<!-- Testimonials -->

    <section class="testimonial">
        <h1>What Our Customer Says</h1>
        <p>Don't worry you are on the Right Place.</p>>
        <div class="row">
            <div class="testimonial-col">
                <img src="img/user1.jpg">
                <p> Our objective is to make electronic services easier for users. When you are driving
                long distances or your vehicle is damage by some reason, they can visit our website and can call 
                nearby electricians or petrol pump to get immediate repairing or fuel. 
                </p> 
                <!-- <div class="sub"> -->
                    <h3>Mamta Banerji</h3>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                <!-- </div> -->
            </div>
            <div class="testimonial-col">
                <img src="img/user2.jpg">
                <p> Our objective is to make electronic services easier for users. When you are driving
                    long distances or your vehicle is damage by some reason, they can visit our website and can call 
                    nearby electricians or petrol pump to get immediate repairing or fuel. 
                    </p> 
                <!-- <div class="sub"> -->
                    <h3>Narendra Modi</h3>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                <!-- </div> -->
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="cta">
            <h1>Use our service from Anywhere <br>Around The World</h1>
            <a href="" class="hero-btn">CONTACT US</a>
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