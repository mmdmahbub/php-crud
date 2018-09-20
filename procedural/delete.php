<?php
	require_once('config/config.php');
	$id = $_GET['d'];
	$delete = "DELETE FROM blog_post WHERE id='$id'";
	if(mysqli_query($con,$delete)){
		header('location: index.php');
	}
	