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
$luname = $_SESSION['user'];
$sql = "SELECT * FROM `cooks`WHERE `username` = '$luname';";
$result = mysqli_query($conn, $sql);


$sql2 = "SELECT * FROM `booking` WHERE cook_username = '$luname'";
$result2 = mysqli_query($conn, $sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">



    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="profile-user-box card-box bg-custom">
                        <div class="row">

                            <!-- php script to get data from database -->
                            <?php
                            // LOOP TILL END OF DATA
                            while ($rows = $result->fetch_assoc()) {
                            ?>
                                <div class="col-sm-6">
                                    <span class="float-left mr-3">
                                        <!-- php starts here -->
                                        <?php echo "<img src='" . $rows['img'] . "' class='thumb-lg rounded-circle' />" ?>
                                    </span>
                                    <div class="media-body text-white">
                                        <h4 class="mt-1 mb-1 font-18"><?php echo $rows['fname'] . " " . $rows['lname'] ?></h4>
                                        <p class="text-light mb-0 font-14"><?php echo $rows['city'] . "," . $rows['state'] ?> </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <a href="edit_profile.php">
                                            <button type="button" class="btn btn-light waves-effect rounded-pill"><i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile</button>
                                        </a>
                                    </div>
                                    <div class="text-right mt-1">
                                        <a href="logout.php">
                                            <button type="button" class="btn btn-light waves-effect rounded-pill"><i class="mdi mdi-account-settings-variant mr-1"></i>Logout</button>
                                        </a>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-4">

                    <div class="card-box">
                        <h4 class="header-title mt-0">Personal Information</h4>
                        <div class="panel-body">
                            <p class="text-muted font-13"><?php echo $rows['about'] ?></p>
                            <hr>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $rows['fname'] . " " . $rows['lname'] ?></span></p>
                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15"><?php echo $rows['phone'] ?></span></p>
                                <!-- <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"></span> -->
                                </p>
                                <p class="text-muted font-13"><strong>Location :</strong><?php echo $rows['address'] ?></p>
                                <p class="text-muted font-13"><strong>Gender :</strong> <span class="m-l-5"><?php echo $rows['gender'] ?></span>
                                <p class="text-muted font-13"><strong>Age :</strong> <span class="m-l-5"><?php echo $rows['age'] ?></span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-box tilebox-one"><i class="icon-layers float-right text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                                <h2 class="" data-plugin="counterup">1,587</h2>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card-box tilebox-one"><i class="icon-paypal float-right text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Experience</h6>
                                <h2 class=""><span data-plugin="counterup"><?php echo $rows['experience'] ?></span> Years</h2>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card-box tilebox-one"><i class="icon-rocket float-right text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Ratings</h6>
                                <h2 class="" data-plugin="counterup">4.5/5 &#9733;</h2>

                            </div>
                        </div>

                    </div>

                    <div class="card-box">
                        <!-- <h4 class="header-title mt-0 mb-3">Experience</h4> -->
                        <div class="">
                            <div class="">
                                <h5 class="text-custom">Know For</h5>
                                <p class="text-muted font-13 mb-0"><?php echo $rows['specialty'] ?></p>
                            </div>
                            <hr>
                            <div class="">
                                <h5 class="text-custom">Cuisines</h5>
                                <p class="text-muted font-13 mb-0"><?php echo $rows['cuisines'] ?></p>
                            </div>
                        </div>



                    <?php

                                //here code to send cuisines to next page 
                                $_SESSION['scuisines'] = $rows['cuisines'];
                            }
                    ?>
                    </div>

                    <?php
                    $prev_username = "";
                    $html_output = "";

                    // Retrieve user info
                    $sql3 = "SELECT name, email FROM user_info WHERE username = ?";
                    $stmt3 = mysqli_prepare($conn, $sql3);
                    mysqli_stmt_bind_param($stmt3, "s", $prev_username);
                    mysqli_stmt_execute($stmt3);
                    mysqli_stmt_bind_result($stmt3, $name, $email);
                    mysqli_stmt_fetch($stmt3);
                    mysqli_stmt_close($stmt3);

                    if ($result2) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                            if ($row['user_username'] != $prev_username) {
                                if (!empty($prev_username)) {
                                    // Close the previous user's table
                                    $html_output .= "</table>";

                                    // Add the accept and decline buttons to the card footer
                                    $html_output .= "<div class=\"card-footer\"><button class=\"btn btn-success\" onclick=\"acceptOrder('order123')\"><a href=\"../user/Booking_chef/smtp/acceptmail.php?username=" . $email . "\" class=\"btn btn-success\">Accept</a></button> <button class=\"btn btn-danger\" onclick=\"declineOrder('order123')\"><a href=\"../user/Booking_chef/smtp/declinemail.php?username=" . $email . "\" class=\"btn btn-danger\">Decline</a></button></div>";

                                    // Close the card body and card div elements
                                    $html_output .= "</div></div>";
                                }
                                $prev_username = $row['user_username'];

                                // Retrieve user info
                                $sql3 = "SELECT name, email FROM user_info WHERE username = ?";
                                $stmt3 = mysqli_prepare($conn, $sql3);
                                mysqli_stmt_bind_param($stmt3, "s", $prev_username);
                                mysqli_stmt_execute($stmt3);
                                mysqli_stmt_bind_result($stmt3, $name, $email);
                                mysqli_stmt_fetch($stmt3);
                                mysqli_stmt_close($stmt3);

                                // Open a new card with the user name
                                $html_output .= "<div class=\"card mb-4\">";
                                $html_output .= "<div class=\"card-header\"><h3>" . $name . "</h3></div>";
                                $html_output .= "<div class=\"card-body\">";

                                // Open a new table with the user name
                                $html_output .= "<table class=\"table table-bordered\"><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";
                            }

                            // Add a new row to the current table
                            $html_output .= "<tr><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['total'] . "</td></tr>";
                        }

                        // Close the last user's table
                        $html_output .= "</table>";

                        // Add the accept and decline buttons to the card footer
                        $html_output .= "<div class=\"card-footer\"><button class=\"btn btn-success\" onclick=\"acceptOrder('order123')\"><a href=\"../user/Booking_chef/smtp/acceptmail.php?username=" . $email . "\" class=\"btn btn-success\">Accept</a></button> <button class=\"btn btn-danger\" onclick=\"declineOrder('order123')\"><a href=\"../user/Booking_chef/smtp/declinemail.php?username=" . $email . "\" class=\"btn btn-danger\">Decline</a></button></div>";

                        // Close the card body and card div elements
                        $html_output .= "</div></div>";
                    }

                    echo $html_output;
                    ?>



                    <div class="card-box">
                        <div id="reviews" class="review-section">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h4 class="m-0">37 Reviews</h4>
                                <select class="custom-select custom-select-sm border-0 shadow-sm ml-2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="3">Most Relevant</option>
                                    <option>Most Recent</option>
                                </select>
                                <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 188px">
                                    <span class="selection">
                                        <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-qd66-container">
                                            <span class="select2-selection__rendered" id="select2-qd66-container" role="textbox" aria-readonly="true" title="Most Relevant">Most Relevant</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="stars-counters">
                                        <tbody>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">
                                                            5 Stars
                                                        </button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: 97.2973%"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">(36)</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">
                                                            4 Stars
                                                        </button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: 75%"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">(2)</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">
                                                            3 Stars
                                                        </button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: 65%"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">(0)</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">
                                                            2 Stars
                                                        </button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: 25%"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">(0)</td>
                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <span>
                                                        <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">
                                                            1 Stars
                                                        </button>
                                                    </span>
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                        <div class="fit-progressbar-background">
                                                            <span class="progress-fill" style="width: 10%"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="star-num">(0)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="ranking">
                                        <h6 class="text-display-7">Rating Breakdown</h6>
                                        <ul>
                                            <li>
                                                Seller communication level<span>5<span class="review-star rate-10 show-one"></span></span>
                                            </li>
                                            <li>
                                                Recommend to a friend<span>5<span class="review-star rate-10 show-one"></span></span>
                                            </li>
                                            <li>
                                                Service as described<span>4.9<span class="review-star rate-10 show-one"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-list">
                            <ul>
                                <li>
                                    <div class="d-flex">
                                        <div class="left">
                                            <span>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="profile-pict-img img-fluid" alt="" />
                                            </span>
                                        </div>
                                        <div class="right">
                                            <h4>
                                                Askbootstrap
                                                <span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                                        <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                    </svg>
                                                    5.0
                                                </span>
                                            </h4>
                                            <div class="country d-flex align-items-center">
                                                <span>
                                                    <img class="country-flag img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" />
                                                </span>
                                                <div class="country-name font-accent">India</div>
                                            </div>
                                            <div class="review-description">
                                                <p>
                                                    The process was smooth, after providing the required info,
                                                    Pragyesh sent me an outstanding packet of wireframes. Thank
                                                    you a lot!
                                                </p>
                                            </div>
                                            <span class="publish py-3 d-inline-block w-100">Published 4 weeks ago</span>
                                            <div class="helpful-thumbs">
                                                <div class="helpful-thumb text-body-2">
                                                    <span class="fit-icon thumbs-icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5804 7.81165C13.8519 7.45962 14 7 14 6.43858C14 5.40843 13.123 4.45422 12.0114 4.45422H10.0932C10.3316 3.97931 10.6591 3.39024 10.6591 2.54516C10.6591 0.948063 10.022 0 8.39207 0C7.57189 0 7.26753 1.03682 7.11159 1.83827C7.01843 2.31708 6.93041 2.76938 6.65973 3.04005C6.01524 3.68457 5.03125 5.25 4.44013 5.56787C4.38028 5.59308 4.3038 5.61293 4.22051 5.62866C4.06265 5.39995 3.79889 5.25 3.5 5.25H0.875C0.391754 5.25 0 5.64175 0 6.125V13.125C0 13.6082 0.391754 14 0.875 14H3.5C3.98325 14 4.375 13.6082 4.375 13.125V12.886C5.26354 12.886 7.12816 14.0002 9.22728 13.9996C9.37781 13.9997 10.2568 14.0004 10.3487 13.9996C11.9697 14 12.8713 13.0183 12.8188 11.5443C13.2325 11.0596 13.4351 10.3593 13.3172 9.70944C13.6578 9.17552 13.7308 8.42237 13.5804 7.81165ZM0.875 13.125V6.125H3.5V13.125H0.875ZM12.4692 7.5565C12.9062 7.875 12.9062 9.1875 12.3159 9.48875C12.6856 10.1111 12.3529 10.9439 11.9053 11.1839C12.1321 12.6206 11.3869 13.1146 10.3409 13.1246C10.2504 13.1255 9.32247 13.1246 9.22731 13.1246C7.23316 13.1246 5.54296 12.011 4.37503 12.011V6.44287C5.40611 6.44287 6.35212 4.58516 7.27847 3.65879C8.11368 2.82357 7.83527 1.43153 8.3921 0.874727C9.78414 0.874727 9.78414 1.84589 9.78414 2.54518C9.78414 3.69879 8.94893 4.21561 8.94893 5.32924H12.0114C12.6329 5.32924 13.1223 5.88607 13.125 6.44287C13.1277 6.99967 12.9062 7.4375 12.4692 7.5565ZM2.84375 11.8125C2.84375 12.1749 2.54994 12.4688 2.1875 12.4688C1.82506 12.4688 1.53125 12.1749 1.53125 11.8125C1.53125 11.4501 1.82506 11.1562 2.1875 11.1562C2.54994 11.1562 2.84375 11.4501 2.84375 11.8125Z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="thumb-title">Helpful</span>
                                                </div>
                                                <div class="helpful-thumb text-body-2 ml-3">
                                                    <span class="fit-icon thumbs-icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.419563 6.18835C0.148122 6.54038 6.11959e-07 7 5.62878e-07 7.56142C2.81294e-05 8.59157 0.876996 9.54578 1.98863 9.54578L3.90679 9.54578C3.66836 10.0207 3.34091 10.6098 3.34091 11.4548C3.34089 13.0519 3.97802 14 5.60793 14C6.42811 14 6.73247 12.9632 6.88841 12.1617C6.98157 11.6829 7.06959 11.2306 7.34027 10.9599C7.98476 10.3154 8.96875 8.75 9.55987 8.43213C9.61972 8.40692 9.6962 8.38707 9.77949 8.37134C9.93735 8.60005 10.2011 8.75 10.5 8.75L13.125 8.75C13.6082 8.75 14 8.35825 14 7.875L14 0.875C14 0.391754 13.6082 -3.42482e-08 13.125 -7.64949e-08L10.5 -3.0598e-07C10.0168 -3.48226e-07 9.625 0.391754 9.625 0.875L9.625 1.11398C8.73647 1.11398 6.87184 -0.000191358 4.77272 0.00038257C4.62219 0.000300541 3.74322 -0.000438633 3.65127 0.000382472C2.03027 -1.04643e-06 1.12867 0.981667 1.18117 2.45566C0.76754 2.94038 0.564868 3.64065 0.682829 4.29056C0.342234 4.82448 0.269227 5.57763 0.419563 6.18835ZM13.125 0.875L13.125 7.875L10.5 7.875L10.5 0.875L13.125 0.875ZM1.53079 6.4435C1.09375 6.125 1.09375 4.8125 1.6841 4.51125C1.31436 3.88891 1.64713 3.05613 2.09467 2.81605C1.86791 1.37941 2.61313 0.885417 3.65906 0.875355C3.74962 0.874535 4.67753 0.875355 4.77269 0.875355C6.76684 0.875355 8.45704 1.98898 9.62497 1.98898L9.62497 7.55713C8.5939 7.55713 7.64788 9.41484 6.72153 10.3412C5.88632 11.1764 6.16473 12.5685 5.6079 13.1253C4.21586 13.1253 4.21586 12.1541 4.21586 11.4548C4.21586 10.3012 5.05107 9.78439 5.05107 8.67076L1.9886 8.67076C1.36708 8.67076 0.877707 8.11393 0.874973 7.55713C0.872266 7.00033 1.09375 6.5625 1.53079 6.4435ZM11.1563 2.1875C11.1563 1.82506 11.4501 1.53125 11.8125 1.53125C12.1749 1.53125 12.4688 1.82506 12.4688 2.1875C12.4688 2.54994 12.1749 2.84375 11.8125 2.84375C11.4501 2.84375 11.1563 2.54994 11.1563 2.1875Z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="thumb-title">Not Helpful</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </li>

                                <li>
                                    <div class="d-flex">
                                        <div class="left">
                                            <span>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="profile-pict-img img-fluid" alt="" />
                                            </span>
                                        </div>
                                        <div class="right">
                                            <h4>
                                                Askbootstrap
                                                <span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                                        <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                    </svg>
                                                    5.0
                                                </span>
                                            </h4>
                                            <div class="country d-flex align-items-center">
                                                <span>
                                                    <img class="country-flag img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" />
                                                </span>
                                                <div class="country-name font-accent">India</div>
                                            </div>
                                            <div class="review-description">
                                                <p>
                                                    The process was smooth, after providing the required info,
                                                    Pragyesh sent me an outstanding packet of wireframes. Thank
                                                    you a lot!
                                                </p>
                                            </div>
                                            <span class="publish py-3 d-inline-block w-100">Published 4 weeks ago</span>
                                            <div class="helpful-thumbs">
                                                <div class="helpful-thumb text-body-2">
                                                    <span class="fit-icon thumbs-icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5804 7.81165C13.8519 7.45962 14 7 14 6.43858C14 5.40843 13.123 4.45422 12.0114 4.45422H10.0932C10.3316 3.97931 10.6591 3.39024 10.6591 2.54516C10.6591 0.948063 10.022 0 8.39207 0C7.57189 0 7.26753 1.03682 7.11159 1.83827C7.01843 2.31708 6.93041 2.76938 6.65973 3.04005C6.01524 3.68457 5.03125 5.25 4.44013 5.56787C4.38028 5.59308 4.3038 5.61293 4.22051 5.62866C4.06265 5.39995 3.79889 5.25 3.5 5.25H0.875C0.391754 5.25 0 5.64175 0 6.125V13.125C0 13.6082 0.391754 14 0.875 14H3.5C3.98325 14 4.375 13.6082 4.375 13.125V12.886C5.26354 12.886 7.12816 14.0002 9.22728 13.9996C9.37781 13.9997 10.2568 14.0004 10.3487 13.9996C11.9697 14 12.8713 13.0183 12.8188 11.5443C13.2325 11.0596 13.4351 10.3593 13.3172 9.70944C13.6578 9.17552 13.7308 8.42237 13.5804 7.81165ZM0.875 13.125V6.125H3.5V13.125H0.875ZM12.4692 7.5565C12.9062 7.875 12.9062 9.1875 12.3159 9.48875C12.6856 10.1111 12.3529 10.9439 11.9053 11.1839C12.1321 12.6206 11.3869 13.1146 10.3409 13.1246C10.2504 13.1255 9.32247 13.1246 9.22731 13.1246C7.23316 13.1246 5.54296 12.011 4.37503 12.011V6.44287C5.40611 6.44287 6.35212 4.58516 7.27847 3.65879C8.11368 2.82357 7.83527 1.43153 8.3921 0.874727C9.78414 0.874727 9.78414 1.84589 9.78414 2.54518C9.78414 3.69879 8.94893 4.21561 8.94893 5.32924H12.0114C12.6329 5.32924 13.1223 5.88607 13.125 6.44287C13.1277 6.99967 12.9062 7.4375 12.4692 7.5565ZM2.84375 11.8125C2.84375 12.1749 2.54994 12.4688 2.1875 12.4688C1.82506 12.4688 1.53125 12.1749 1.53125 11.8125C1.53125 11.4501 1.82506 11.1562 2.1875 11.1562C2.54994 11.1562 2.84375 11.4501 2.84375 11.8125Z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="thumb-title">Helpful</span>
                                                </div>
                                                <div class="helpful-thumb text-body-2 ml-3">
                                                    <span class="fit-icon thumbs-icon">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.419563 6.18835C0.148122 6.54038 6.11959e-07 7 5.62878e-07 7.56142C2.81294e-05 8.59157 0.876996 9.54578 1.98863 9.54578L3.90679 9.54578C3.66836 10.0207 3.34091 10.6098 3.34091 11.4548C3.34089 13.0519 3.97802 14 5.60793 14C6.42811 14 6.73247 12.9632 6.88841 12.1617C6.98157 11.6829 7.06959 11.2306 7.34027 10.9599C7.98476 10.3154 8.96875 8.75 9.55987 8.43213C9.61972 8.40692 9.6962 8.38707 9.77949 8.37134C9.93735 8.60005 10.2011 8.75 10.5 8.75L13.125 8.75C13.6082 8.75 14 8.35825 14 7.875L14 0.875C14 0.391754 13.6082 -3.42482e-08 13.125 -7.64949e-08L10.5 -3.0598e-07C10.0168 -3.48226e-07 9.625 0.391754 9.625 0.875L9.625 1.11398C8.73647 1.11398 6.87184 -0.000191358 4.77272 0.00038257C4.62219 0.000300541 3.74322 -0.000438633 3.65127 0.000382472C2.03027 -1.04643e-06 1.12867 0.981667 1.18117 2.45566C0.76754 2.94038 0.564868 3.64065 0.682829 4.29056C0.342234 4.82448 0.269227 5.57763 0.419563 6.18835ZM13.125 0.875L13.125 7.875L10.5 7.875L10.5 0.875L13.125 0.875ZM1.53079 6.4435C1.09375 6.125 1.09375 4.8125 1.6841 4.51125C1.31436 3.88891 1.64713 3.05613 2.09467 2.81605C1.86791 1.37941 2.61313 0.885417 3.65906 0.875355C3.74962 0.874535 4.67753 0.875355 4.77269 0.875355C6.76684 0.875355 8.45704 1.98898 9.62497 1.98898L9.62497 7.55713C8.5939 7.55713 7.64788 9.41484 6.72153 10.3412C5.88632 11.1764 6.16473 12.5685 5.6079 13.1253C4.21586 13.1253 4.21586 12.1541 4.21586 11.4548C4.21586 10.3012 5.05107 9.78439 5.05107 8.67076L1.9886 8.67076C1.36708 8.67076 0.877707 8.11393 0.874973 7.55713C0.872266 7.00033 1.09375 6.5625 1.53079 6.4435ZM11.1563 2.1875C11.1563 1.82506 11.4501 1.53125 11.8125 1.53125C12.1749 1.53125 12.4688 1.82506 12.4688 2.1875C12.4688 2.54994 12.1749 2.84375 11.8125 2.84375C11.4501 2.84375 11.1563 2.54994 11.1563 2.1875Z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="thumb-title">Not Helpful</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>
    <style type="text/css">
        body {
            background-color: #f3f6f8;
            margin-top: 20px;
        }

        .thumb-lg {
            height: 88px;
            width: 88px;
        }

        .profile-user-box {
            position: relative;
            border-radius: 5px
        }

        .bg-custom {
            background-color: #F37335 !important;
        }

        .profile-user-box {
            position: relative;
            border-radius: 5px;
        }

        .card-box {
            padding: 20px;
            border-radius: 3px;
            margin-bottom: 30px;
            background-color: #fff;
        }

        .inbox-widget .inbox-item img {
            width: 40px;
        }

        .inbox-widget .inbox-item {
            border-bottom: 1px solid #f3f6f8;
            overflow: hidden;
            padding: 10px 0;
            position: relative
        }

        .inbox-widget .inbox-item .inbox-item-img {
            display: block;
            float: left;
            margin-right: 15px;
            width: 40px
        }

        .inbox-widget .inbox-item img {
            width: 40px
        }

        .inbox-widget .inbox-item .inbox-item-author {
            color: #313a46;
            display: block;
            margin: 0
        }

        .inbox-widget .inbox-item .inbox-item-text {
            color: #98a6ad;
            display: block;
            font-size: 14px;
            margin: 0
        }

        .inbox-widget .inbox-item .inbox-item-date {
            color: #98a6ad;
            font-size: 11px;
            position: absolute;
            right: 7px;
            top: 12px
        }

        .comment-list .comment-box-item {
            position: relative
        }

        .comment-list .comment-box-item .commnet-item-date {
            color: #98a6ad;
            font-size: 11px;
            position: absolute;
            right: 7px;
            top: 2px
        }

        .comment-list .comment-box-item .commnet-item-msg {
            color: #313a46;
            display: block;
            margin: 10px 0;
            font-weight: 400;
            font-size: 15px;
            line-height: 24px
        }

        .comment-list .comment-box-item .commnet-item-user {
            color: #98a6ad;
            display: block;
            font-size: 14px;
            margin: 0
        }

        .comment-list a+a {
            margin-top: 15px;
            display: block
        }

        .ribbon-box .ribbon-primary {
            background: #2d7bf4;
        }

        .ribbon-box .ribbon {
            position: relative;
            float: left;
            clear: both;
            padding: 5px 12px 5px 12px;
            margin-left: -30px;
            margin-bottom: 15px;
            font-family: Rubik, sans-serif;
            -webkit-box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);
            -o-box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);
            box-shadow: 2px 5px 10px rgba(49, 58, 70, .15);
            color: #fff;
            font-size: 13px;
        }

        .text-custom {
            color: #F37335 !important;
        }

        .badge-custom {
            background: #02c0ce;
            color: #fff;
        }

        .badge {
            font-family: Rubik, sans-serif;
            -webkit-box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
            padding: .35em .5em;
            font-weight: 500;
        }

        .text-muted {
            color: #98a6ad !important;
        }

        .font-13 {
            font-size: 13px !important;
        }

        h4,
        p {
            text-transform: capitalize;
        }

        /* review section css */

        .review-list ul li .left span {
            width: 32px;
            height: 32px;
            display: inline-block;
        }

        .review-list ul li .left {
            flex: none;
            max-width: none;
            margin: 0 10px 0 0;
        }

        .review-list ul li .left span img {
            border-radius: 50%;
        }

        .review-list ul li .right h4 {
            font-size: 16px;
            margin: 0;
            display: flex;
        }

        .review-list ul li .right h4 .gig-rating {
            display: flex;
            align-items: center;
            margin-left: 10px;
            color: #ffbf00;
        }

        .review-list ul li .right h4 .gig-rating svg {
            margin: 0 4px 0 0px;
        }

        .country .country-flag {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
            margin: 0 7px 0 0px;
            border: 1px solid #fff;
            border-radius: 50px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .country .country-name {
            color: #95979d;
            font-size: 13px;
            font-weight: 600;
        }

        .review-list ul li {
            border-bottom: 1px solid #dadbdd;
            padding: 0 0 30px;
            margin: 0 0 30px;
        }

        .review-list ul li .right {
            flex: auto;
        }

        .review-list ul li .review-description {
            margin: 20px 0 0;
        }

        .review-list ul li .review-description p {
            font-size: 14px;
            margin: 0;
        }

        .review-list ul li .publish {
            font-size: 13px;
            color: #95979d;
        }

        .review-section h4 {
            font-size: 20px;
            color: #222325;
            font-weight: 700;
        }

        .review-section .stars-counters tr .stars-filter.fit-button {
            padding: 6px;
            border: none;
            color: #4a73e8;
            text-align: left;
        }

        .review-section .fit-progressbar-bar .fit-progressbar-background {
            position: relative;
            height: 8px;
            background: #efeff0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            border-radius: 999px;
        }

        .review-section .stars-counters tr .star-progress-bar .progress-fill {
            background-color: #ffb33e;
        }

        .review-section .fit-progressbar-bar .progress-fill {
            background: #2cdd9b;
            background-color: rgb(29, 191, 115);
            height: 100%;
            position: absolute;
            left: 0;
            z-index: 1;
            border-radius: 999px;
        }

        .review-section .fit-progressbar-bar {
            display: flex;
            align-items: center;
        }

        .review-section .stars-counters td {
            white-space: nowrap;
        }

        .review-section .stars-counters tr .progress-bar-container {
            width: 100%;
            padding: 0 10px 0 6px;
            margin: auto;
        }

        .ranking h6 {
            font-weight: 600;
            padding-bottom: 16px;
        }

        .ranking li {
            display: flex;
            justify-content: space-between;
            color: #95979d;
            padding-bottom: 8px;
        }

        .review-section .stars-counters td.star-num {
            color: #4a73e8;
        }

        .ranking li>span {
            color: #62646a;
            white-space: nowrap;
            margin-left: 12px;
        }

        .review-section {
            border-bottom: 1px solid #dadbdd;
            padding-bottom: 24px;
            margin-bottom: 34px;
            padding-top: 64px;
        }

        .review-section select,
        .review-section .select2-container {
            width: 188px !important;
            border-radius: 3px;
        }

        ul,
        ul li {
            list-style: none;
            margin: 0px;
        }

        .helpful-thumbs,
        .helpful-thumb {
            display: flex;
            align-items: center;
            font-weight: 700;
        }


        /*Rating */




        @keyframes loading-1 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }
        }

        @keyframes loading-2 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }
        }

        @keyframes loading-3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(90deg);
                transform: rotate(90deg);
            }
        }

        @keyframes loading-4 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }
        }

        @media only screen and (max-width: 990px) {
            .progress {
                margin-bottom: 20px;
            }
        }
    </style>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript">
        function acceptOrder(orderId) {
            // Send a request to server to accept the order

            // Remove the card from the DOM
            var card = document.getElementById(orderId);
            card.parentNode.removeChild(card);
        }

        function declineOrder(orderId) {
            // Send a request to server to decline the order

            // Remove the card from the DOM
            var card = document.getElementById(orderId);
            card.parentNode.removeChild(card);
        }
    </script>
</body>

</html>