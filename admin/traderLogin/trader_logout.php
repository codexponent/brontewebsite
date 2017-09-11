<?php
	session_start();
	session_destroy();
	echo "<script>window.open('trader_login.php', '_self')</script>";
?>