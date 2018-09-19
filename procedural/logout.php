<?php
	session_start();
	$get = $_GET['logout'];
	
	if(!isset($_SESSION['user'])){
		header("location: index.php");
	}elseif (isset($_SESSION['user']) != "" ) {
		header("Location: index.php");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: login.php");
		exit;
	}