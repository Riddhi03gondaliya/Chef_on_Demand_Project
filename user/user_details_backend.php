<?php
session_start();

$suname = $_SESSION['susrname'];


//form details

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$state = $_POST['state'];
$email = $_POST['email'];
$country = $_POST['country'];

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ChefOnDemand";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Prepare and execute SQL query
$sql = "INSERT INTO `user_info`(`name`, `lastname`, `phone`, `address`, `email`, `pin_code`, `city`, `country`, `state`,`username`) VALUES ('$fname','$lname','$phone','$address','$email','$zip_code','$city','$country','$state','$suname')";
if (mysqli_query($conn, $sql)) {
    echo "Signup successful. Redirecting to Profile page...";
    session_destroy();
    header("Refresh:3; url=../Login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

