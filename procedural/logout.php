<?php

	session_start();
	if (!isset($_SESSION['crud_user'])) {
		header("Location: login.php");
	} else if(isset($_SESSION['crud_user']) != "") {
		header("Location: index.php");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['crud_user']);
		session_unset();
		session_destroy();
		header("Location: login.php");
		exit;
	}
?>