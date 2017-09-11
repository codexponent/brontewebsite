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

<?php

if(isset($_SESSION['customer_Id'])){
                $id = $_SESSION['customer_Id'];
                // echo "Inside if" . "<br />";
                // echo $id;
    
            $get_customer = oci_parse($connection, "SELECT * FROM customer WHERE customerId='$id'");

                if (!$get_customer) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // Perform the logic of the query
                $r = oci_execute($get_customer);
                if (!$r) {
                    $e = oci_error($get_customer);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                    // Fetch the results of the query
                // print "<table border='3'>\n";
                while ($row = oci_fetch_assoc($get_customer)) {
                    $temp = 1;
                    // print "<tr>\n";
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
                            $customerFirstName = $row["FIRSTNAME"];
                            $customerLastName = $row["LASTNAME"];
                            $customerAge = $row["AGE"];
                            $customerSex = $row["SEX"];
                            $customerEmail = $row["EMAIL"];
                            $customerImage = $row["IMAGE"];
                            $customerPhone = $row["PHONE"];
                            $customerAddress = $row["ADDRESS"];
                            $customerCity = $row["CITY"];
                            $temp = 0;
                        }
                    }
                
        }
        
		
            }

?>

<!DOCTYPE HTML>
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
    </style>

    <style>
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('login/customer_images/<?php echo $customerImage; ?>') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
body {
    font-family: 'Sofia';font-size: 22px;
    background-color: Teal;
}
</style>

    <body >
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
                <main class="mdl-layout__content">
                </main>
        </div><br /><br /><br /><br /><br />

        <h2 style="text-align: center; font-family: Sofia" >Customer </h2>

        <?php
            if(isset($_SESSION['customer_Id'])){
                $id = $_SESSION['customer_Id'];
                $get_customer = oci_parse($connection, "SELECT * FROM customer WHERE customerId='$id'");
                if (!$get_customer) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Perform the logic of the query
                $r = oci_execute($get_customer);
                if (!$r) {
                    $e = oci_error($get_customer);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Fetch the results of the query
                // print "<table border='3'>\n";
                while ($row = oci_fetch_assoc($get_customer)) {
                    $temp = 1;
                    // print "<tr>\n";
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
                            $customerFirstName = $row["FIRSTNAME"];
                            $customerLastName = $row["LASTNAME"];
                            $customerAge = $row["AGE"];
                            $customerSex = $row["SEX"];
                            $customerEmail = $row["EMAIL"];
                            $customerImage = $row["IMAGE"];
                            $customerPhone = $row["PHONE"];
                            $customerAddress = $row["ADDRESS"];
                            $customerCity = $row["CITY"];
                            $temp = 0;
                        }
                    }
?>

                <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="display: table; margin: 0 auto; text-align: center;">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text"><?php echo $customerFirstName; ?> <?php echo "$customerLastName"; ?></h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Customer Age: <?php echo "$customerAge"; ?></p>
                        <p>Customer Sex: <?php echo "$customerSex"; ?></p>
                        <p>Customer Email: <?php echo "$customerEmail"; ?></p>
                        <p>Customer Phone: <?php echo "$customerPhone"; ?></p>
                        <p>Customer Address: <?php echo "$customerAddress"; ?></p>
                        <p>Customer City: <?php echo "$customerCity"; ?></p>
                        <br />
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="cart.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Cart</button></a>
                        <a href="receipt/receipt_success.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Receipt</button></a>
                        <a href="login/customer_logout.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Logout</button></a>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                        </button>
                    </div>
                </div>

    <?php 
        }
            }
            oci_free_statement($get_customer); 
			oci_close($connection);
        ?>


        <br /><br /><br /><br />
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
