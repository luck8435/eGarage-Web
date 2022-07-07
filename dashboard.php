<?php
session_start();
require "includes/database_connect.php";

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die();
}
$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE id = $user_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result_1);
if (!$user) {
    echo "Something went wrong!";
    return;
}

$sql_2 = "SELECT * 
            FROM mechanic_booking mb
            INNER JOIN mechanics m ON mb.mechanic_id = m.id
            WHERE mb.user_id = $user_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$mechanic_booking = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

foreach ($mechanic_booking as $mechanic) {
    $mechanic_id= $mechanic['id'];
}

$sql_3 = "SELECT * 
            FROM garages g
            INNER JOIN mechanics m ON g.id = m.garage_id
            WHERE m.id = $mechanic_id";
$result_3 = mysqli_query($conn, $sql_3);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$garage = mysqli_fetch_assoc($result_3);
if (!$garage) {
    echo "Something went wrong!";
    return;
}

?>



<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | eGarage</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard1.css" />
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
                   Dashboard
                </li>
            </ol>
        </nav>
    </div>

    </section>

    <div class="my-profile ">
        <h1>My Profile</h1>
        <div class="profile-page ">
            <div class="col-md-3 profile-img-container">
                <i class="fas fa-user profile-img"></i>
            </div>
            <div class="col-md-9">
                <div class="profile">
                    <div class="name"><?= $user['full_name'] ?></div>
                    <div class="email"><?= $user['email'] ?></div>
                </div>
                <div class="edit">
                    <div class="edit-profile">Edit Profile</div>
                </div>
            </div>           
        </div>
    </div>

    <?php
    if (count($mechanic_booking) > 0) {
    ?>
    <div class="garage-summary content-box">
                    <div class="detail-container">
                        <h3>Previosly Booked Mechanics</h3>
                    <?php
                    foreach ($mechanic_booking as $mechanic) {
                    ?>
                    
                        
                        <div class="mechanic-details ">
                        <div class="garage-name"><h4><?=$mechanic['full_name'];?> from <?=$garage['name'];?></h4></div>
                            <h4>Name - <?=$mechanic['full_name'];?></h3>
                            <h6>Age- <?=$mechanic['age'];?></h6>
                            <h6>contact- <?=$mechanic['phone'];?></h6>
                            <h6>id- <?=$mechanic['id']; ?></h6>
                            <div class=" rating-container" title="<?= $mechanic['mechanic_rating']; ?>">
                                    <?php
                                    $you_rate = $mechanic['mechanic_rating'];
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($you_rate >= $i + 0.8) {
                                    ?>
                                            <i class="fas fa-star"></i>
                                        <?php
                                        } elseif ($you_rate >= $i + 0.3) {
                                        ?>
                                            <i class="fas fa-star-half-alt"></i>
                                        <?php
                                        } else {
                                        ?>
                                            <i class="far fa-star"></i>
                                    <?php
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        ?>               
        </div>

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