<?php
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ChefOnDemand";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_POST["username"];
$password1 = $_POST["password"];

$sql = "SELECT * FROM user WHERE username ='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // echo $user['password'];
    if (password_verify($password1, $user['password'])) {
        $_SESSION["user"] = $user['username'];
        header("Location:user/user_cuisines.php");
    } else {
        echo "Invalid email or password.";
        header("Refresh:2; url=Login.html");
    }
} else {
    echo "Invalid email or password. ";
    header("Refresh:2; url=Login.html");
}

$sql = "SELECT * FROM chef_reg WHERE username ='$uname'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password1, $user['password'])) {
        $_SESSION["user"] = $user['username'];
        header("Location:chef/chef_profile.php");
    } else {
        echo "Invalid email or password.";
        header(" url=Login.html");
    }
} else {
    echo "Invalid email or password. ";
    header("Refresh:2; url=Login.html");
}

$sql = "SELECT * FROM cadmin WHERE username ='$uname'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password1, $user['password'])) {
        $_SESSION["user"] = $user;
        header("Location: /ChefOnDemand/cadmin/index.html");
    } else {
        echo "Invalid email or password.";
        header("Refresh:2; url=Login.html");
    }
} else {
    echo "Invalid email or password. ";
    header("Refresh:2; url=Login.html");
}

$conn->close();
