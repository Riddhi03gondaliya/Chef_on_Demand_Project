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
$old_cuisines = $_SESSION['scuisines'];
$sql2 = "SELECT name FROM `cuisines`";
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

            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-sm-12">

                        <div class="profile-user-box card-box bg-custom">
                            <div class="row">
                                <div id="success-alert" class="alert success-alert" style="display:none">
                                </div>
                                <!-- php script to get data from database -->
                                <?php
                                // LOOP TILL END OF DATA
                                while ($rows = $result->fetch_assoc()) {
                                    $id = $rows['id'];
                                ?>
                                    <div class="col-sm-6">
                                        <span class="float-left mr-3">
                                            <!-- php starts here -->
                                            <?php echo "<img src='" . $rows['img'] . "' class='thumb-lg rounded-circle' id='previewImage'/>" ?>
                                            <input type="text" hidden="hidden" name="old_pp" value="<?= $rows['img'] ?>"> </span>

                                        <div class="btn btn-light waves-effect rounded-pill ">
                                            <label class="form-label m-1 " for="imageInput">Choose file</label>
                                            <input type="file" class="form-control d-none " id="imageInput" name="fileToUpload" />
                                        </div>
                                        <!-- <div class=" media-body text-white"> -->
                                        <!-- <input type="text" name="fname" value=""> -->
                                        <!-- <p class="text-light mb-0 font-14"></p> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-right ">
                                            <button type="submit" class="btn btn-light waves-effect rounded-pill"><i class="mdi mdi-account-settings-variant mr-1"></i>Save</button>
                                        </div>
                                        <div class="text-right mt-2 ">
                                            <a href="/ChefOnDemand/chef/chef_profile.php">
                                                <button type="button" class="btn btn-light waves-effect rounded-pill"><i class="mdi mdi-account-settings-variant mr-1"></i>Home</button>
                                            </a>
                                        </div>
                                    </div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col">

                        <div class="card-box">
                            <!-- <h4 class="header-title mt-0 mb-3">Experience</h4> -->
                            <!-- <div class="card-header">
                            Personal Information
                        </div> -->
                            <div class="card-body">
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="fname" value="<?php echo $rows['fname'] ?>" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lname" value="<?php echo $rows['lname'] ?>" required />
                                    </div>


                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Experience</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your Experience" name="experience" value="<?php echo $rows['experience'] ?>" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Gender</label>
                                        <select name="gender" id="gender" class="form-select" name="gender" required>
                                            <option value="<?php echo $rows['gender'] ?>" selected><?php echo $rows['gender'] ?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Age</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your Age" name="age" required value="<?php echo $rows['age'] ?>" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phone" required value="<?php echo $rows['phone'] ?>" />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Address</label>
                                        <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your Address" name="address" required value="<?php echo $rows['address'] ?>" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">City</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your City" name="city" required value="<?php echo $rows['city'] ?>" />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Zip Code</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your Zip Code" name="zip_code" required value="<?php echo $rows['zip_code'] ?>" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">State</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your State" name="state" required value="<?php echo $rows['state'] ?>" />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputSpeciality">Your Speciality</label>
                                        <textarea class="form-control" id="inputSpeciality" placeholder="Know For Punjabi,Chinese,etc....." name="speciality" required><?php echo $rows['specialty'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputAbout">About Yourself</label>
                                        <textarea class="form-control" id="inputAbout" placeholder="Your Achivements,Experince,etc......" name="about" required><?php echo $rows['about'] ?></textarea>
                                    </div>
                                    <div class="col ">
                                        <label class="small mb-1" for="inputCuisines">Cuisines</label>
                                        <div class="card scroll">
                                            <div class="card-body ">
                                                <?php
                                                while ($rows2 = $result2->fetch_assoc()) {
                                                    echo "<label class='check '> ";
                                                    echo "<input type='checkbox' name ='cname[]'" . "value = " . $rows2['name'] . " >";
                                                    echo "<span>" . $rows2['name'] . "</span> ";
                                                    echo "</label> ";
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    </div>

                </div>

            </form>

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

        .row {
            justify-content: space-evenly;

        }

        .form-control,
        .dataTable-input,
        .form-select {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            background-color: rgba(255, 255, 255, 0);
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
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


        label.check {
            cursor: pointer;
            padding: 2px;
        }

        label.check input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.check span {
            padding: 7px 14px;
            border: 2px solid #69707a;
            display: inline-block;
            color: #69707a;
            border-radius: 3px;
            text-transform: uppercase;
        }

        label.check input:checked+span {
            border-color: #69707a;
            background-color: black;
            color: #fff;
        }

        .scroll {
            max-height: 100px;
            overflow-y: auto;
        }

        /* review section css */



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

        .alert {
            width: 50%;
            margin: 20px auto;
            padding: 30px;
            position: absolute;
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
            position: absolute;
        }

        /* .success-alert {
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: .25rem;
            color: #155724;
        } */


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
    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script type="text/javascript">
        // When the user clicks on the save button, call this function
        // function onSaveButtonClick($updateSuccess) {
        //     if ($updateSuccess) {
        //         // Cache the success alert message element
        //         var successAlert = document.getElementById("success-alert");

        //         // Display the success alert message
        //         successAlert.style.display = "block";

        //         // Hide the success alert message after 3 seconds
        //         setTimeout(function() {
        //             successAlert.style.display = "none";
        //         }, 3000);
        //     } else {
        //         // Display error message to the user
        //         alert("Error: Data was not updated.");
        //     }
        // }


        const imageInput = document.getElementById("imageInput");
        const previewImage = document.getElementById("previewImage");

        imageInput.addEventListener("change", () => {
            const file = imageInput.files[0];
            const reader = new FileReader();

            reader.addEventListener("load", () => {
                previewImage.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>

<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get inputs from form and store them as variables
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $exp = $_POST['experience'];
    $gen = $_POST['gender'];
    $age = $_POST['age'];
    $number = $_POST['phone'];
    $add = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zip_code'];
    $state = $_POST['state'];
    $speciality = $_POST['speciality'];
    $about = $_POST['about'];
    $cuisines = $_POST['cname'];
    $new_cuisines = implode(',', $cuisines);
    $oimg = $_POST['old_pp'];
    // assume $id has been set

    if (isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["name"])) {
        $target_dir = "uploads/";
        $ex = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
        $target_file = $target_dir . $luname . "." . $ex;
        $file = $target_dir . $luname;
        if (file_exists($file)) {
            unlink($target_file);
        } else {
            (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));
            // echo "The file " . $target_file . " has been uploaded.";
        }
    } else {
        $target_file = $oimg;
    }

    if (isset($_POST['cname'])) {
        $string = $old_cuisines . "," . $new_cuisines;
        $updated_cuisines = implode(',', array_unique(explode(',', $string)));
        $new_cuisines = $updated_cuisines;
        // echo $new_cuisines;
    } else {
        $new_cuisines = $old_cuisines;
        // echo $new_cuisines;
    }

    // Prepare SQL statement
    $update = "UPDATE `cooks` SET fname = '$f_name', lname = '$l_name', experience = '$exp', gender = '$gen', age = '$age', phone = '$number', address = '$add', city = '$city', zip_code = '$zipcode', state = '$state', specialty = '$speciality', about = '$about', cuisines = '$new_cuisines', img = '$target_file' WHERE id = $id";

    // Execute SQL statement

    if (mysqli_query($conn, $update)) {
        // Display success message
?>
        <script>
            // Cache the success alert message element and set class name to "success-alert"
            var successAlert = document.getElementById("success-alert");
            successAlert.classList.add('success-alert');

            // Display the success alert message
            successAlert.style.display = "block";
            successAlert.innerHTML = "Profile updated successfully!";

            // Hide the success alert message after 3 seconds
            setTimeout(function() {
                successAlert.style.display = "none";
            }, 3000);

            // Redirect to profile page after 2 seconds
            setTimeout(function() {
                window.location.href = '/ChefOnDemand/chef/edit_profile.php';
            }, 2000);
        </script>
    <?php
    } else {
    ?>
        <script>
            // Cache the success alert message element and set class name to "danger-alert"
            var successAlert = document.getElementById("success-alert");
            successAlert.classList.add('danger-alert');

            // Display the success alert message
            successAlert.style.display = "block";
            successAlert.innerHTML = "Error: Profile update failed.";


            // Hide the success alert message after 3 seconds
            setTimeout(function() {
                successAlert.style.display = "none";
            }, 3000);

            // Redirect to profile page after 2 seconds
            setTimeout(function() {
                window.location.href = '/ChefOnDemand/chef/edit_profile.php';
            }, 2000);
        </script>
<?php
    }
}
?>