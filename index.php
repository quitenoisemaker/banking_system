

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <title>Lloyldbank | Bank with a difference.</title>
  

    <!-- Favicons-->
    <link rel="shortcut icon" href="lloyldbank.png" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="lloyldbank.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

	<!-- ALTERNATIVE COLORS CSS -->
	<link href="#" id="colors" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
	
	<?php
include ("function/function.php");
session_start();
if (isset($_POST['login'])) {
	$user_email=$_POST['email'];
	$user_pass=$_POST['pass'];
	$status=0;
	$sql = $conn->prepare("select * from customer where email = ? and status=?");
	$sql->bind_param("si",$user_email,$status);
	$sql->execute();
	$result = $sql->get_result();

	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			if ($user_pass === $row["password"]) {
					$_SESSION['user_email']=$user_email;
	        echo "<script>swal({
  				title: 'You've Login Successfully,
  				icon: 'success',
  				button: 'Ok!',
				})</script>";
	        // echo "<script>window.open('index.php','_self')</script>";
	        header('location:user_section/user_account.php');
			}else{

					echo "<script>swal({
  				title: 'Email/Password combination is incorrect, pls try again',
  				icon: 'warning',
  				button: 'Ok!',
				})</script>";
			}
		
		}
	}


 }
 elseif ($_SESSION['user_email']=@$user_email) {
	header('location:index.php');
}

?>
	<div id="page">
		
	<?php  ?>
	<!-- /header -->
		
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Login</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60">
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Already Client</h3>
					<form action="" method="POST">
					<div class="form_container">
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="pass" id="pass" value="" placeholder="Password*">
						</div>
						<div class="clearfix add_bottom_15">
							<div class="checkboxes float-left">
								<label class="container_check">Remember me
									<input type="checkbox">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="float-right"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
						</div>
						<div class="text-center"><input type="submit" name="login" value="Log In" class="btn_1 full-width"></div>
						<div id="forgot_pw">
							<form action="" method="post">
							<div class="form-group">
								<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
							</div>
							<p>A new password will be sent shortly.</p>
							<div class="text-center"><input type="submit" name="resetpass" value="Reset Password" class="btn_1"></div>
							</form>
							<?php

							if (isset($_POST['resetpass'])) {
								$email=$_POST['email_forgot'];
								$sql = $conn->prepare("select * from user where email = ?");
								$sql->bind_param("s",$email);
								$sql->execute();
								$result = $sql->get_result();
								if ($result->num_rows>0) {
							$str="123456789qwertyuiopkjhgafdsmncxc";
							$str=str_shuffle($str);
							$str=substr($str, 0, 10);
							$url="http://osazuwa.com/resetpassword.php?token=$str&email=$email";
								mail($email, "Reset Password", "To reset password please visit this: $url", "from: info@isazuwa.com\r\n");
								$sql = $conn->prepare("UPDATE user SET token=? WHERE email=?");
      							$sql->bind_param("ss",$str, $email);
      							if ($sql->execute()) {
      								echo "<script>swal('Please check your email')</script>";
      							}
								}else{
									echo "<script>swal({
  									title: 'Pls check your input',
  									icon: 'warning',
  									button: 'Ok!',
									})</script>";
								}
							}
							?>
						</div>
						<div class="text-center add_top_10">New to our Bank? <strong><a href="#">Open an account!</a></strong></div>
					</div>
				</form>

					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<div class="row hidden_tablet">
					<div class="col-md-6">
						<ul class="list_ok">
							
							<li>Quality Bank check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
	<?php  ?>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="register.html">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>

	<!-- COLOR SWITCHER  -->
<!-- 	<script src="js/switcher.js"></script>
	<div id="style-switcher">
		<h6>Color Switcher <a href="#"><i class="ti-settings"></i></a></h6>
		<div>
			<ul class="colors" id="color1">
				<li><a href="#" class="default" title="Default"></a></li>
				<li><a href="#" class="aqua" title="Aqua"></a></li>
				<li><a href="#" class="green_switcher" title="Green"></a></li>
				<li><a href="#" class="orange" title="Orange"></a></li>
				<li><a href="#" class="beige" title="Beige"></a></li>
				<li><a href="#" class="gray" title="Gray"></a></li>
				<li><a href="#" class="green-2" title="Green"></a></li>
				<li><a href="#" class="navy" title="Navy"></a></li>
				<li><a href="#" class="peach" title="Peach"></a></li>
				<li><a href="#" class="purple" title="Purple"></a></li>
				<li><a href="#" class="red" title="Red"></a></li>
				<li><a href="#" class="violet" title="Violet"></a></li>
			</ul>
		</div>
	</div> -->
  
</body>


</html>