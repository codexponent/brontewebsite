<?php

    $username = 'bronte';
    	$password = 'bronte';
        $connection_string = 'localhost/xe';
        $connection = oci_connect($username, $password, $connection_string);
            if (!$connection){
                echo 'Connection failed';
            }

    $customerId = $_GET['customer_id'];
    $productId = $_GET['product_id'];
    $delete_cart = oci_parse($connection, "DELETE FROM cart WHERE customerId='$customerId' AND productId='$productId' ");
    
    if (!$delete_cart) {
        $e = oci_error($connection);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $r = oci_execute($delete_cart);
        if (!$r) {
            $e = oci_error($delete_cart);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    
    oci_free_statement($delete_cart);
    oci_close($connection);
    
    echo "<script>window.open('../cart.php', '_self')</script>";

?>