<?php
require("../includes/database_connect.php");

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$password = sha1($password);

$sql = "SELECT * from users where email='$email'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo "Something Went Wrong";
    exit;
}

$row_count = mysqli_num_rows($result);
if($row_count !=0) {
    echo "This email id is already registered with us!";
    exit;
}

$sql = "INSERT INTO users ( full_name, email, password) VALUES ( '$full_name', '$email', '$password')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
} 

echo "Your account has been created successfully!";
?>

Click <a href="../index.php">here</a> to continue.
<?php
mysqli_close($conn);
?>