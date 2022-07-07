<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$garage_id = $_GET["garage_id"];

$sql_1 = "SELECT *, g.id AS garage_id, g.name AS garage_name, c.name AS city_name 
            FROM garages g
            INNER JOIN cities c ON g.city_id = c.id 
            WHERE g.id = $garage_id";
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


$sql_2 = "SELECT * FROM testimonials WHERE garage_id = $garage_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$testimonials = mysqli_fetch_all($result_2, MYSQLI_ASSOC);


$sql_3 = "SELECT f.* 
            FROM facilities f
            INNER JOIN garages_facilities gf ON f.id = gf.facility_id
            WHERE gf.garage_id = $garage_id";
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
    <title><?=$garage['garage_name'];?> | eGarage</title>
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
                <li class="breadcrumb-item">
                    <a href="garage_list.php?city=<?=$garage['city_name']; ?>"><?=$garage['city_name']; ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <?= $garage['garage_name']; ?>
            </li>
            </ol>
        </nav>
    </div>

    <!-- Garage detail-->
    <section>
        
                <div class="garage-image">
            <?php
            $garage_images = glob("img/garages/". $garage['garage_id']. "/*");
            ?>
                    <img src="<?= $garage_images['0'];?>">
                </div>
                <div class="garage-summary content-box">
                <?php
                $total_rating = ($garage['rating_mechanic'] + $garage['rating_service'] + $garage['rating_safety']) / 3;
                $total_rating = round($total_rating, 1);
            ?>
                    <div class="star-container" title="<?=$total_rating ?>">
                    <?php
                    $rating = $total_rating;
                        for ($i = 0; $i < 5; $i++) {
                            if ($rating >= $i + 0.8) {
                    ?>
                            <i class="fas fa-star"></i>
                    <?php
                            } elseif ($rating >= $i + 0.3) {
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
                    <div class="detail-container">
                        <div class="garage-name"><h1><?= $garage['garage_name']; ?></h1></div>
                        <div class="garage-address"><?= $garage['address']; ?></div>
                    </div>
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
                            <a href="booking.php?garage_id=<?= $garage_id;?>" class=" gbtn">Book Now</a>
                        </div>
                </div>  

                <div class="garage-facility">
                    <div class="page">
                        <h1>Facilities Available</h1>
                        <div class="row justify-content-between">
                            <div class="col-md-auto">
                                <h5>Services</h5>
                                <?php
                                foreach($facilities as $facility){
                                    if ($facility['type'] == "Services"){
                                ?>
                                    <div class="garage-container">
                                        <i class="icon fas <?= $facility['icon'] ?>"></i>
                                        <span><?= $facility['name']; ?></span>
                                    </div>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
            
                            <div class="col-md-auto">
                                <h5>Routine Checkup</h5>
                                <?php
                                foreach($facilities as $facility){
                                    if ($facility['type'] == "Rotine Checkup"){
                                ?>
                                    <div class="garage-container">
                                        <i class="icon fas <?= $facility['icon'] ?>"></i>
                                        <span><?= $facility['name']; ?></span>
                                    </div>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
            
                            <div class="col-md-auto">
                                <h5> Tyre service</h5>
                                <?php
                                foreach($facilities as $facility){
                                    if ($facility['type'] == "Tyre service"){
                                ?>
                                    <div class="garage-container">
                                        <i class="icon fas <?= $facility['icon'] ?>"></i>
                                        <span><?= $facility['name']; ?></span>
                                    </div>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="garage-about page">
                    <h1>About the Garage</h1>
                    <p><?=$garage['about'];?></p>
                </div>

                <div class="garage-rating">
                    <div class="page">
                        <h1>Garage Rating</h1>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-6">
                                <div class="rating-criteria row">
                                    <div class="col-6">
                                        <i class="icon fas fa-wrench"></i>
                                        <span class="rating-criteria-text">Mechanic</span>
                                    </div>
                                    <div class="rating-criteria-star-container col-6" title="<?= $garage['rating_mechanic']; ?>">
                                    <?php
                                     $rating = $garage['rating_mechanic'];
                                    for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                    ?>
                                    <i class="fas fa-star"></i>
                                    <?php
                                     } elseif ($rating >= $i + 0.3) {
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
            
                                <div class="rating-criteria row">
                                    <div class="col-6">
                                        <i class="icon fas fa-cogs"></i>
                                        <span class="rating-criteria-text">Services</span>
                                    </div>
                                    <div class="rating-criteria-star-container col-6" title="<?= $garage['rating_service']; ?>">
                                    <?php
                                     $rating = $garage['rating_service'];
                                    for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                    ?>
                                    <i class="fas fa-star"></i>
                                    <?php
                                     } elseif ($rating >= $i + 0.3) {
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
            
                                <div class="rating-criteria row">
                                    <div class="col-6">
                                        <i class="icon fa fa-lock"></i>
                                        <span class="rating-criteria-text">Safety</span>
                                    </div>
                                    <div class="rating-criteria-star-container col-6" title="<?= $garage['rating_safety']; ?>">
                                    <?php
                                     $rating = $garage['rating_safety'];
                                    for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                    ?>
                                    <i class="fas fa-star"></i>
                                    <?php
                                     } elseif ($rating >= $i + 0.3) {
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
                            </div>
            
                            <div class="col-md-4">
                                <div class="rating-circle">
                                    <div class="total-rating"><?= $total_rating?></div>
                                    <div class="rating-circle-star-container">
                                    <?php
                                     $rating = $total_rating;
                                    for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                    ?>
                                    <i class="fas fa-star"></i>
                                    <?php
                                     } elseif ($rating >= $i + 0.3) {
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
                            </div>
                        </div>
                    </div>
                </div>

                <section class="testimonial page">
                    <h1>What Our Customer Says</h1>
                    <div class="row">

                    <?php
                    foreach ($testimonials as $testimonial) {
                    ?>
                        <div class="testimonial-col">
                            <img src="img/user2.jpg">
                            <p> <?= $testimonial['content'];?></p> 
                            <!-- <div class="sub"> -->
                                <h3><?= $testimonial['user_name'] ?></h3>
                                <?php
                                    $rating = $total_rating;
                                    for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                    ?>
                                    <i class="fas fa-star"></i>
                                    <?php
                                     } elseif ($rating >= $i + 0.3) {
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
                            <!-- </div> -->
                        </div>
                        <?php
                    }?>
                    </div>
                </section>
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