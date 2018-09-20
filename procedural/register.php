<?php
	require_once('config/config.php');
	//Error msg
	$msg = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Inital form fileds
		$name     = htmlentities($_POST['name'],ENT_QUOTES);
		$email 	  = htmlentities($_POST['email'],ENT_QUOTES);
		$pass     = $_POST['pass'];
		$repass   = $_POST['repass'];
		
		//Validation
		if(empty($name)){
			$msg .= "<li>"."Name should not be empty"."</li>";
		}elseif(!preg_match('/^[0-9-a-z-A-z- ]+$/i',$pass)){
			$msg .= "<li>"."Only numbers and charcters are allowed"."</li>";
		}
		
		if(empty($_POST['email'])){
			$msg .= "<li>"."Email should not be empty"."</li>";
		}elseif(!preg_match('/^[a-z0-9\_\.\]+@[a-z0-9]+.[a-z]{2,10}$/i',$email)){
			$msg .= "<li>"."Invalid Email"."</li>";
		}else{
			$chkEmail = "SELECT email FROM users WHERE email='$email'";
			$query	  = mysqli_query($con,$chkEmail);
			$count    = mysqli_num_rows($query);
			if($count > 0){
				$msg .= "<li>"."Email is already in use"."</li>";
			}
		}
		
		
		if(strlen($pass) <= 6 ){
			$msg .= "<li>"."Password must be more then 6 characters"."</li>";
		}elseif($pass !== $repass){
			$msg .= "<li>"."Password does not matched"."</li>";
		}
		$password = md5($pass);
		
		if(!$msg){
			
			$insert = "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')";
			if(mysqli_query($con,$insert)){
				$msg .= "<li>"."Successfully Registered"."</li>";
			}else{
				$msg .= "<li>"."Failed to  Registered"."</li>";
			}
			
		}
		
		
		
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Focus | login</title>
	<link rel="icon" href="public/images/icon2.png" />
	<!-- Bootstrap v-3.7 -->
	<link rel="stylesheet" href="public/css/bootstrap.min.css" />
	<!-- Google Fonts -->
	<link href="public/fonts/roboto.css" rel="stylesheet">
	<!-- Font-Awesome -->
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<!--  main css -->
	<link rel="stylesheet" href="public/css/style.css" />
	<link rel="stylesheet" href="public/css/responsive.css" />
	<script src="public/js/jquery-1.9.1.min.js"></script>
</head>
<body>
<header class="login_header">
	<div class="container">
		<div class="col-md-3 col-xs-3">
			<a href="index.php">
				<div class="logo">
					<!-- <img src="public/images/branding.png" alt="" /> -->
					PHP Crud
				</div>
			</a>
		</div>
		<div class="col-md-9 col-xs-9">
			<div class="text-right">
				<a href="login.php" class="btn btn-default btn-login">Login</a>
			</div>
		</div>

	</div>
</header>
<div class="login_wrapper">
	<div class="left_side_bg" style="background: url('public/images/blog-post-3.jpg');
	background-size: cover;">
		<div class="bg_overlay"></div>
	</div>
	<div class="right_side">
		<div class="sign_up" >
			<div class="sign_up_wrapper">
				<h4 style="text-transform: uppercase">Sign Up</h4>
				<div id="login_error" class="login_error">
					<div id="loader" class="" style=""><img src="preloader.gif" alt="" /></div>
					<div class="error_msg">
						<?= $msg; ?>
					</div>
				</div>
				<div class="login_error_msg"></div>
				<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
					<input type="text" placeholder="Full Name" name="name" id="name" />
					<input type="email" placeholder="Email" name="email" id="email" />
					<input type="password" placeholder="Password" name="pass" id="pass" />
					<input type="password" placeholder="Re-type Password" name="repass" id="repass" />
					<br />
					<input type="submit" class="btn btn-info" value="Register" id="btn_login" name="btn_login">
				</form>
				<div class="divider">
					<h5 class="">
						<a href="reset.php" class="">Forgot password ?</a>
					</h5>
				</div>
				<div class="line">
					Powered by <a href="https://royalancer.com">Royalancer</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
