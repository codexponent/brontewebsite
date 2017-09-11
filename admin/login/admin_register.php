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
                         <a class="mdl-navigation__link" href="../../admin/login/admin_login.php">Admin</a>
                        <a class="mdl-navigation__link" href="../../admin/traderLogin/trader_login.php">Trader</a>
                        <a class="mdl-navigation__link" href="../../login/customer_login.php">Customer</a>
                    </nav>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Bronte Assortment</span>
                    <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="../../index.html">Home</a>
                        <a class="mdl-navigation__link" href="../../products.php">Products</a>
                         <a class="mdl-navigation__link" href="../../admin/login/admin_login.php">Admin</a>
                        <a class="mdl-navigation__link" href="../../admin/traderLogin/trader_login.php">Trader</a>
                        <a class="mdl-navigation__link" href="../../login/customer_login.php">Customer</a>
                    </nav>
                </div>
                
        </div><br /><br /><br /><br /><br />

        <h2 style="text-align: center; font-family: Sofia; color: white" >Admin Registration </h2>


<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<br />
	<form action="admin_register.php" method="post" class="mui-form" enctype="multipart/form-data" > 
		
		<div class="mui-textfield mui-textfield--float-label">
			<input type="text" name="c_fname" value="<?php 
				               if (isset($_POST['c_fname'])) {
				               	echo $_POST['c_fname'];
				               }
				               ?>" required>
			<label>First Name</label>
		</div>

		<div class="mui-textfield mui-textfield--float-label">
			<input type="text" name="c_lname" value="<?php 
				               if (isset($_POST['c_lname'])) {
				               	echo $_POST['c_lname'];
				               }
				               ?>" required>
			<label>Last Name</label>
		</div>

		<div class="mui-textfield mui-textfield--float-label">
			<div class="mui-select">
				<select name="c_age" >
					<option>16-20</option>
					<option>21-30</option>
					<option>31-40</option>
					<option>41-50</option>
					<option>51-61</option>
					<option>61-70</option>
				</select>
				<label>Age Group</label>
			</div>
		</div>
		<div class="mui-textfield mui-textfield--float-label">
			<input type="text" name="c_sex" id="txtSex" value="<?php 
				               	if (isset($_POST['c_sex'])) {
				               	echo $_POST['c_sex'];
				               }
				               ?>" required>
			<label>SEX</label>
		</div>
		<div class="mui-textfield mui-textfield--float-label">
			<input type="email" name="c_email" id="txtEmail" value="<?php 
				               	if (isset($_POST['c_email'])) {
				               	echo $_POST['c_email'];
				               }
				               ?>" required>
			<label>E-mail</label>
		</div>
		<div class="mui-textfield mui-textfield--float-label">
			<input type="password" name="c_password" value="<?php 
				               	if (isset($_POST['c_password'])) {
				               	echo $_POST['c_password'];
				               }
				               ?>" required>
			<label>Password</label>
		</div>

		<div class="mui-textfield mui-textfield--float-label">
			<input type="file" class="mui-btn mui-btn--raised" name="c_image" required>
			<label>Image</label>
		</div>

		<div class="mui-textfield mui-textfield--float-label">
			<input type="number" name="c_phone" value="<?php 
				               	if (isset($_POST['c_phone'])) {
				               	echo $_POST['c_phone'];
				               }
				               ?>" required>
			<label>Number</label>
		</div>

		<div class="mui-textfield mui-textfield--float-label">
			<input type="text" name="c_address" value="<?php 
				               	if (isset($_POST['c_address'])) {
				               	echo $_POST['c_address'];
				               }
				               ?>" required>
			<label>Address</label>
		</div>

		<div class="mui-textfield mui-textfield--float-label">
			<input type="text" name="c_city" value="<?php 
				               	if (isset($_POST['c_city'])) {
				               	echo $_POST['c_city'];
				               }
				               ?>" required>
			<label>City</label>
		</div>
		<div class="mui-checkbox">
			<label>
			<input type="checkbox" name="checkbox" value="" required>
			TERMS AND CONDITIONS
			</label>
		</div>

			<button type="submit" class="mui-btn mui-btn--raised" name="register" id="admin_registerButton" >Submit</button>

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
	// Insertion of data
	if (isset($_POST['register'])) {
		// global $con;
		// $ip = getIp();
		$c_fname = $_POST['c_fname'];
		$c_lname = $_POST['c_lname'];
		$c_age = $_POST['c_age'];
		$c_sex = $_POST['c_sex'];
		$c_email = $_POST['c_email'];				//Preventing SQL injection
		$c_password = $_POST['c_password'];		//Preventing SQL injection
	

		$c_phone = $_POST['c_phone'];
		$c_address = $_POST['c_address'];
		$c_city = $_POST['c_city'];

		$checkEmail = oci_parse($connection, "SELECT * FROM admin WHERE email='$c_email'");
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

			
			$checkNumber = oci_num_rows($checkEmail);
			

			// if ($checkNumber == 0){
			// 	echo "No email found, continue";
			// }

			if ($checkNumber == 0) {
				if (ctype_alpha($c_fname) && ctype_alpha($c_lname)) {
					if (strlen($_POST["c_password"]) >= '8') {
        				if(preg_match("#[0-9]+#",$c_password)) {
        					if(preg_match("#[A-Z]+#",$c_password)) {
        						if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $c_password)) {
									$encrypt_pasword = md5($c_password);		//Encrypting the password into MD5
							
									// $run_admin = mysqli_query($con, $insert_admin);
					$insert_admin = oci_parse($connection, "INSERT INTO admin (adminId, 
																				firstName, 
																				lastName, 
																				age, 
																				sex, 
																				email, 
																				password,  
																				phone,
																				address,
																				city,
                                                                                superAdmin) VALUES (
																				seqAdmin.nextVal, 
																				'$c_fname', 
																				'$c_lname', 
																				'$c_age',
																				'$c_sex',
																				'$c_email', 
																				'$encrypt_pasword', 
																				'$c_phone', 
																				'$c_address', 
																				'$c_city',
                                                                                0)");

								if (!$insert_admin) {
									$e = oci_error($connection);
									trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
								}
								$r = oci_execute($insert_admin);
								if (!$r) {
									$e = oci_error($insert_admin);
									trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
								}

					
								$to = $c_email;
            $subject = "Email Confirmation";

            // $headers = "From: " . strip_tags($to) . "\r\n";
            // $headers .= "Reply-To: ". strip_tags($to) . "\r\n";
            // $headers .= "CC: shashisigdel101@gmail.com\r\n";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = '<html><body>';
            $message .= '<img src="https://wallpaperscraft.com/image/couple_food_table_coffee_shop_fast_food_57082_3840x2400.jpg" height="500" width="800" />';
            $message .= '<br />';
            $message .= '<h1 style="color:brown;text-align:center;font-family:Comic Sans MS">BronteAssortment</h1>';
            $message .= '<h4 style="color:brown;text-align:center;font-family:Comic Sans MS">Come Join Us</h4>';
            $message .= '<br />';
            $message .= '<p style="text-align:center;font-family:Comic Sans MS">We are delighted to have you as a new admin on our webpage. We are truely Thankful</p>';
            $message .= '<p style="text-align:center;font-family:Comic Sans MS">Please follow this link to sign up</p>';
            $message .= '<a style="text-align:center" href="http://localhost/bronte/admin/login/admin_login.php" ><p style="text-align:center;font-family:Comic Sans MS" >Click me to Sign In</span></p>';
            $message .= '<br />';
            $message .= '<br />';
            $message .= '<table align="center" width="604" cellpadding="5" cellspacing="0"> <tr> <td width="288" bgcolor="#ffffff"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_square-512.png" height="35" width="35" /><br /> <td width="294" bgcolor="#ffffff" align="right"> <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/512/Twitter-icon.png" height="35" width="35" /><tr>';
            $message .= '<td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;" align="center">
<span style="font-size: 10px; color: #575757; line-height: 120%; font-family: arial; text-decoration: none;">
<a href="mailto:info@petanthology.com">
Contact Us?</a><br>
Visit us on the web at <a href="default.asp">petanthology.com</a></span></td>

<td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: right; height: 50px;" align="center">
<span style="font-size: 10px; color: #575757; line-height: 120%;
font-family: arial; text-decoration: none;">If you no longer want to receive our emails, please <a href="default.asp">un-subscribe here</a>.</span>';
            $message .= '</table>';

            $message .= "</body></html>";

		    // send email
		    mail($to, $subject, $message, $headers);



								echo "<script>alert('Registration Successful')</script>";
									// $_SESSION['admin_email'] = $c_email;
									// echo "<script>window.open('admin/my_account.php', '_self')</script>";
									oci_free_statement($insert_admin); 
								}else{
									echo "<script>alert('Your Password Must Contain At Least 1 Symbol!')</script>";
								}
							}else{
								echo "<script>alert('Your Password Must Contain At Least 1 Capital Letter!')</script>";
							}
						}else{
							echo "<script>alert('Your Password Must Contain At Least 1 Number!')</script>";
						}
					}else{
						echo "<script>alert('Your Password Must Contain At Least 8 Characters!')</script>";
					}

				}else{
					echo "<script>alert('Name ($c_fname $c_lname) is not alphabetic character!')</script>";
				}
			}else{
				echo "<script>alert('Email ($c_email) is already in use!')</script>";
			}

			oci_free_statement($checkEmail); 
			oci_close($connection);
	}
?>