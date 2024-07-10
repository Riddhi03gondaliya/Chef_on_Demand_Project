<?php
session_start();

$suname = $_SESSION['susrname'];

$target_dir = "uploads/";
$ex = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
$target_file =$target_dir.$suname.".".$ex;  
// $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//form details

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$experience = $_POST['experience'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$state = $_POST['state'];
$speciality =$_POST['speciality'];
$about = $_POST['about'];
$cuisines = $_POST['cname'];
$carr = implode(',',$cuisines);
$imagep = "/ChefOnDemand/chef/".$target_file;

// foreach($_POST['cname'] as $value){
//   echo "value : ".$value.'<br/>';
// }

// echo $carr;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ".$target_file. " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//connection and sending all information to databases


$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ChefOnDemand";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Prepare and execute SQL query
$sql = "INSERT INTO cooks(fname, lname, experience, gender, age, phone, address, city, zip_code, state, specialty, about, img, username, cuisines) VALUES ('$fname', '$lname', '$experience', '$gender', '$age', '$phone', '$address', '$city', '$zip_code', '$state', '$speciality', '$about', '$target_file','$suname','$carr')";
if(mysqli_query($conn, $sql)) {
    echo "Signup successful. Redirecting to Profile page...";
    session_destroy();
    header("Refresh:3; url=/ChefOnDemand/Login.html");
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if(mysqli_affected_rows($conn) > 0) {
  echo "Photo uploaded successfully.";
} else {
  echo "Error: Photo path was not saved in database.";
  // Delete image from server
  unlink($target_file);
}
