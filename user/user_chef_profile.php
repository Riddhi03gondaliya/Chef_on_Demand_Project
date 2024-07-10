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

$cook_username = $_POST['cook_username'];
$_SESSION['cook_username'] = $cook_username;
$sql = "SELECT * FROM `cooks`WHERE username = '$cook_username'";
$sql2 = "SELECT email FROM `chef_reg` WHERE username ='$cook_username'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$email = "";
while ($rows2 = mysqli_fetch_assoc($result2)) {
    $rows2['email'];
    $email = $rows2['email'];
}

$_SESSION['cook_email'] = $email;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cook Profile</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/62d8f78fb4.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-warning">Chef</span>Takeout</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="user_cuisines.php">Home</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../user/Booking_Chef/book_form.php">Book Now</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="../chef/<?php echo $rows['img'] ?>" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0"><?php echo $rows['fname'] . " " . $rows['lname'] ?></h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">
                    <strong>Moblie No:</strong><?php echo $rows['phone'] ?>
                </p>
                <p class="masthead-subheading font-weight-light mb-0">
                    <strong>Location:</strong><?php echo $rows['address'] ?>
                </p>
                <p class="masthead-subheading font-weight-light mb-0">
                    <strong>Gender:</strong><?php echo $rows['gender'] ?>
                </p>
                <p class="masthead-subheading font-weight-light mb-0">
                    <strong>Age:</strong><?php echo $rows['age'] ?>
                </p>
            </div>
        </header>
        <section class="wow fadeIn animated page-section" style="visibility: visible; animation-name: fadeIn">
            <div class="container">
                <div class="row">
                    <!-- counter -->
                    <div class="col-md-4 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="
              visibility: visible;
              animation-duration: 300ms;
              animation-name: fadeInUp;
            ">
                        <i class="fa-solid fa-bowl-food medium-icon"></i>
                        <span id="anim-number-pizza" class="counter-number"></span>
                        <span class="timer counter alt-font appear" data-to="100" data-speed="700">100</span>
                        <p class="counter-title">Order Servered</p>
                    </div>
                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-4 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="
              visibility: visible;
              animation-duration: 600ms;
              animation-name: fadeInUp;
            ">
                        <i class="fa-solid fa-award medium-icon"></i>
                        <span class="timer counter alt-font appear" data-to="7" data-speed="700"><?php echo $rows['experience'] ?></span>
                        <span class="counter-title"> Years Experince</span>
                    </div>
                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-4 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="
              visibility: visible;
              animation-duration: 900ms;
              animation-name: fadeInUp;
            ">
                        <i class="fa-regular fa-star medium-icon"></i>
                        <span class="timer counter alt-font appear" data-to="4.2" data-speed="700">4.2</span>
                        <span class="counter-title">Ratings</span>
                    </div>
                    <!-- end counter -->
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">
                    About
                </h2>

                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col">
                        <p class="lead">
                            <?php echo $rows['about'] ?>
                        </p>
                    </div>
                    <!-- <div class="col-lg-4 "><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div> -->
                </div>
                <!-- About Section Button-->
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
                    Specaility
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col">
                        <p class="lead">
                            <?php echo $rows['specialty'] ?>
                        </p>
                    </div>
                    <!-- <div class="col-lg-4 "><p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p></div> -->
                </div>
            </div>
        </section>

    <?php } ?>

    <section class="page-section">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
            Reviews

        </h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="progress" style="background-color:rgba(171, 153, 100, 0.207);">
                        <div class="progress-bar" style="width:50%; background:#ffcc00;">
                            <h3 class="progress-title">1 Star</h3>
                            <div class="progress-value">50%</div>
                        </div>
                    </div>

                    <div class="progress" style="background-color:rgba(171, 153, 100, 0.207)">
                        <div class="progress-bar" style="width:80%; background:#ffcc00;">
                            <h3 class="progress-title">2 Star</h3>
                            <div class="progress-value">80%</div>
                        </div>
                    </div>
                    <div class="progress" style="background-color:rgba(171, 153, 100, 0.207)">
                        <div class="progress-bar" style="width:60%; background:#ffcc00;">
                            <h3 class="progress-title">3 Star</h3>
                            <div class="progress-value">60%</div>
                        </div>
                    </div>

                    <div class="progress" style="background-color:rgba(171, 153, 100, 0.207)">
                        <div class="progress-bar" style="width:80%; background:#ffcc00;">
                            <h3 class="progress-title">4 Star</h3>
                            <div class="progress-value">80%</div>
                        </div>
                    </div>

                    <div class="progress" style="background-color:rgba(171, 153, 100, 0.207)">
                        <div class="progress-bar" style="width:80%; background:#ffcc00;">
                            <h3 class="progress-title">5 Star</h3>
                            <div class="progress-value">80%</div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description" />
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                    </div>
                    <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                        scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                        vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                        nisi vulputate fringilla. Donec lacinia congue felis in faucibus
                        ras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis.
                    </p>
                    <ul class="list-inline d-sm-flex my-0">
                        <li class="list-inline-item g-mr-20">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                178
                            </a>
                        </li>
                        <li class="list-inline-item g-mr-20">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                34
                            </a>
                        </li>
                        <li class="list-inline-item ml-auto">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                Reply
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description" />
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                    </div>
                    <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                        scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                        vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                        nisi vulputate fringilla. Donec lacinia congue felis in faucibus
                        ras purus odio, vestibulum in vulputate at, tempus viverra
                        turpis.
                    </p>
                    <ul class="list-inline d-sm-flex my-0">
                        <li class="list-inline-item g-mr-20">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                178
                            </a>
                        </li>
                        <li class="list-inline-item g-mr-20">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                34
                            </a>
                        </li>
                        <li class="list-inline-item ml-auto">
                            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                Reply
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </section>

    <!-- Review Section -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".counter").each(function() {
                $(this)
                    .prop("Counter", 0)
                    .animate({
                        Counter: $(this).text(),
                    }, {
                        duration: 2000,
                        easing: "swing",
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        },
                    });
            });
        });
        //script.js
        window.addEventListener('DOMContentLoaded', event => {

            // Navbar shrink function
            var navbarShrink = function() {
                const navbarCollapsible = document.body.querySelector('#mainNav');
                if (!navbarCollapsible) {
                    return;
                }
                if (window.scrollY === 0) {
                    navbarCollapsible.classList.remove('navbar-shrink')
                } else {
                    navbarCollapsible.classList.add('navbar-shrink')
                }

            };

            // Shrink the navbar 
            navbarShrink();

            // Shrink the navbar when page is scrolled
            document.addEventListener('scroll', navbarShrink);

            // Activate Bootstrap scrollspy on the main nav element
            const mainNav = document.body.querySelector('#mainNav');
            if (mainNav) {
                new bootstrap.ScrollSpy(document.body, {
                    target: '#mainNav',
                    rootMargin: '0px 0px -40%',
                });
            };

            // Collapse responsive navbar when toggler is visible
            const navbarToggler = document.body.querySelector('.navbar-toggler');
            const responsiveNavItems = [].slice.call(
                document.querySelectorAll('#navbarResponsive .nav-link')
            );
            responsiveNavItems.map(function(responsiveNavItem) {
                responsiveNavItem.addEventListener('click', () => {
                    if (window.getComputedStyle(navbarToggler).display !== 'none') {
                        navbarToggler.click();
                    }
                });
            });

        });
    </script>
    <style>
        /* counter css */
        .counter-section i {
            display: block;
            margin: 0 0 10px;
        }

        .counter-section span.counter {
            font-size: 40px;
            color: #000;
            line-height: 60px;
            display: block;
            font-family: "Oswald", sans-serif;
            letter-spacing: 2px;
        }

        .counter-title {
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .counter-icon {
            top: 25px;
            position: relative;
        }

        .counter-style2 .counter-title {
            letter-spacing: 0.55px;
            float: left;
        }

        .counter-style2 span.counter {
            letter-spacing: 0.55px;
            float: left;
            margin-right: 10px;
        }

        .counter-style2 i {
            float: right;
            line-height: 26px;
            margin: 0 10px 0 0;
        }

        .counter-subheadline span {
            float: right;
        }

        .medium-icon {
            font-size: 40px !important;
            margin-bottom: 15px !important;
        }

        /* Counter ends */

        /* Reviews and rating*/

        @media (min-width: 0) {
            .g-mr-15 {
                margin-right: 1.07143rem !important;
            }
        }

        @media (min-width: 0) {
            .g-mt-3 {
                margin-top: 0.21429rem !important;
            }
        }

        .g-height-50 {
            height: 50px;
        }

        .g-width-50 {
            width: 50px !important;
        }

        @media (min-width: 0) {
            .g-pa-30 {
                padding: 2.14286rem !important;
            }
        }

        .g-bg-secondary {
            background-color: #fafafa !important;
        }

        .u-shadow-v18 {
            box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
        }

        .g-color-gray-dark-v4 {
            color: #777 !important;
        }

        .g-font-size-12 {
            font-size: 0.85714rem !important;
        }

        .media-comment {
            margin-top: 20px;
        }

        /* Progress Bar Rating */
        .demo {
            background: #585858;
        }

        .progress {
            height: 50px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            box-shadow: none;
            padding: 5px;
            margin-bottom: 30px;
            overflow: visible;
        }

        .progress .progress-bar {
            box-shadow: none;
            position: relative;
            border-radius: 20px;
            animation: animate-positive 2s;
        }

        .progress .progress-title {
            font-size: 17px;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
            margin: 0;
            position: absolute;
            top: 12px;
            left: 15px;
        }

        .progress .progress-value {
            width: 45px;
            height: 33px;
            line-height: 35px;
            background: #f5f5f5;
            border-radius: 50px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            font-size: 14px;
            font-weight: bold;
            color: #ffcc00;
            position: absolute;
            top: 4px;
            right: 4px;
        }

        .progress.yellow .progress-value {
            color: #ffcc00;
        }

        .progress.blue .progress-value {
            color: #7049ba;
        }

        .progress.green .progress-value {
            color: #5fad56;
        }

        @-webkit-keyframes animate-positive {
            0% {
                width: 0;
            }
        }

        @keyframes animate-positive {
            0% {
                width: 0;
            }
        }
    </style>
</body>

</html>