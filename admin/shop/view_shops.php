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
        

            $trader_id = $_GET['view_shops'];
            // echo "Trader Id is: " . $trader_id;
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
                    <a href="
                    
                    <?php

                    if ($trader_id == 1){
                        echo "http://127.0.0.1:8080/apex/f?p=101:1:3540082686710342:::::";
                        }elseif ($trader_id == 2){
                            echo "http://127.0.0.1:8080/apex/f?p=103:1:3540082686710342:::::";
                        }elseif ($trader_id == 3){
                            echo "http://127.0.0.1:8080/apex/f?p=104:1:3540082686710342:::::";
                        }elseif ($trader_id == 4){
                            echo "http://127.0.0.1:8080/apex/f?p=105:1:3540082686710342:::::";
                        }elseif ($trader_id == 5){
                            echo "http://127.0.0.1:8080/apex/f?p=106:1:2531971788996971:::::";
                        }elseif ($trader_id == 6){
                            echo "http://127.0.0.1:8080/apex/f?p=107:1:6007224321927178:::::";
                        }elseif ($trader_id == 7){
                            echo "http://127.0.0.1:8080/apex/f?p=108:1:6007224321927178:::::";
                        }
                    ?>

                    " class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">event</i>Report</a>
                    <a href="insert_shops.php?view_shops=<?php echo $trader_id; ?>" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">insert_drive_file</i>Insert Shops</a>
                    <a href="../login/admin_logout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
      </div>
    </div>
<br/><br/><br/><br/>
<h2 style="text-align: center;" >Shop List </h2>  
<div style="margin-left: 40%;" >
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th>S.No</th>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
	  <th class="mdl-data-table__cell--non-numeric">Products</th>
	  <th class="mdl-data-table__cell--non-numeric">Update</th>
	  <th class="mdl-data-table__cell--non-numeric">Delete</th>
    </tr>
  </thead>
  <tbody>

		<?php 			
				$i = 0;   
				$stid = oci_parse($connection, "SELECT * FROM shop WHERE traderId = '$trader_id' ");

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
                    // print "</tr>\n";
				$i++;
		?>
          <tr>
	        <td><?php echo $i; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $shopName; ?></td>
	        <td class="mdl-data-table__cell--non-numeric"><a href="../product/view_products.php?view_shops=<?php echo $trader_id; ?>&view_products=<?php echo $shopId; ?>">Products</a></td>
	        <td class="mdl-data-table__cell--non-numeric"><a href="edit_shops.php?view_shops=<?php echo $trader_id; ?>&edit_shops=<?php echo $shopId; ?>">Edit</a></td>
	        <td class="mdl-data-table__cell--non-numeric"><a href="delete_shops.php?delete_shops=<?php echo $shopId; ?>">Delete</a></td>	  
        </tr>

		<?php 
		  }
                oci_free_statement($stid);
				oci_close($connection); 
				?>	<!-- Closing of the while loop -->
 </tbody>
</table>
</div>

    </body>
</html>
	