<!DOCTYPE html>
<?php
		session_start();
    	$username = 'bronte';
    	$password = 'bronte';
        $connection_string = 'localhost/xe';
        $connection = oci_connect($username, $password, $connection_string);
            if (!$connection){
                echo 'Connection failed';
            }

			//Role Defining
			$role = $_SESSION['role'];
            // echo $role

            if ($role == "admin"){
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
            }else{
                $i = 0;
				$stid = oci_parse($connection, 'SELECT * FROM trader');
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
							$traderEmail = $row["EMAIL"];
                            $temp = 0;
                        }
                    }
                    // print "</tr>\n";
				$i++;
				}
                
                oci_free_statement($stid);
            }

			//Role Defining

	$shopId = "";
	$shopName = "";

	if (isset($_GET['edit_shops'])) {
		$get_id = $_GET['edit_shops'];	//shopId

		$stid = oci_parse($connection, "SELECT * FROM SHOP where SHOPID='$get_id'");
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
							$shopId = $row["SHOPID"];
							$shopName = $row["SHOPNAME"];
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
                    <span><?php if ($role == 'admin'){echo $adminEmail;} else {echo $traderEmail;} ?></span>
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
                    <a href="#" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Shops</a>
                    <a href="../login/admin_logout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
      </div>
    </div>
<br/><br/><br/><br/>
<h2 style="text-align: center;" >Update Shop </h2>  

<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<form action="edit_shops.php?view_shops=<?php echo $_GET['view_shops']; ?>&edit_shops=<?php echo $_GET['edit_shops']; ?>" method="post" enctype="multipart/form-data" class="mui-form" >	<!-- enctype for various form's of data -->
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="trader_id" value="<?php echo $_GET['view_shops']; ?>" hidden>
    				<label>Trader ID:</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="shop_id" value="<?php echo $_GET['edit_shops']; ?>" hidden >
    				<label>Shop ID:</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="shop_name" value="<?php echo $shopName; ?>" required>
    				<label>Shop Name</label>
  				</div>
					<button type="submit" name="update_post" class="mui-btn mui-btn--raised">Submit</button>
			
		</form>


</div>


    </body>
</html>

<?php

    $username = 'bronte';
    	$password = 'bronte';
        $connection_string = 'localhost/xe';
        $connection = oci_connect($username, $password, $connection_string);
            if (!$connection){
                echo 'Connection failed';
            }

	if (isset($_POST['update_post']) ) {

		$shopIdN = $_GET['edit_shops'];     //getting te data from url
		$shopNameN = $_POST['shop_name'];   //posting the data throught file

        $stid = oci_parse($connection, "UPDATE shop SET shopName = '$shopNameN' WHERE shopId = '$shopIdN'");
		
        
                if (!$stid) {
                    $e = oci_error($connection);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // Perform the logic of the query
                $r = oci_execute($stid);
                if (!$r) {
                    $e = oci_error($stid);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

				echo "<script>window.history.back();</script>";
				
				oci_free_statement($stid); 
				oci_close($connection);	
				
	}
	
?>
