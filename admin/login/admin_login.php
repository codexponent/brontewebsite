<?php
	session_start();
	// include("includes/databaseConnection.php");


	//<Connection.php> Here
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
                        <a class="mdl-navigation__link" href="../../index.html">Home</a>
                        <a class="mdl-navigation__link" href="../../products.php">Products</a>
                         <a class="mdl-navigation__link" href="#">Admin</a>
                        <a class="mdl-navigation__link" href="../traderLogin/trader_login.php">Trader</a>
                        <a class="mdl-navigation__link" href="../../login/customer_login.php">Customer</a>
                    </nav>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Bronte Assortment</span>
                    <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="../../index.html">Home</a>
                        <a class="mdl-navigation__link" href="../../products.php">Products</a>
                         <a class="mdl-navigation__link" href="#">Admin</a>
                        <a class="mdl-navigation__link" href="../traderLogin/trader_login.php">Trader</a>
                        <a class="mdl-navigation__link" href="../../login/customer_login.php">Customer</a>
                    </nav>
                </div>
                
        </div><br /><br /><br /><br /><br />

        <h2 style="text-align: center; font-family: Sofia; color: white" >Admin Login </h2>

<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<br />
	<form action="admin_login.php" method="post" class="mui-form" > 
		

  <div class="mui-textfield mui-textfield--float-label">
    <input type="email" name="email" required>
    <label>Email</label>
  </div>

  <div class="mui-textfield mui-textfield--float-label">
    <input type="password" name="password" required>
    <label>Password</label>
  </div>

<!--<a href="admin_register.php" ><button class="mui-btn mui-btn--raised">Register</button></a>-->
<button type="submit" class="mui-btn mui-btn--raised" name="login" id="admin_loginButton" >Submit</button>

   	
    </form>
	<br />
</div>

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

	<?php
		//Checking the login
		if (isset($_POST['login'])) {
			$c_email = $_POST['email'];
			$c_password = $_POST['password'];
			// $encrypt_password = md5($c_password);
            $encrypt_password = $c_password;

			// $select_customer = "SELECT * FROM customer WHERE password = '$encrypt_password' AND email = '$c_email'";
			$checkEmail = oci_parse($connection, "SELECT * FROM admin WHERE password = '$encrypt_password' AND email = '$c_email'");
			if (!$checkEmail) {
                $e = oci_error($connection);
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }
            $r = oci_execute($checkEmail);
            if (!$r) {
                $e = oci_error($checkEmail);
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }
			oci_fetch_array($checkEmail);

			// echo "checkEmail";
			// echo $checkEmail;
			// echo "<br />";
			$checkNumber = oci_num_rows($checkEmail);
			// echo "oci_num_rows is: ";
			// echo $checkNumber;

			if ($checkNumber == 0) {
				echo "<script>alert('Password or email is incorrect')</script>";
				exit();
			}

			$getId = oci_parse($connection, "SELECT adminId FROM admin where email = '$c_email'");
			if (!$getId) {
                $e = oci_error($connection);
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }
            $r = oci_execute($getId);
            if (!$r) {
                $e = oci_error($getId);
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }

			$row = oci_fetch_assoc($getId);
			$id = $row["ADMINID"];
			// echo "Id is: " . $id . "<br />";

			$_SESSION['admin_Id'] = $id;
            $_SESSION['admin_email'] = $c_email;
            $_SESSION['role'] = 'admin';
			echo "<script>alert('Logged in Successfully')</script>";
			echo "<script>window.open('../trader/view_traders.php', '_self')</script>";

			oci_free_statement($checkEmail); 
			oci_free_statement($getId); 
			oci_close($connection);


			// $select_customer = "select * from customers where customer_password = '$encrypt_password' AND customer_email = '$c_email'";
			// $run_customer = mysqli_query($con, $select_customer);
			// $check_customer = mysqli_num_rows($run_customer);
			// if ($check_customer == 0) {
			// 	echo "<script>alert('Password or email is incorrect')</script>";
			// 	exit();
			// }
			//Checking whether the customer has cart saved or not
			// $c_email = $_POST['email'];
			// $get_email = "select * from customers where customer_email='$c_email'";
			// $run_email = mysqli_query($con, $get_email);
			// $row_email = mysqli_fetch_array($run_email);
			// $c_id = $row_email['customer_id'];
			// $select_carts = "select * from cart where customer_id = '$c_id' ";		//cart table has customer id
			// $run_carts = mysqli_query($con, $select_cart);
			// $check_carts = mysqli_num_rows($run_cart); 			//checking the cart
			// if ($check_customer > 0 AND $check_carts == 0) {			//person has logged in but has no carts
			// 	$_SESSION['customer_email'] = $c_email;
			// 	echo "<script>alert('Logged in Successfully')</script>";
			// 	echo "<script>window.open('customer/my_account.php', '_self')</script>";
			// }else{															//person has logged in  and has carts
			// 	$_SESSION['customer_email'] = $c_email;
			// 	echo "<script>alert('Logged in Successfully')</script>";
			// 	echo "<script>window.open('homepage.php', '_self')</script>";
			// }
		}
	?>
