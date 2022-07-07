<?php
require("../includes/database_connect.php");

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];




$sql = "INSERT INTO customers ( full_name, email, phone, address) VALUES ( '$full_name', '$email', '$phone', '$address')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
} 
// header("location: ../mechanic_order.php");
mysqli_close($conn);