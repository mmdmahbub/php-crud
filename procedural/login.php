<?php
	require_once('config/config.php');
	ob_start();
	session_start();
	if(isset($_SESSION['crud_user'])){
		header('location: index.php');
	}
	$msg = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = htmlentities($_POST['email'],ENT_QUOTES);
		$pass  = $_POST['pass'];
		
		if(empty($email)){
			$msg .= "<li>". "Email field is empty" . "</li>";
		}elseif(!preg_match('/^[0-9-a-z]+@+[0-9-a-z].+[a-z]{2,10}$/i',$email)){
			$msg .= "<li>". "Email is not valid" . "</li>";
		}
		
		if(empty($pass)){
			$msg .= "<li>". "Password field is empty" . "</li>";
		}
		
		$password = md5($pass);
		$sel   = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$qri   = mysqli_query($con,$sel);
		$res   = mysqli_fetch_array($qri);
		
		$_SESSION['crud_user'] =  $res['id'];
		$count = mysqli_num_rows($qri);
		
		if(!$msg){
			if($count > 0){
				header('location: index.php');
			}else{
				$msg .= "<li>". "Email or password is not valid" . "</li>";
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
				<a href="register.php" class="btn btn-default btn-login">Register</a>
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
				<h4 style="text-transform: uppercase">Sign In</h4>
				<div id="" class="error_msg">
					<div id="loader" class="" style=""><img src="preloader.gif" alt="" /></div>
					<?= $msg; ?>
				</div>
				<div class="login_error_msg"></div>
				<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<input type="email" placeholder="Email/User Name" name="email" id="user_email" />
					<input type="password" placeholder="Password" name="pass" id="user_pass" />
					<br />
					<input type="submit" class="btn btn-info" value="login" id="btn_login" name="btn_login">
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
