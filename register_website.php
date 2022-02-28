<?php

require("menubar.php");
// error_reporting(0);


?>


<!-- ------------------- OTP GETTING -------------- -->
<!-- /////////////////////////////////////////////////// -->
<?php

$sentotpcofirm2 = "";
$erroeotp2 = "";
$completedata2 = "";
$exitsaccount = "";
if (isset($_POST['otpregister'])) {

	$fullname = $_POST['fullname'];
	$registeremail = $_POST['registeremail'];
	$mobileno = $_POST['mobileno'];
	$registerpassword = $_POST['registerpassword'];

	if ($fullname == "" or 	$registeremail == "" or 	$mobileno == "" or 	$registerpassword == "") {
		$completedata2 = "Complete Top 4 Feilds to get OTP";
	} else {




		$Category_check = "SELECT * FROM `users_register` WHERE `gmail_register` = '$registeremail'";
		$result = mysqli_query($con, $Category_check);
		$if_exits = mysqli_num_rows($result);

		if ($if_exits > 0) {
			$exitsaccount = "Account Already exits!";
		} else {

			// $otpcreation = rand(1, 999999);

			$_SESSION['user_otp'] = rand(1, 999999);
			$_SESSION['user_otp_gmail'] = $registeremail;

			if ($_SESSION['user_otp'] and  $_SESSION['user_otp'] != "") {

				// echo  $_SESSION['user_otp'];

				$senttouserotp =  $_SESSION['user_otp'];






				// $html12="<table><tr><td>Name</td><td>$fullname </td></tr><tr><td>Email</td><td>	$registeremail</td></tr><tr><td>Mobile</td><td>$mobileno</td></tr><tr><td>OTP CODE:</td><td>
				// $senttouserotp</td></tr></table>";

				$html12 =
					"<!doctype html>
				<html lang='en'>
				  <head>
					<!-- Required meta tags -->
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
				
					<!-- Bootstrap CSS -->
					<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
				
					<div class='card' style='width: 18rem;'>
					<div class='card-body'>
					  <h3 class='card-title'>$fullname your OTP</h3>
					  <h4 class='card-text'>Name: $fullname<br><br>Gmail: $registeremail<br><br>OTP CODE: $senttouserotp</h4>
					</div>
				  </div>
				
					<!-- Optional JavaScript; choose one of the two! -->
				
					<!-- Option 1: Bootstrap Bundle with Popper -->
					<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
				
					<!-- Option 2: Separate Popper and Bootstrap JS -->
					<!--
					<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js' integrity='sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN' crossorigin='anonymous'></script>
					<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js' integrity='sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/' crossorigin='anonymous'></script>
					-->
				  </body>
				</html>";

				include('smtp/PHPMailerAutoload.php');
				$mail = new PHPMailer(true);
				$mail->isSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587;
				$mail->SMTPSecure = "tls";
				$mail->SMTPAuth = true;
				$mail->Username = "uzairishfaq12345@gmail.com";
				$mail->Password = "uzair12345";
				$mail->SetFrom("uzairishfaq12345@gmail.com");
				$mail->addAddress($registeremail);
				$mail->IsHTML(true);
				$mail->Subject = "DARK CODERZ OTP";
				$mail->Body = $html12;
				$mail->SMTPOptions = array('ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => false
				));
				if ($mail->send()) {
					// echo "Mail send";
					$sentotpcofirm2 = "OTP sent! Check your email. And fill Data again";
				} 
				else {
					// echo "Error occur";
					$erroeotp2 = "OTP Error! Try again";
				}
			} else {
				$erroeotp2 = "OTP Error! Try again";
				unset($_SESSION['user_otp']);
			}
		}
	}
}




?>
<!-- -------------------ENDING  OTP GETTING -------------- -->

<!-- //////////////////// COMPLETEING REGISTERING /////////////////////////////// -->

<?php

$sentotpcofirm = "";
$erroeotp = "";
$sentotpcofirm23 = "";
$nooptmatch = "";
$completedata = "";
$nootpfound = "";
$password_exits_register = "";
// echo $_SESSION['user_otp'];

