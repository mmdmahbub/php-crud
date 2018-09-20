<?php
	ob_start();
	session_start();
	if(!isset($_SESSION['crud_user'])){
		header('location: login.php');
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>PHP Cruds - Procedural</title>
	<meta name="description" content="Focus is a Well organized and easy to understand school management application for kinder garden and high schools"/>
	<link rel="icon" href="public/images/icon2.png" />
	<!-- Bootstrap v-3.7 -->
	<link rel="stylesheet" href="public/css/bootstrap.min.css" />
	<!-- Google Fonts -->
	<link href="public/fonts/roboto.css" rel="stylesheet">
	<!-- Font-Awesome -->
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="public/css/animate.css" />
	<!--  main css -->
	<link rel="stylesheet" href="public/css/style.css" />
	<link rel="stylesheet" href="public/css/responsive.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


	<!-- ck editor
	<script src="http://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	-->
	<script src="public/js/jquery-1.9.1.min.js"></script>
	<script src="public/js/bootstrap-datepicker.min.js"></script>
	
</head>
<body>
