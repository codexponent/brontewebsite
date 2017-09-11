<?php
    session_start();

        $username = 'bronte';
    	$password = 'bronte';
        $connection_string = 'localhost/xe';
        $connection = oci_connect($username, $password, $connection_string);
            if (!$connection){
                echo 'Connection failed';
            }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Bronte Assortment</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- load MUI -->
        <link href="//cdn.muicss.com/mui-0.9.16/css/mui.min.css" rel="stylesheet" type="text/css" />
        <script src="//cdn.muicss.com/mui-0.9.16/js/mui.min.js"></script>

    </head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style>
    .demo-layout-transparent {
        background: url('../assets/demos/transparent.jpg') center / cover;
        }
        .demo-layout-transparent .mdl-layout__header,
        .demo-layout-transparent .mdl-layout__drawer-button {
            /* This background is dark, so we set text to white. Use 87% black instead if
            your background is light. */
        color: white;
        background-color: black;
    }
    body {
    font-family: 'Sofia';font-size: 22px;
    background-color: Teal;
}
    </style>

    <body>
        <div>
            <div class="demo-layout-transparent mdl-layout mdl-js-layout">
                <header class="mdl-layout__header mdl-layout__header--transparent">
                    <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title"><img src="img/logo.png" height="55" width="125" /></span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation -->
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="index.html">Home</a>
                        <a class="mdl-navigation__link" href="products.php">Products</a>
                        <a class="mdl-navigation__link" href="customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Bronte Assortment</span>
                    <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="index.html">Home</a>
                        <a class="mdl-navigation__link" href="products.php">Products</a>
                        <a class="mdl-navigation__link" href="customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                </div>
                
        </div><br /><br /><br /><br /><br />

        <h2 style="text-align: center; font-family: Sofia" >Cart </h2>

        <?php
        $day = date('l');
                $customerId = $_SESSION['customer_Id'];

                $get_cart = oci_parse($connection, "SELECT * FROM cart WHERE customerId='$customerId'");

                if (!$get_cart) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // Perform the logic of the query
                $r = oci_execute($get_cart);
                if (!$r) {
                    $e = oci_error($get_cart);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                    // Fetch the results of the query
                // print "<table border='3'>\n";
                $totalQuantity = 0;
                    $totalPrice = 0;
                    $total = 0;
                while ($row = oci_fetch_assoc($get_cart)) {
                    
                    $temp = 1;
                    // print "<tr>\n";
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
                            $productId = $row["PRODUCTID"];
                            $cartId = $row["CARTID"];
                            $customerProductQuantity = $row["QUANTITY"];
                            $temp = 0;
                        }
                    }


            $get_products = oci_parse($connection, "SELECT * FROM product WHERE productId = '$productId'");
                if (!$get_products) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Perform the logic of the query
                $r = oci_execute($get_products);
                if (!$r) {
                    $e = oci_error($get_products);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Fetch the results of the query
                // print "<table border='3'>\n";
                while ($row = oci_fetch_assoc($get_products)) {
                    $temp = 1;
                    // print "<tr>\n";
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
							$productId = $row["PRODUCTID"];
                            $productCategory = $row["PRODUCTCATEGORY"];
                            $productName = $row["PRODUCTNAME"];
							$productImage = $row["PRODUCTIMAGE"];
							$productDescription =  $row["PRODUCTDESCRIPTION"];
							$productQuantity = $row["PRODUCTQUANTITY"];
							$productStock = $row["PRODUCTSTOCK"];
							$productMinOrder = $row["PRODUCTMINORDER"];
							$productMaxOrder = $row["PRODUCTMAXORDER"];
							$productPrice = $row["PRODUCTPRICE"];
                            $traderId = $row["TRADERID"];
                            $shopId = $row["SHOPID"];
                            $temp = 0;
                        }
                    }
                    // $totalPrice = $totalPrice + $productPrice;
                    // $totalQuantity = $totalQuantity + customerProductQuantity;
                    $total = $total + ($customerProductQuantity * $productPrice);
        ?>


                <div class="mdl-card mdl-shadow--4dp" style="display: table; margin: 0 auto; text-align: center;" >
                    <div class="mdl-card__media"><img src="admin/product/product_images/<?php echo "$productImage"; ?>" width="310" height="157" border="0"
                        alt="" style="padding:10px;">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Product Name: <?php echo "$productName"; ?></p>
                        <p>Product Quantity: <?php echo "$customerProductQuantity"; ?></p>
                        <p>Product Price: <?php echo "$productPrice"; ?></p>
                        <a href="cart/delete_cart.php?product_id=<?php echo $productId; ?>&customer_id=<?php echo $customerId; ?>">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                Delete
                            </button>
                        </a>
                    </div>
                </div>


                <br />

            <?php 
                    }

                }

                // echo "Total is: ";
                // echo $total;
