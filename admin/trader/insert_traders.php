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

		<?php 
			//Here
				$i = 0;
				$stid = oci_parse($connection, 'SELECT * FROM admin');
                if (!$stid) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Perform the logic of the query
                $r = oci_execute($stid);
                if (!$r) {
                    $e = oci_error($stid);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Fetch the results of the query
                // print "<table border='3'>\n";
                while ($row = oci_fetch_assoc($stid)) {
                    $temp = 1;
                    // print "<tr>\n";
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
							$adminEmail = $row["EMAIL"];
                            $temp = 0;
                        }
                    }
                    // print "</tr>\n";
				$i++;
				}
                
                oci_free_statement($stid);
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

				<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- load MUI -->
    <link href="//cdn.muicss.com/mui-0.9.16/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.16/js/mui.min.js"></script>

            </head>
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
            <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
            <link rel="stylesheet" href="../style/styles.css">


    <body>


        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

                <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                        <div class="mdl-layout__header-row">
                        <span class="mdl-layout-title">Home</span>
                        <div class="mdl-layout-spacer"></div>
                        
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                            <li class="mdl-menu__item">About</li>
                            <li class="mdl-menu__item">Contact</li>
                            <a href="login/admin_logout.php" ><li class="mdl-menu__item">Logout</li></a>
                        </ul>
                        </div>
                    </header>




            <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                <header class="demo-drawer-header">
                <img src="../images/user.jpg" class="demo-avatar">
                <div class="demo-avatar-dropdown">
                    <span><?php echo $adminEmail; ?></span>
                    <div class="mdl-layout-spacer"></div>
                    <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <a href="../login/admin_logout.php" ><li class="mdl-menu__item">Logout</li></a>
                    </ul>
                </div>
                </header>
                <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                    <a href="#" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Traders</a>
                    <a href="../login/admin_logout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
      </div>
    </div>
<br/><br/><br/><br/>

<h2 style="text-align: center;" >Insert Trader </h2>  


<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<form action="insert_traders.php" method="post" enctype="multipart/form-data" class="mui-form" >	<!-- enctype for various form's of data -->
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_first_name" required>
    				<label>First Name</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_last_name" required >
    				<label>Last Name</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="trader_age" required>
    				<label>Age</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_sex" required>
    				<label>Sex</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="email" name="trader_email" required>
    				<label>Email</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="password" name="trader_password" required>
    				<label>Password</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="trader_phone" required>
    				<label>Phone</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_address" required>
    				<label>Address</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_city" required>
    				<label>City</label>
  				</div>
					<button type="submit" name="insert_post" class="mui-btn mui-btn--raised">Submit</button>

			
		</form>


</div>


    </body>
</html>
		


<?php

	//<Connection.php> Here
	$username = 'bronte';
	$password = 'bronte';
    $connection_string = 'localhost/xe';
    $connection = oci_connect($username, $password, $connection_string);
    if (!$connection){
        echo 'Connection failed';
    }

	$insert_traders = null;
	if (isset($_POST['insert_post'])) {
		//getting the text data from the fields
		$traderFirstName = $_POST['trader_first_name'];
		$traderLastName = $_POST['trader_last_name'];
		$traderAge = $_POST['trader_age'];
		$traderSex = $_POST['trader_sex'];
		$traderEmail = $_POST['trader_email'];
		$traderPassword = $_POST['trader_password'];
		$traderPhone = $_POST['trader_phone'];
		$traderAddress = $_POST['trader_address'];
		$traderCity = $_POST['trader_city'];

		$insert_traders = oci_parse($connection, "insert into trader (traderId,
														firstName, 
														lastName, 
														age, 
														sex, 
														email,
														password,
														phone,
														address,
														city
														) values(
														seqTrader.nextVal, 
														'$traderFirstName', 
														'$traderLastName', 
														'$traderAge', 
														'$traderSex',
														'$traderEmail',
														'$traderPassword',
														'$traderPhone',
														'$traderAddress',
														'$traderCity'
														)");


		// $stid = oci_parse($connection, "insert into try values(seqCustomer.nextVal, '$names[$namecount]')");
                if (!$insert_traders) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // Perform the logic of the query
                $r = oci_execute($insert_traders);
                if (!$r) {
                    $e = oci_error($insert_traders);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                
				echo "<script>window.open('view_traders.php', '_self')</script>";

                oci_free_statement($insert_traders);    

		// $insert_prod = mysqli_query($con, $insert_traders);
		// if ($insert_prod) {
		// 	echo "<script>alert('Traders Has Been Inserted!')</script>";
		// 	// echo "<script>window.open('index.php?insert_traders', '_self')</script>";
		// }
	}
	oci_close($connection);

?>
