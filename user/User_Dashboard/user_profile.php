<?php

session_start();
$servername = "localhost:8889";
$username = "tarun";
$password = "9904";
$dbname = "ChefOnDemand";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$luname = $_SESSION['user'];
$sql = "SELECT user.name, user.email, user_info.lastname, user_info.phone, user_info.address, user_info.pin_code, user_info.city, user_info.country, user_info.state,user_info.img
FROM user 
JOIN user_info ON user.username = user_info.username 
WHERE user.username = '$luname'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Chef On Demand - Dashboard</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon -->
    <link rel="stylesheet" href="../../../cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/vendors/stylize.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

    <!-- tap on tap end-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo" src="assets/images/logo/1.png" alt="logo">
                            <img class="img-fluid white-logo" src="assets/images/logo/1-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.html">
                            <img src="assets/images/logo/1.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>


                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">

                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="assets/images/users/4.jpg" alt="">
                                <div class="user-name-hide media-body">
                                    <span>Samradh</span>
                                    <p class="mb-0 font-roboto">Admin<i class="middle ri-arrow-down-s-line"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li class="nav-item mx-0 mx-lg-1">
                                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../logout.php">Logout</a>
                                </li>
                                <li class="nav-item mx-0 mx-lg-1">
                                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../user_cuisines.php">Home</a>
                                </li>
                            </ul>

                        </li>

                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="user_profile.php" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="assets/images/logo/full-white.png" alt="logo">
                        </a>

                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo main-white" src="assets/images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark" src="assets/images/logo/logo-white.png" alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">


                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="user_profile.php">
                                        <i class="ri-user-3-fill"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="order-list.html">
                                        <i class="ri-archive-line"></i>
                                        <span> Orders</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>


        </div>
    </div>

    <div class="container-fluid">



        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" enctype="multipart/form-data">

            <div class="row">



                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result->fetch_assoc()) {

                ?>


            </div>
            <div class="col-md-6 offset-sm-3">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <h4 class="text-right">Profile Settings</h4>
                    <div id="success-alert" class="alert success-alert" style="display:none"></div>
                    <div class="row mt-3">
                        <div class="col-md-4"><label class="labels">Name</label><input type="text" class="form-control" placeholder="First name" value="<?php echo $rows['name'] ?>" name="name"></div>
                        <div class="col-md-4"><label class="labels">Last Name</label><input type="text" class="form-control" value="<?php echo $rows['lastname'] ?>" placeholder="Last Name" name="lname"></div>
                        <div class="col-md-4"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $rows['phone'] ?>" name="phone"></div>
                    </div>
                    <div class="row mt-3">

                        <div class="col-md-6"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="Address" value="<?php echo $rows['address'] ?>" name="address"></div>

                        <div class="col-md-6"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="Pincode" value="<?php echo $rows['pin_code'] ?>" name="pincode"></div>
                        <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="City" value="<?php echo $rows['city'] ?>" name="city"></div>

                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="Email" value="<?php echo $rows['email'] ?>" name="email"></div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="Country" value="<?php echo $rows['country'] ?>" name="country"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="<?php echo $rows['state'] ?>" placeholder="State" name="state"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                            Profile</button></div>
                </div>
            </div>
        <?PHP } ?>
    </div>


    </form>
    </div>



    <script>
        function previewImage(event) {
            var img = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                event.target.previousElementSibling.src = e.target.result;
            }
            reader.readAsDataURL(img);
        }

        $(".close").click(function() {
            $(this)
                .parent(".alert")
                .fadeOut();
        });
    </script>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Data table js -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/custom-data-table.js"></script>

    <!-- all checkbox select js -->
    <script src="assets/js/checkbox-all-check.js"></script>

    <!-- sidebar effect -->
    <script src="assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>
<style>
    .alert {
        width: 50%;
        margin: 20px auto;
        padding: 30px;
        position: relative;
        border-radius: 5px;
        box-shadow: 0 0 15px 5px #ccc;
    }

    .close {
        position: absolute;
        width: 30px;
        height: 30px;
        opacity: 0.5;
        border-width: 1px;
        border-style: solid;
        border-radius: 50%;
        right: 15px;
        top: 25px;
        text-align: center;
        font-size: 1.6em;
        cursor: pointer;
    }

    .success-alert {
        background-color: #a8f0c6;
        border-left: 5px solid #178344;
    }

    .success-alert .close {
        border-color: #178344;
        color: #178344;
    }

    .danger-alert {
        background-color: #f7a7a3;
        border-left: 5px solid #8f130c;
    }

    .danger-alert .close {
        border-color: #8f130c;
        color: #8f130c;
    }
</style>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $f_name = $_POST['name'];
    $l_name = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $oimg = $_POST['old_pp'];

    if (isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["name"])) {
        $target_dir = "img/";
        $ex = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
        $target_file = $target_dir . $luname . "." . $ex;
        $file = $target_dir . $luname;
        if (file_exists($file)) {
            unlink($target_file);
        } else {
            (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));
            echo "The file " . $target_file . " has been uploaded.";
        }
    } else {
        $target_file = $oimg;
    }

    $sql = "UPDATE user, user_info
        SET user.name = '$f_name', user.email = '$email', user_info.lastname = '$l_name', user_info.phone = '$phone', user_info.address = '$address', user_info.pin_code = '$pincode', user_info.city = '$city', user_info.country = '$country', user_info.state = '$state' , user_info.img = '$target_file'
        WHERE user.username = '$luname' AND user.username = user_info.username";
    if ($conn->query($sql) === TRUE) {
?>
        <script>
            // Cache the success alert message element and set class name to "success-alert"
            var successAlert = document.getElementById("success-alert");
            successAlert.classList.add('success-alert');

            // Set the success message
            successAlert.innerHTML = "Profile updated successfully!";

            // Display the success alert message
            successAlert.style.display = "block";

            // Hide the success alert message after 3 seconds
            setTimeout(function() {
                successAlert.style.display = "none";
            }, 3000);

            // Redirect to profile page after 2 seconds
            setTimeout(function() {
                window.location.href = '/ChefOnDemand/user/User_Dashboard/user_profile.php';
            }, 2000);
        </script>

    <?php
    } else {

    ?>
        <script>
            // Cache the success alert message element and set class name to "danger-alert"
            var successAlert = document.getElementById("success-alert");
            successAlert.classList.add('danger-alert');

            // Set the error message
            successAlert.innerHTML = "Error: Profile update failed.";

            // Display the success alert message
            successAlert.style.display = "block";

            // Hide the success alert message after 3 seconds
            setTimeout(function() {
                successAlert.style.display = "none";
            }, 3000);

            // Redirect to profile page after 2 seconds
            setTimeout(function() {
                window.location.href = '/ChefOnDemand/user/User_Dashboard/user_profile.php';
            }, 2000);
        </script>

<?php
        session_unset();
        session_destroy();
    }
}

?>