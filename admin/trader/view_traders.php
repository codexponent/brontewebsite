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
                    <a href="insert_traders.php"class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">insert_drive_file</i>Insert Traders</a>
                    <a href="../login/admin_logout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
      </div>
    </div>
<br/><br/><br/><br/>
<h2 style="text-align: center;" >Trader List </h2>  
<div style="margin-left: 30%;" >
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
	  <th>S.No</th>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
	  <th>Age</th>
      <th class="mdl-data-table__cell--non-numeric">E-mail</th>
      <th class="mdl-data-table__cell--non-numeric">Phone</th>
	  <th class="mdl-data-table__cell--non-numeric">Address</th>
	  <th class="mdl-data-table__cell--non-numeric">City</th>
	  <th class="mdl-data-table__cell--non-numeric">Shops</th>
	  <th class="mdl-data-table__cell--non-numeric">Update</th>
	  <th class="mdl-data-table__cell--non-numeric">Delete</th>
    </tr>
  </thead>
  <tbody>



    <?php
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
							$traderId = $row["TRADERID"];
                            $traderFirstName = $row["FIRSTNAME"];
                            $traderLastName = $row["LASTNAME"];
							$traderAge = $row["AGE"];
							$traderSex =  $row["SEX"];
							$traderEmail = $row["EMAIL"];
							$traderPhone = $row["PHONE"];
							$traderAddress = $row["ADDRESS"];
							$traderCity = $row["CITY"];
                            $temp = 0;
                        }
                    }
                    // print "</tr>\n";
				$i++;
				
		?>

    <tr>
	  <td><?php echo $i; ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo $traderFirstName; ?> <?php echo $traderLastName; ?></td>
	  <td><?php echo $traderAge; ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo $traderEmail; ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo $traderPhone; ?></td>
	  <td class="mdl-data-table__cell--non-numeric"><?php echo $traderAddress; ?></td>
	  <td class="mdl-data-table__cell--non-numeric"><?php echo $traderCity; ?></td>
	  <td class="mdl-data-table__cell--non-numeric"><a href="../shop/view_shops.php?view_shops=<?php echo $traderId; ?>">Shops</a></td>
	  <td class="mdl-data-table__cell--non-numeric"><a href="edit_traders.php?edit_traders=<?php echo $traderId; ?>">Edit</a></td>
	  <td class="mdl-data-table__cell--non-numeric"><a href="delete_traders.php?delete_traders=<?php echo $traderId; ?>">Delete</a></td>	  
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