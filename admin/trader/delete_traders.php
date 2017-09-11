<?php 
	session_start();
?>

<?php
	

    
	// include("includes/databaseConnection.php");
            //<Connection.php> Here
            $username = 'bronte';
            $password = 'bronte';
            $connection_string = 'localhost/xe';
            $connection = oci_connect($username, $password, $connection_string);
            If (!$connection){
                echo 'Connection failed';
            }

	if(isset($_GET['delete_traders'])){
		$delete_id = $_GET['delete_traders'];
		// $delete_traders = "delete from trader where TRADERID = '$delete_id'";
		// $run_delete = mysqli_query($con, $delete_traders);

		$stid = oci_parse($connection, "DELETE FROM trader WHERE TRADERID = '$delete_id'");
                if (!$stid) {
                    $e = oci_error($conn);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                // Perform the logic of the query
                $r = oci_execute($stid);
                if (!$r) {
                    $e = oci_error($stid);
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }else{
					echo "<script>alert('A trader has been deleted!')</script>";
				}
                echo "<script>window.open('view_traders.php', '_self')</script>";
				oci_free_statement($stid);
				oci_close($connection); 


		// if($run_delete){
		// 	echo "<script>alert('A trader has been deleted!')</script>";
		// 	echo "<script>window.open('index.php?view_traders', '_self')</script>";
		// }

	}

?>