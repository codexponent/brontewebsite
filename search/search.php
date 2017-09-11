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
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- load MUI -->
    <link href="//cdn.muicss.com/mui-0.9.16/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.16/js/mui.min.js"></script>
        <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    </head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
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
        </style>
        <style>
    .demo-card-wide.mdl-card {
    width: 512px;
    }
    .demo-card-wide > .mdl-card__title {
    color: #fff;
    height: 176px;
    background: url('../assets/demos/welcome_card.jpg') center / cover;
    }
    .demo-card-wide > .mdl-card__menu {
    color: #fff;
    }
    body {
    font-family: 'Sofia';font-size: 22px;
    background-color: Teal
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
                    <a class="mdl-navigation__link" href="index.html">Home</a>
                        <a class="mdl-navigation__link" href="../products.php">Products</a>
                        <a class="mdl-navigation__link" href="../customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="../cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="category.php">Category</a>
                        <a class="mdl-navigation__link" href="shop.php">Shop</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                </div>
        </div><br /><br /><br /><br />
        


<?php

    $searchText = $_GET['searchName'];

    $get_products = oci_parse($connection, "SELECT * FROM PRODUCT WHERE PRODUCTNAME LIKE '%$searchText%'");
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
                
                



?>
<div style="text-align: center" >
                <br />
                <br />
                <br />
				
                <div class="mdl-card mdl-shadow--4dp" style="display: table; margin: 0 auto; text-align: center;" >
                    <a href="../products/individualproducts.php?productId=<?php echo $productId; ?>" >
                    <div class="mdl-card__media"><img src="../admin/product/product_images/<?php echo "$productImage"; ?>" width="310" height="157" border="0"
                        alt="" style="padding:10px;">
                    </div>
                    </a>
                    <div class="mdl-card__supporting-text">
                        <p>Product Name: <?php echo "$productName"; ?></p>
                        <p>Product Quantity: <?php echo "$productDescription"; ?></p>
                        
                    </div>
                </div>
                   

            </div>
            <br /><br />


 <?php 
                    

                
                }
                oci_close($connection);

                // echo "Total is: ";
                // echo $total;
?>



<!--Search-->
<!-- Textfield with Floating Label -->


   <!--//Footer-->
        <footer class="mdl-mega-footer" style="clear: both;" >
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
    
    <script>
        (function() {
            'use strict';
            
            var snackbarContainer = document.querySelector('#demo-toast-example');
            var showToastButton = document.querySelector('#demo-show-toast');
            showToastButton.addEventListener('click', function() {
                'use strict';
                var data = {message: 'Added to Favourites '};
                snackbarContainer.MaterialSnackbar.showSnackbar(data);
            });
        }());
    </script>

    </body>
</html>