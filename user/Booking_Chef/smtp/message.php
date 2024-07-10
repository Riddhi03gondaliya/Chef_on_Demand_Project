<?php
session_start();

ob_start();
$items = array();
$totalprice = 0;
// Loop through the submitted form data
foreach ($_POST['pname'] as $key => $value) {
    // Create an associative array for this item and add it to the $items array
    $items[] = array(
        'name' => $_POST['pname'][$key],
        'price' => $_POST['pprice'][$key],
        'quantity' => $_POST['pquantity'][$key]
    );
}

$cook_email = $_SESSION['cook_email'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$occasions = $_POST['Occasions'];
$date = $_POST['date'];
$people = $_POST['people'];
$burner = $_POST['Burners'];
$meals = $_POST['meals'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <div class="container mt-5 mb-5">
        <div class="row g-0">
            <div class="col-md-8 border-right">

                <div class="p-3 bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="heading1">Ordered Items</h6>
                        <div class="d-flex flex-row align-items-center text-muted">
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item) : ?>
                                    <tr>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo $item['price']; ?></td>
                                        <td><?php echo $item['quantity']; ?></td>
                                        <td><?php echo $item['price'] * $item['quantity']; ?></td>
                                    </tr>
                                <?php $totalprice = $totalprice + $item['price'] * $item['quantity'];
                                endforeach; ?>
                            </tbody>
                        </table>



                    </div>


                </div>

            </div>




            <div class="col-md-4">


                <div class="p-3 bg-white">

                    <h6 class="account">Total Amount</h6>
                    <span class="mt-5 balance"><?php echo "₹" . $totalprice ?></span>


                </div>



                <div class="p-3 py-4 bg-white">

                    <div class="d-flex justify-content-between">

                        <span class="goal">Name</span>
                        <span class="goal"><?php echo $fname ?></span>




                    </div>
                    <div class="d-flex justify-content-between">

                        <span class="goal">Address</span>
                        <span class="goal"><?php echo $address ?></span>



                    </div>


                    <div class="progress-1 mt-3">

                        <div class="d-flex justify-content-between">
                            <span class="revenue">Moblie Number</span>
                            <span class="revenue"><?php echo $phone ?></span>

                        </div>

                    </div>

                    <div class="progress-2 mt-3">
                        <div class="d-flex justify-content-between">

                            <span class="orders">Email</span>
                            <span class="orders"><?php echo $email ?></span>

                        </div>
                    </div>

                    <div class="progress-2 mt-3">
                        <div class="d-flex justify-content-between">

                            <span class="orders">Occasion:</span>
                            <span class="orders"><?php echo $occasions ?></span>

                        </div>
                    </div>
                     <div class="progress-2 mt-3">
                        <div class="d-flex justify-content-between">

                            <span class="orders">Meal:</span>
                            <span class="orders"><?php echo $meals ?></span>

                        </div>
                    </div> 

                    

                    <div class="progress-2 mt-3">
                        <div class="d-flex justify-content-between">

                            <span class="orders">Date:</span>
                            <span class="orders"><?php echo $date ?></span>

                        </div>
                    </div>

                    <div class="progress-2 mt-3">
                        <div class="d-flex justify-content-between">

                            <span class="orders">No Of People:</span>
                            <span class="orders"><?php echo $people ?></span>

                        </div>
                    </div>

                    <div class="progress-2 mt-3">
                        <div class="d-flex justify-content-between">

                            <span class="orders">No Of Burners:</span>
                            <span class="orders"><?php echo $burner ?></span>

                        </div>
                    </div>

                </div>
                <div>
                    <a class="btn btn-primary" href="../../user_cuisines.php" role="button">Link</a>
                </div>
            </div>


        </div>


    </div>
    </div>
</body>
<style>
    body {
        background-color: #eee;
        border-radius: 10px
    }

    .heading1 {
        font-size: 16px;
        color: #1A237E
    }

    .days {
        font-size: 15px;
        color: #9FA8DA
    }

    th {
        font-size: 14px;
        color: #D50000
    }

    tr {
        font-size: 13px
    }

    .solditems {
        font-size: 13px;
        color: #9FA8DA
    }

    .balance {
        font-size: 45px;
        color: green
    }

    .account {
        margin-bottom: 36px !important;
        font-size: 16px;
        color: #1A237E
    }

    .transaction {
        font-size: 13px
    }

    .progress {
        height: 3px !important
    }

    .money {
        color: #9FA8DA
    }

    .goal {
        font-size: 17px;
        color: #D50000;
        font-weight: 400
    }

    .revenue {
        font-size: 14px;
        color: #311B92;
        font-weight: 500
    }

    .orders {
        font-size: 14px;
        color: #311B92;
        font-weight: 500
    }

    .customer {
        font-size: 14px;
        color: #311B92;
        font-weight: 500
    }
</style>

</html>

<?php
$html = ob_get_clean();
file_put_contents('output.html', $html);
include('mail.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('smtp/PHPMailerAutoload.php');
    $html = file_get_contents("output.html");
    $result = '';


    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "ChefOnDemand";


    // Initialize total price variable
    $totalprice = 0;

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Define the cook and user usernames
    $cook_username = $_SESSION['cook_username'];
    $user_username = $_SESSION['user'];
    // Define the cook and user usernames


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through each item and insert it into the database
    foreach ($items as $item) {
        $name = $item['name'];
        $price = $item['price'];
        $quantity = $item['quantity'];
        $total = $price * $quantity;

        $sql = "INSERT INTO booking (name, price, quantity, total, cook_username, user_username) VALUES ('$name', '$price', '$quantity', '$total', '$cook_username', '$user_username')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $totalprice += $total;
    }

    // Close database connection
    $conn->close();

    // If all items were inserted into the database, send email
    if ($totalprice > 0) {

        $result = smtp_mailer($cook_email, $email, 'Order Placed', $html);
        if ($result == 'Sent') {
            echo '<script>alert("Order Placed successfully!! Check Your Mail!");window.location.href="output.html";</script>';
        } else {
            echo '<script>alert("Error sending mail: ' . $result . '");</script>';
        }
    }
}


?>