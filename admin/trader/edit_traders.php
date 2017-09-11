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


		<?php

		$traderId = "";
	$traderFirstName = "";
	$traderLastName = "";
	$traderAge = "";
	$traderSex = "";
	$traderEmail = "";
	$traderPhone = "";
	$traderAddress = "";
	$traderCity = "";

	// $h_id = "";
	// $h_title = "";
	// $h_keyword = "";
	// $h_short_description = "";
	// $h_description = "";

	if (isset($_GET['edit_traders'])) {
		$get_id = $_GET['edit_traders'];

		$stid = oci_parse($connection, "SELECT * FROM TRADER where TRADERID='$get_id'");
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
							$traderId = $row["TRADERID"];
							$traderFirstName = $row["FIRSTNAME"];
							$traderLastName = $row["LASTNAME"];
							$traderAge = $row["AGE"];
							$traderSex = $row["SEX"];
							$traderEmail = $row["EMAIL"];
							$traderPhone = $row["PHONE"];
							$traderAddress = $row["ADDRESS"];
							$traderCity = $row["CITY"];
                            $temp = 0;
                        }
                    }
				}
				oci_free_statement($stid);
				oci_close($connection); 
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

<h2 style="text-align: center;" >Update Trader </h2>  


<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<form action="edit_traders.php" method="post" enctype="multipart/form-data" class="mui-form" >	<!-- enctype for various form's of data -->
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_id" value="<?php echo $traderId; ?>" hidden>
    				<label>Trader ID:</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_first_name" value="<?php echo $traderFirstName; ?>" required>
    				<label>First Name</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_last_name" value="<?php echo $traderLastName; ?>" required >
    				<label>Last Name</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="trader_age" <?php echo $traderAge; ?> required>
    				<label>Age</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_sex" <?php echo $traderSex; ?> required>
    				<label>Sex</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="email" name="trader_email" value="<?php echo $traderEmail; ?>" required>
    				<label>Email</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="trader_phone"  value="<?php echo $traderPhone; ?>" required>
    				<label>Phone</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_address" value="<?php echo $traderAddress; ?>" required>
    				<label>Address</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_city" value="<?php echo $traderCity; ?>" required>
    				<label>City</label>
  				</div>
					<button type="submit" name="update_post" class="mui-btn mui-btn--raised">Submit</button>

			
		</form>


</div>


    </body>
</html>

<?php

	if (isset($_POST['update_post']) ) {
		
		$traderIdN = $_POST['trader_id'];
		$traderFirstNameN = $_POST['trader_first_name'];
		$traderLastNameN = $_POST['trader_last_name'];
		$traderAgeN = $_POST['trader_age'];
		$traderSexN = $_POST['trader_sex'];
		$traderEmailN = $_POST['trader_email'];
		$traderPhoneN = $_POST['trader_phone'];
		$traderAddressN = $_POST['trader_address'];
		$traderCityN = $_POST['trader_city'];

		$update_traders = oci_parse($connection, "UPDATE trader SET firstName = '$traderFirstNameN', 
		lastName = '$traderLastNameN', 
		age = '$traderAgeN', 
		sex = '$traderSexN', 
		email = '$traderEmailN', 
		phone = '$traderPhoneN', 
		address = '$traderAddressN', 
		city = '$traderCityN' 
		WHERE 
		traderId = '$traderIdN'");

                if (!$update_traders) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // Perform the logic of the query
                $r = oci_execute($update_traders);
                if (!$r) {
                    $e = oci_error($update_traders);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
				echo "<script>window.open('view_traders.php', '_self')</script>";
				oci_free_statement($update_traders); 
				oci_close($connection);
	}

?>
