<?php

session_start();

// Connect to the MySQL database using PHPMyAdmin
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ChefOnDemand";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$uname = substr($name, 0, 2) . substr($email, 0, 2)."u";
$repeat_password = $_POST['repeat_password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$_SESSION['susrname'] = $uname;
if($password != $repeat_password) {
    echo '<script>alert("Error Please Check Password and Repeat Password")</script>';
    header("Refresh:1 url=signup_user.html");
}
else{
//check if email and username are unique
$check_query = "SELECT * FROM user WHERE email = '$email' OR username = '$name'";
$result = mysqli_query($conn, $check_query);

if(mysqli_num_rows($result) > 0) {
    echo "This email or username already exists. Please try again.";
    header("Refresh:1; url=Login.html");
    
} else {
    //insert data into table
    $sql = "INSERT INTO user (name,username, email, password) VALUES ('$name','$uname', '$email', '$hashed_password')";
    if(mysqli_query($conn, $sql)) {
        echo "Signup successful. Redirecting to login page...";
        header("Refresh:1; url=../user/user_details.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}
?>

