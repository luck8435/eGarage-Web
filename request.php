<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$mechanic_id = $_GET["mechanic_id"];

$sql_1 = "SELECT * from mechanics where id=$mechanic_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$mechanic = mysqli_fetch_assoc($result_1);
if (!$mechanic) {
    echo "Something went wrong!";
    return;
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Mechanic | eGarage</title>
    <link rel="stylesheet" href="css/home.css" />
</head>

<body class="service">
    <h1><?=$mechanic['full_name'];?> is assigned to you as a mechanic.</h1>
    <h2  class="row">Thank you for using eGarage.</h2>
    <!-- <a href="" class="btn">PAY HERE</a> -->
    <div ><a href="" class="btn">PAY HERE</a></div>
    <p class="row">Note:  Pay after issue is resolved.....</p>

    <!-- <h2>Name - <?=$mechanic['full_name'];?></h2>    
    <h3>Age- <?=$mechanic['age'];?>years</h3>
    <h3>contact- <?=$mechanic['phone'];?></h3> -->

</body>
</html>