if (isset($_POST['submitregister'])) {

	$fullname = $_POST['fullname'];
	$registeremail = $_POST['registeremail'];
	$mobileno = $_POST['mobileno'];
	$registerpassword = $_POST['registerpassword'];
	$registerotp = $_POST['registerotp'];

	$checkotp = $_SESSION['user_otp'];


	$checkgmailuser = $_SESSION['user_otp_gmail'];

	if ($fullname == "" or 	$registeremail == "" or 	$mobileno == "" or 	$registerpassword == "" or 	$registerotp == "") {
		$completedata = "Complete All Feilds";
	} else {


		$Category_check = "SELECT * FROM `users_register` WHERE `password_user` = '$registerpassword'";
		$result = mysqli_query($con, $Category_check);
		$if_exits = mysqli_num_rows($result);

		if ($if_exits > 0) {
			$password_exits_register = "Use Strong Password!";
		} else {

			if (isset($_SESSION['user_otp']) &&   $_SESSION['user_otp'] != '' && $checkotp == $registerotp && $checkgmailuser ==	$registeremail) {

				$Category_query = "INSERT INTO `users_register` (`fullname`, `gmail_register`, `mobile_no`, `password_user`) VALUES ('$fullname', '$registeremail', '$mobileno', '$registerpassword');";
				$result = mysqli_query($con, $Category_query);



				// echo $fullname . "<br>";
				// echo 	$registeremail . "<br>";
				// echo 	$mobileno . "<br>";


				$html12 =
					"<!doctype html>
			<html lang='en'>
			  <head>
				<!-- Required meta tags -->
				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
			
				<!-- Bootstrap CSS -->
				<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
			
				<div class='card' style='width: 18rem;'>
				<div class='card-body'>
				  <h3 class='card-title'>DEAR $fullname ! WELCOME TO DARK CODERZ!</h3>
				  <h4 class='card-text'>Name:$fullname<br><br>Gmail:$registeremail<br><br>Mobile No:	$mobileno </h4>
				</div>
			  </div>
			
				<!-- Optional JavaScript; choose one of the two! -->
			
				<!-- Option 1: Bootstrap Bundle with Popper -->
				<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
			
				<!-- Option 2: Separate Popper and Bootstrap JS -->
				<!--
				<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js' integrity='sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN' crossorigin='anonymous'></script>
				<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js' integrity='sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/' crossorigin='anonymous'></script>
				-->
			  </body>
			</html>";

				include('smtp/PHPMailerAutoload.php');
				$mail = new PHPMailer(true);
				$mail->isSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587;
				$mail->SMTPSecure = "tls";
				$mail->SMTPAuth = true;
				$mail->Username = "uzairishfaq12345@gmail.com";
				$mail->Password = "uzair12345";
				$mail->SetFrom("uzairishfaq12345@gmail.com");
				$mail->addAddress($registeremail);
				$mail->IsHTML(true);
				$mail->Subject = "THANKS FOR REGISTERING TO DARK CODERZ ";
				$mail->Body = $html12;
				$mail->SMTPOptions = array('ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => false
				));
				if ($mail->send()) {
					// echo "Mail send";
					$sentotpcofirm23 = "Registered! Successfully";
				} else {
					// echo "Error occur";
					// $erroeotp2 = "OTP Error! Try again";

				}





				unset($_SESSION['user_otp']);
			} else {
				$nooptmatch = "OTP Error! Wrong OTP";
			}
		}
	}
}



?>

<!-- //////////////////// COMPLETEING REGISTERING END /////////////////////////////// -->
<?php
// require('connection.php');
$incoorectdata = "";

if (isset($_POST['killlogin'])) {

	$loginmail = $_POST['loginmail'];
	$loginpass = $_POST['loginpass'];


	if ($loginmail == " " or $loginpass == " ") {
		$login_empty_error = "Entre Complete login details";
	} else {
		$display_login_users = "SELECT * FROM `users_register`";
		$result4 = mysqli_query($con, $display_login_users);
		$display_category_rows4 = mysqli_num_rows($result4);

		for ($i = 0; $i < $display_category_rows4; $i++) {
			$data = mysqli_fetch_assoc($result4);


			$fullname_login = $data['fullname'];
			$gmail_register_login = $data['gmail_register'];
			$password_user_login = $data['password_user'];
			$mobile_no = $data['mobile_no'];


			$sql_login = "SELECT * FROM `users_register` WHERE `gmail_register`='$loginmail' AND `password_user`='$loginpass'";
			$res = mysqli_query($con, $sql_login);
			$count = mysqli_num_rows($res);

			if ($count > 0) {


				if ($loginmail == $gmail_register_login) {

					// header('location:/display_product_subcategory_touser.php');
					$_SESSION['login_gmail_username'] = $gmail_register_login;
					// echo 	$_SESSION['login_gmail_username'] ;
					// echo "<br>";

					$_SESSION['login_fullname'] = $fullname_login;
					// echo 	$_SESSION['login_fullname'] ;
					// echo "<br>";


					$_SESSION['mobile_no2'] = $mobile_no;
					// echo 	$_SESSION['mobile_no2'] ;
					// echo "<br>";

					echo "<script>

window.location.href='first_page.php';
				</script>";
				}
			} else {
				$incoorectdata = "Incorrect data!";
			}
		}
	}
}
?>

