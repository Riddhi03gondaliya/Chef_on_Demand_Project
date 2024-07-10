<?php

// echo $_POST['button']
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ChefOnDemand";
$cuisines = $_POST['button'];

$_SESSION['cuisinesid'] = $_POST['cuisines_id'];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `cooks`WHERE cuisines LIKE '%$cuisines%'";
$result = mysqli_query($conn, $sql);
$carr = array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container ">
            <a class="navbar-brand" href="#"><span class="text-warning">Chef</span>Takeout</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link" href="user_cuisines.php"><i class="fa fa-home" aria-hidden="true" style="font-size: 35px"></i></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><img src="https://www.tutorialrepublic.com/examples/images/avatar/3.jpg" alt="Avatar" class="thumb rounded-circle" />
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                            <div class="divider dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 ">
                <form action="user_chef_profile.php" method="post">
                    <?php while ($rows = mysqli_fetch_assoc($result)) {
                        $temp = $rows['cuisines'];
                        $cuisines = explode(',', $temp);

                    ?>
                        <div class="row p-2 bg-white border rounded mt-2">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive product-image rounded-circle" src="../chef/<?php echo $rows['img'] ?>" /> </div>
                            <div class="col-md-6 mt-1">
                                <input type="hidden" name="cook_username" value="<?php echo $rows['username']?>">
                                <h5><?php echo $rows['fname'] . " " . $rows['lname'] ?></h5>
                                <h6><i class="fa fa-map-marker"></i><?php echo $rows['city'] . "," . $rows['state'] ?></h6>
                                <h7>Experince:<?php echo $rows['experience'] ?></h7>

                                <div class="d-flex flex-row">
                                    <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                                </div>

                                <div class="mt-1 mb-1 spec-1"><?php
                                                                foreach ($cuisines as $cuisine) {
                                                                    echo "<span>" . $cuisine . "</span><span class='dot'></span>";
                                                                } ?>
                                </div>

                                <p class="text-justify text-truncate  para mb-0"><?php echo $rows['about'] ?><br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <!-- <h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span> -->
                                </div>
                                <!-- <h6 class="text-success">Free shipping</h6> -->
                                <div class="d-flex flex-column mt-4"><button class="btn btn-outline-warning btn-sm mt-2" type="submit" name="chef" value="<?php echo $rows['id'] ?>">Select</button></div>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <style>
        .mt-5 {
            margin-top: 6rem !important;
        }

        body {
            background: #eee
        }

        .ratings i {
            font-size: 16px;
            color: #FFC007;
        }

        .strike-text {
            color: red;
            text-decoration: line-through
        }

        .product-image {
            width: 100%;
        }

        .dot {
            height: 7px;
            width: 7px;
            margin-left: 6px;
            margin-right: 6px;
            margin-top: 3px;
            background-color: black;
            border-radius: 50%;
            display: inline-block
        }

        .spec-1 {
            color: #938787;
            font-size: 15px
        }

        h5 {
            font-weight: 400
        }

        .para {
            font-size: 16px
        }


        .btn-sm {
            background-color: #fff;
        }

        h5 {
            text-transform: capitalize;
        }

        img {
            /* width: 100%; */
            height: auto;
            aspect-ratio: 16/14;
        }
    </style>
    <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>