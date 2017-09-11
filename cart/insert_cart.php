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
    echo "Customer Id: " . $customerId . "<br />";
    echo "Product Id: " . $productId . "<br />";
    $insert_cart = oci_parse($connection, "INSERT INTO cart (cartId,
                                                            quantity,
                                                            customerId, 
                                                            productId) VALUES (seqCart.nextVal,
                                                                                '0',
                                                                                '$customerId',
                                                                                '$productId')");
    
    if (!$insert_cart) {
        $e = oci_error($connection);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $r = oci_execute($insert_cart);
        if (!$r) {
            $e = oci_error($insert_cart);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    
    oci_free_statement($insert_cart);
    oci_close($connection);
    
    echo "<script>window.open('../products.php', '_self')</script>";
    // header('location: ', $_SERVER['HTTP_REFERER']);

?>