?>

            <form action="cart.php" method="POST" style="display: table; margin: 0 auto; text-align: center;" class="mui-form" >
                <div class="mui-select" >
                    <!--<select name="c_time" >
                        <option value="Sunday" seleced="selected">Sunday</option>
                        <option value="Monday" >Monday</option>
                        <option value="Tuesday" >Tuesday</option>
                        <option value="Wednesday" >Wednesday</option>
                        <option value="Thursday" >Thursday</option>
                        <option value="Friday" >Friday</option>
                        <option value="Saturday" >Saturday</option>
                    </select><br />-->
                    <select id="time_slot" name="c_time">
                        <option <?php if($day == "Wednesday" && $time>=13) echo "hidden"; ?> value="Wednesday 10AM - 01PM">Wednesday 10AM - 01PM</option>
                        <option <?php if($day == "Wednesday" && $time>=16) echo "hidden"; ?> value="Wednesday 01PM - 04PM">Wednesday 01PM - 04PM</option>
                        <option <?php if($day == "Wednesday" && $time>=19) echo "hidden"; ?> value="Wednesday 04PM - 07PM">Wednesday 04PM - 07PM</option>
                        <option <?php if($day == "Thursday" && $time>=13) echo "hidden"; ?> value="Thursday 10AM - 01PM">Thursday 10AM - 01PM</option>
                        <option <?php if($day == "Thursday" && $time>=16) echo "hidden"; ?> value="Thursday 01PM - 04PM">Thursday 01PM - 04PM</option>
                        <option <?php if($day == "Thursday" && $time>=19) echo "hidden"; ?> value="Thursday 04PM - 07PM">Thursday 04PM - 07PM</option>
                        <option <?php if($day == "Friday" && $time>=13) echo "hidden"; ?> value="Friday 10AM - 01PM">Friday 10AM - 01PM</option>
                        <option <?php if($day == "Friday" && $time>=16) echo "hidden"; ?> value="Friday 01PM - 04PM">Friday 01PM - 04PM</option>
                        <option <?php if($day == "Friday" && $time>=19) echo "hidden"; ?> value="Friday 04PM - 07PM">Friday 04PM - 07PM</option>
                    </select>
                <br />
                    <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="add_time" value="Go to Checkout" />
                 </div>   
                </form>
            <br /><br /><br />


<?php

    // timeslot VARCHAR2(255),
    // dateBought
    $order_date = date("d-M-Y");

    if (isset($_POST['add_time'])) {
    $customerTime = $_POST['c_time'];
    $insert_receipt = oci_parse($connection, "INSERT INTO receipt (receiptId, 
                                                                    timeslot, 
                                                                    datebought,
                                                                    customerId) VALUES (seqCart.nextVal, 
                                                                                        '$customerTime',
                                                                                        '$order_date',
                                                                                        '$customerId')");
    
    if (!$insert_receipt) {
        $e = oci_error($connection);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $r = oci_execute($insert_receipt);
        if (!$r) {
            $e = oci_error($insert_receipt);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }

    // echo "<script>window.open('checkout.php?total=$total&pickupTime=$customerTime', '_self')</script>";
    echo "<script>window.open('checkout.php?total=$total', '_self')</script>";

    }

?>

<!--<a href="checkout.php?total=<?php echo $total; ?>"><button type="button" >Checkout</button></a>-->

<?php		
            oci_free_statement($get_products);
            oci_free_statement($get_cart); 
				    oci_close($connection);
        ?>

        


    <!--//Footer-->
        <footer class="mdl-mega-footer">
        <div class="mdl-mega-footer__middle-section">

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">Features</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Updates</a></li>
            </ul>
            </div>

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">Details</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">Specs</a></li>
                <li><a href="#">Tools</a></li>
                <li><a href="#">Resources</a></li>
            </ul>
            </div>

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">Technology</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">How it works</a></li>
                <li><a href="#">Patterns</a></li>
                <li><a href="#">Usage</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contracts</a></li>
            </ul>
            </div>

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">FAQ</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">Questions</a></li>
                <li><a href="#">Answers</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            </div>

        </div>

        <div class="mdl-mega-footer__bottom-section">
            <div class="mdl-logo">Title</div>
            <ul class="mdl-mega-footer__link-list">
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy & Terms</a></li>
            </ul>
        </div>

        </footer>

    </div>
    </body>
</html>