<body>



	<section class="htc__contact__area ptb--100 bg__white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="contact-form-wrap mt--60">
						<div class="col-xs-12">
							<div class="contact-title">
								<h2 class="title__line--6">Login</h2>
								<?php echo " <p class='info' style='color: red;margin-top:10px;font-weight:bold;'>$incoorectdata</p>"; ?>




							</div>
						</div>
						<div class="col-xs-12">
							<form action="register_website.php" method="post">
								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="loginmail" placeholder="Your gamil*" style="width:100%">
									</div>
								</div>

								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="loginpass" placeholder="Your password*" style="width:100%">
									</div>
								</div>


								<div class="contact-btn">
									<button name="killlogin" class="fv-btn">Login</button>
								</div>
							</form>


						</div>
					</div>

				</div>


				<div class="col-md-6">
					<div class="contact-form-wrap mt--60">
						<div class="col-xs-12">
							<div class="contact-title">
								<h2 class="title__line--6">Register</h2>
								<?php echo " <p class='info' style='color: green;margin-top:10px;font-size:20px;font-weight:bold;'>$sentotpcofirm23</p>"; ?>
								<?php echo " <p class='info' style='color: red;margin-top:10px;font-weight:bold;'>$nooptmatch</p>"; ?>
								<?php echo " <p class='info' style='color: green;margin-top:10px;font-size:20px;font-weight:bold;'>$sentotpcofirm2</p>"; ?>
								<?php echo " <p class='info' style='color: red;margin-top:10px;font-weight:bold;'>$completedata</p>"; ?>
								<?php echo " <p class='info' style='color: red;font-size:20px;margin-top:10px;font-weight:bold;'>$completedata2</p>"; ?>

								<?php echo " <p class='info' style='color: red;font-size:20px;margin-top:10px;font-weight:bold;'>$exitsaccount </p>"; ?>

								<?php echo " <p class='info' style='color: red;font-size:20px;margin-top:10px;font-weight:bold;'>$nootpfound </p>"; ?>

								<?php echo " <p class='info' style='color: red;font-size:20px;margin-top:10px;font-weight:bold;'>$password_exits_register </p>"; ?>
							</div>
						</div>
						<div class="col-xs-12">
							<form action="register_website.php" method="post">
								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="fullname" placeholder="Your Full Name*" style="width:100%">
									</div>
								</div>
								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="registeremail" onclick=otphide() placeholder="Your Email*" style="width:100%">
									</div>
								</div>
								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="mobileno" placeholder="Your Mobile*" style="width:100%">
									</div>
								</div>


								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="registerpassword" placeholder="Your Password*" style="width:100%">
									</div>
								</div>
								<div class="single-contact-form">
									<div class="contact-box name">
										<input type="text" name="registerotp" onclick=otphide12122() placeholder="Get Your OTP by clicking on button*" style="width:100%">
									</div>
								</div>


								<?php echo " <p class='info' style='color: lightgreen;margin-top:10px;font-weight:bold;'>$sentotpcofirm</p>"; ?>

								<?php echo " <p class='info' style='color: red;margin-top:10px;font-weight:bold;'>$erroeotp</p>"; ?>
								<?php echo " <p class='info' style='color: red;margin-top:10px;font-weight:bold;'>$erroeotp2</p>"; ?>



								<div class="contact-btn">
									<button id="otp_bero" onclick=otphide121() style="display: none;" class="fv-btn" type="submit" name="otpregister">getotp</button>
								</div>

								<div class="contact-btn">
									<button type="submit" name="submitregister" class="fv-btn">Register</button>
								</div>
							</form>
							<div class="form-output">
								<p class="form-messege"></p>
							</div>
						</div>
					</div>

				</div>







			</div>
	</section>
</body>
<script>
	function otphide() {
		document.getElementById("otp_bero").style.display = "block";
	}

	function otphide121() {
		document.getElementById("otp_bero").style.display = "none";

	}

	function otphide12122() {
		document.getElementById("otp_bero").style.display = "none";

	}
</script>

<?php

require("footer.php");

?>