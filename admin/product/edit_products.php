<!DOCTYPE html>
<?php
	// Getting the id when the corresponding edit link is clicked
	session_start();
    	$username = 'bronte';
    	$password = 'bronte';
        $connection_string = 'localhost/xe';
        $connection = oci_connect($username, $password, $connection_string);
            if (!$connection){
                echo 'Connection failed';
            }
	$productId = "";
    $productCategory = "";
	$productName = "";
	$productImage = "";
	$productDescription =  "";
	$productQuantity = "";
	$productStock = "";
	$productMinOrder = "";
	$productMaxOrder = "";
	$productPrice = "";

	if (isset($_GET['edit_products'])) {
		$get_id = $_GET['edit_products'];

		$stid = oci_parse($connection, "SELECT * FROM PRODUCT where PRODUCTID='$get_id'");
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
                            $temp = 0;
                        }
                    }
				}
				oci_free_statement($stid);
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
<h2 style="text-align: center;" >Update Trader </h2>  

<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<form action="edit_products.php?edit_products=<?php echo $_GET['edit_products']; ?>" method="post" enctype="multipart/form-data" class="mui-form" >	<!-- enctype for various form's of data -->
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_id" value="<?php echo $productId; ?>" hidden >
    				<label>Product ID:</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_category" value="<?php echo $productCategory; ?>" required>
    				<label>Category</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_title" value="<?php echo $productName; ?>" required>
    				<label>Title</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
					<img src="product_images/<?php echo $productImage; ?>" width="50" height="50"> 
    				<input type="file" name="product_image" >
    				<label>Image</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<textarea name="product_description"  required><?php echo $productDescription; ?></textarea>
    				<label>Description</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_quantity" value="<?php echo $productQuantity; ?>" required>
    				<label>Quantity</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_stock" value="<?php echo $productStock; ?>" required>
    				<label>Stock</label>
  				</div>
				  <div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_min_order" value="<?php echo $productMinOrder; ?>" required>
    				<label>Min Order</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_max_order" value="<?php echo $productMaxOrder; ?>" required>
    				<label>Max Order</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_price" value="<?php echo $productPrice; ?>" required>
    				<label>Price</label>
  				</div>
					<button type="submit" name="update_post" class="mui-btn mui-btn--raised">Submit</button>
		</form>
</div>


    </body>
</html>


<?php
	if (isset($_POST['update_post']) ) {

		$productIdN = $_POST['product_id'];
		$productCategoryN = $_POST['product_category'];
		$productNameN = $_POST['product_title'];

		//For Image
		$productImageN = $_FILES['product_image']['name']; 
		$productImageTmpN = $_FILES['product_image']['tmp_name'];
		move_uploaded_file($productImageTmpN, "product_images/$productImageN"); 

		$productDescriptionN =  $_POST['product_description'];
		$productQuantityN = $_POST['product_quantity'];
		$productStockN = $_POST['product_stock'];
		$productMinOrderN = $_POST['product_min_order'];
		$productMaxOrderN = $_POST['product_max_order'];
		$productPriceN = $_POST['product_price'];

		$update_products = oci_parse($connection, "UPDATE product SET productCategory = '$productCategoryN', 
		productName = '$productNameN', 
		productImage = '$productImageN', 
		productDescription = '$productDescriptionN', 
		productQuantity = '$productQuantityN', 
		productStock = '$productStockN', 
		productminOrder = '$productMinOrderN', 
		productmaxOrder = '$productMaxOrderN', 
		productPrice = '$productPriceN' 
		WHERE 
		productId = '$productIdN'");	

                if (!$update_products) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                $r = oci_execute($update_products);
                if (!$r) {
                    $e = oci_error($update_products);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
				echo "<script>window.history.back();</script>";
				oci_free_statement($update_products); 
				oci_close($connection);
	}
	

?>
