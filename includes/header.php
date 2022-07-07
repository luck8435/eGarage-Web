<!-- Header -->
        <nav>
           
            <a class="logo" href="index.php">e-Garage</a>
            <div class="nav-links" id="navLinks">
                <i class="fas fa-times" onclick="hideMenu()" ></i>
                <ul>
                <?php
                 // <!-- Check if user is logged in or not -->
                 if(!isset($_SESSION['user_id'])) {
                ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="car_service.php">CAR SERVICE</a></li>
                    <li><a href="bike_service.php">BIKE SERVICE</a></li>
                    <li><a href="fuel_service.php">LOW FUEL</a></li>
                    <li><a href="login_form.php">LOGIN/SIGNUP</a></li>
                    <?php
                 } else {
                 ?>
                     <li>
                       <p> Hi,  <?php echo $_SESSION["full_name"] ?></p>
                    </li>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="car_service.php">CAR SERVICE</a></li>
                    <li><a href="bike_service.php">BIKE SERVICE</a></li>
                    <li><a href="fuel_service.php">LOW FUEL</a></li>
                    <li ><a href="dashboard.php"> DASHBOARD</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                     <?php       
                 }
                 ?>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showMenu()"></i>
        </nav>
