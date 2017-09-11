<!DOCTYPE HTML>
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

<html>
    <head>
        <title>Bronte Assortment</title>
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
    font-size: 2.0em;
}
    </style>

    <body>
        <div>
            <div class="demo-layout-transparent mdl-layout mdl-js-layout">
                <header class="mdl-layout__header mdl-layout__header--transparent">
                    <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Bronte Assortment</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation -->
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="../index.html">Home</a>
                        <a class="mdl-navigation__link" href="../products.php">Products</a>
                        <a class="mdl-navigation__link" href="../customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="../cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Bronte Assortment</span>
                    <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="../index.html">Home</a>
                        <a class="mdl-navigation__link" href="../products.php">Products</a>
                        <a class="mdl-navigation__link" href="../customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="../cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                </div>
                <main class="mdl-layout__content">
                </main>
        </div><br /><br /><br /><br /><br />

        <h2 style="text-align: center; font-family: Sofia" >Cart </h2>


<table class="mdl-data-table mdl-js-data-table" align="center" >
            <thead>
                <tr>
                    <th>S.No</th>
                    <th class="mdl-data-table__cell--non-numeric">Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>


        <?php
                
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


                    //update query here
                    //if condition here to validate

                    $finalProductQuantity = ($productQuantity - $customerProductQuantity);

                    $update_products = oci_parse($connection, "UPDATE product SET productQuantity = '$finalProductQuantity' WHERE productId = '$productId'");

                        if (!$update_products) {
                            $e = oci_error($conn);
                            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                        }

                        // Perform the logic of the query
                        $r = oci_execute($update_products);
                        if (!$r) {
                            $e = oci_error($update_products);
                            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                        }
                        oci_free_statement($update_products); 
            



                    //update 
        ?>

        
                <tr>
                    <td><?php echo $productId; ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?php echo $productName; ?></td>
                    <td><?php echo $customerProductQuantity; ?></td>
                    <td><?php echo ($productPrice * $customerProductQuantity); ?></td>
                </tr>
            
                <br />

            <?php 
                    }

                }
                

                // echo "Total is: ";
                // echo $total;

                ?>

                <tr>
                    <td></td>
                    <td class="mdl-data-table__cell--non-numeric"></td>
                    <td class="mdl-data-table__cell--non-numeric">Total:</td>
                    <td><?php echo $total; ?></td>
                </tr>

                <?php

            oci_free_statement($get_products);
            oci_free_statement($get_cart); 
				    oci_close($connection);
        ?>
</tbody>
        </table>
























<br /><br /><br /><br /><br />

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