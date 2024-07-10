<?php

session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "ChefOnDemand";

$cuisinesid = $_SESSION['cuisinesid'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$luname = $_SESSION['user'];
$sql = "SELECT * FROM `user_info` WHERE username = '$luname' ";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM `appetizers` WHERE type = '$cuisinesid'";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM `main_course` WHERE type = '$cuisinesid'";
$result3 = mysqli_query($conn, $sql3);

$sql4 = "SELECT * FROM `desserts` WHERE type = '$cuisinesid'";
$result4 = mysqli_query($conn, $sql4);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FormWizard_v8</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <form action="smtp/message.php" id="wizard" method="post">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>Basic details</h3>

                <div class="form-row">
                    <?php
                    // LOOP TILL END OF DATA
                    while ($rows = $result->fetch_assoc()) {

                    ?>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo $rows['name'] ?>" name="fname">
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $rows['lastname'] ?>" name="lname">
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-email"></i>
                        <input type="text" class="form-control" placeholder="Email ID" value="<?php echo $rows['email'] ?>" name="email">
                    </div>
                    <div class="form-holder">
                        <i class="zmdi zmdi-smartphone-android"></i>
                        <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $rows['phone'] ?>" name="phone">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-holder w-100">
                        <input type="text" class="form-control" placeholder="Address" value="<?php echo $rows['address'] ?>" name="address">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-map"></i>
                        <input type="text" class="form-control" placeholder="Country" value="<?php echo $rows['country'] ?>" name="country">
                    </div>
                    <div class="form-group">
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin"></i>
                            <input type="text" class="form-control" placeholder="State" value="<?php echo $rows['state'] ?>" name="state">
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin-drop"></i>
                            <input type="text" class="form-control" placeholder="City" value="<?php echo $rows['city'] ?>" name="city">
                        </div>
                    </div>
                </div>


            <?php
                    };
            ?>
            </section>

            <!-- SECTION 2 -->
            <h4></h4>
            <section>
                <h3>Occasion Details</h3>
                <div class="form-row">
                    <div class="form-holder w-100">
                        <label>Occasions</label>
                        <input type="text" class="form-control" placeholder="House Party,Wedding & etc...." name="Occasions">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-holder">
                        <label for="people">Number Of People</label>
                        <select class="form-control" id="people" name="people">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <label for="Meals" id="Meals">Meals</label>
                        <select class="form-control" id="meals" name="meals">
                            <option value="BreakFast">BreakFast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>

                    <div class="form-holder">
                        <label for="No_Buners" id="Buners">Number Of Buners</label>
                        <select class="form-control" id="Buners" name="Burners">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </section>

            <!-- SECTION 3 -->
            <h4></h4>
            <section>
                <h3 style="margin-bottom: 16px;">Appetizers</h3>
                <table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table1">
                    <thead>
                        <th>&nbsp;</th>
                        <th style="text-align: left;"> Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php


                        while ($rows = $result2->fetch_assoc()) {
                            $product_id = $rows['id'];
                        ?>
                            <tr data-product-id="<?php echo $product_id ?>">

                                <td class="product-thumb">
                                    <a href="#" class="item-thumb">
                                        <img src="images/item-1.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-detail" data-title="Product Detail">
                                    <div>
                                        <a href="#"><?php echo $rows['name'] ?></a>
                                        <span>₹</span>
                                        <span><?php echo $rows['price'] ?></span>
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <span class="plus">+</span>
                                        <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="0" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                        <span class="minus">-</span>
                                    </div>
                                </td>
                                <td class="total-price" data-title="Total Price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">₹</span>
                                        0.00
                                    </span>
                                </td>
                                <td><button onclick="removeRow(this)" class="btn"><i class="zmdi zmdi-close-circle-o"></i></button></td>

                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </section>

            <!-- SECTION 4 MAIN COURSE -->
            <h4></h4>
            <section>
                <h3 style="margin-bottom: 16px;">Main Course</h3>
                <table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table2">
                    <thead>
                        <th>&nbsp;</th>
                        <th style="text-align: left;"> Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php

                        while ($rows = $result3->fetch_assoc()) {
                            $product_id = $rows['id'];
                        ?>
                            <tr data-product-id="<?php echo $product_id ?>">

                                <td class="product-thumb">
                                    <a href="#" class="item-thumb">
                                        <img src="images/item-1.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-detail" data-title="Product Detail">
                                    <div>
                                        <a href="#"><?php echo $rows['name'] ?></a>
                                        <span>₹</span>
                                        <span><?php echo $rows['price'] ?></span>
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <span class="plus">+</span>
                                        <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="0" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                        <span class="minus">-</span>
                                    </div>
                                </td>
                                <td class="total-price" data-title="Total Price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">₹</span>
                                        0.00
                                    </span>
                                </td>
                                <td><button onclick="removeRow(this)" class="btn"><i class="zmdi zmdi-close-circle-o"></i></button></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>

            <!-- SECTION 5 DESSERTS -->
            <h4></h4>
            <section>
                <h3 style="margin-bottom: 16px;">Desserts</h3>
                <table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table3">
                    <thead>
                        <th>&nbsp;</th>
                        <th style="text-align: left;"> Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php

                        while ($rows = $result4->fetch_assoc()) {
                        ?>
                            <tr>

                                <td class="product-thumb">
                                    <a href="#" class="item-thumb">
                                        <img src="images/item-1.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-detail" data-title="Product Detail">
                                    <div>
                                        <a href="#"><?php echo $rows['name'] ?></a>
                                        <span>₹</span>
                                        <span><?php echo $rows['price'] ?></span>
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <span class="plus">+</span>
                                        <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="0" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                        <span class="minus">-</span>
                                    </div>
                                </td>
                                <td class="total-price" data-title="Total Price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">₹</span>
                                        0.00
                                    </span>
                                </td>
                                <td><button onclick="removeRow(this)" class="btn"><i class="zmdi zmdi-close-circle-o"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>

            <!-- SECTION 6 TOTAL -->
            <h4></h4>
            <section>
                <h3>Cart Totals</h3>
                <div class="cart_totals">
                    <!-- <table cellspacing="0" class="shop_table shop_table_responsive"> -->
                    <table cellspacing="0" class="shop_table shop_table_responsive" id="cart_total">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="cart-items">
                            <!-- The list of updated products and their prices will be added here -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Total Quantity:</td>
                                <td id="total-quantity">0</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total Price:</td>
                                <td id="total-price">$0.00</td>
                            </tr>

                            <tr>
                                <td>
                                    <button id="submit-btn" class="btn btn-outline-dark" type="submit">Submit</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </section>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/62d8f78fb4.js" crossorigin="anonymous"></script>

    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- JQUERY STEP -->
    <script src="js/jquery.steps.js"></script>

    <script src="js/smain.js"></script>
    <style>
        table {
            overflow-y: scroll;
            height: 256px;
            display: block;
        }

        .btn {
            cursor: pointer;
            background-color: transparent;
            border: transparent;
            font-size: 1.5em;

        }
    </style>

    <script>
        // select the parent element of all remove buttons
        const removeRow = button => {
            // get the parent row element and remove it from the table
            const row = button.closest('tr');
            const parent = row.parentNode;
            parent.removeChild(row);
        };
    </script>
</body>

</html>