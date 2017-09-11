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
            //<Connection.php> Here
            $username = 'bronte';
            $password = 'bronte';
            $connection_string = 'localhost/xe';
            $connection = oci_connect($username, $password, $connection_string);
            If (!$connection){
                echo 'Connection failed';
            }

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
                    <a href="../login/admin_logout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
      </div>
    </div>

<br/><br/><br/><br/>

<h2 style="text-align: center;" >Insert Product </h2>  





<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<form action="insert_products.php?view_shops=<?php echo $_GET['view_shops']; ?>&view_products=<?php echo $_GET['view_products']; ?>" method="post" enctype="multipart/form-data" class="mui-form" >	<!-- enctype for various form's of data -->
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_category" required>
    				<label>Category</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_title" required >
    				<label>Name</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="file" name="product_image" >
    				<label>Image</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
					<textarea name="product_description" required></textarea>
					<label>Description</label>
				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_quantity" required >
    				<label>Quantity</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_stock" required >
    				<label>Stock</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_min_order" required >
    				<label>Minimum Order</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_max_order" required >
    				<label>Maximum Order</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_price" required >
    				<label>Price</label>
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

	$trader_id = $_GET['view_shops'];
	$shop_id = $_GET['view_products'];

	echo "Trader id is: " . $trader_id;
	echo "Shop id is: " . $shop_id;

	$insert_products = null;
	if (isset($_POST['insert_post'])) {
		//getting the text data from the fields
		$product_category = $_POST['product_category'];
		$product_title = $_POST['product_title'];

		//getting the image from the fields
		$product_image = $_FILES['product_image']['name']; //['name'], we only need the name;
		$product_image_tmp = $_FILES['product_image']['tmp_name']; //['tmp_name'], for copying the image name;
		move_uploaded_file($product_image_tmp, "product_images/$product_image"); //(temporary filename, destination)

		$product_description = $_POST['product_description'];
		$product_quantity = $_POST['product_quantity'];
		$product_stock = $_POST['product_stock'];
		$product_min_order = $_POST['product_min_order'];
		$product_max_order = $_POST['product_max_order'];
		$product_price = $_POST['product_price'];

		$insert_products = oci_parse($connection, "insert into product (productId,
														productCategory, 
														productName, 
														productImage, 
														productDescription, 
														productQuantity,
														productStock,
														productminOrder,
														productmaxOrder,
														productPrice,
														traderId,
														shopId
														) values(
														seqProduct.nextVal, 
														'$product_category', 
														'$product_title', 
														'$product_image', 
														'$product_description',
														'$product_quantity',
														'$product_stock',
														'$product_min_order',
														'$product_max_order',
														'$product_price',
														'$trader_id',
														'$shop_id'
														)");


		// $stid = oci_parse($connection, "insert into try values(seqCustomer.nextVal, '$names[$namecount]')");
                if (!$insert_products) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // Perform the logic of the query
                $r = oci_execute($insert_products);
                if (!$r) {
                    $e = oci_error($insert_products);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
				echo "<script>window.open('view_products.php?view_shops=$trader_id&view_products=$shop_id', '_self')</script>";
                
                oci_free_statement($insert_products);    

		// $insert_prod = mysqli_query($con, $insert_products);
		// if ($insert_prod) {
		// 	echo "<script>alert('Products Has Been Inserted!')</script>";
		// 	// echo "<script>window.open('index.php?insert_products', '_self')</script>";
		// }
	}
	oci_close($connection);

?>
