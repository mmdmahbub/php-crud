<?php
	//Database credential
	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$db	  = "php_cruds";
	
	$con = mysqli_connect("$host","$user","$pass","$db");
	if(!$con){
		echo "Failed to connect";
	}
