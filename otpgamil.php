
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

			$otpcreation = rand(1, 999999);

			$_SESSION['user_otp'] = rand(1, 999999);
			if ($_SESSION['user_otp'] and  $_SESSION['user_otp'] != "")
			{

				echo  $_SESSION['user_otp'];
				$sentotpcofirm2 = "OTP sent! Check your email. And fill Data again";

				$sentinggamil="uzairishfaq1234@gmail.com";
				$name="M uzair ishfaq";
				
				$mobile="03445774468";
				
				
				$html12="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>Uzairishfaq@gmail</td></tr><tr><td>Mobile</td><td>$mobile</td></tr><tr><td>Comment</td><td>done finaly</td></tr></table>";
					
					include('smtp/PHPMailerAutoload.php');
					$mail=new PHPMailer(true);
					$mail->isSMTP();
					$mail->Host="smtp.gmail.com";
					$mail->Port=587;
					$mail->SMTPSecure="tls";
					$mail->SMTPAuth=true;
					$mail->Username="uzairishfaq12345@gmail.com";
					$mail->Password="uzair12345";
					$mail->SetFrom("uzairishfaq12345@gmail.com");
					$mail->addAddress($sentinggamil);
					$mail->IsHTML(true);
					$mail->Subject="New Contact Us";
					$mail->Body=$html12;
					$mail->SMTPOptions=array('ssl'=>array(
						'verify_peer'=>false,
						'verify_peer_name'=>false,
						'allow_self_signed'=>false
					));
					if($mail->send()){
						echo "Mail send";
					}else{
						echo "Error occur";
					}





			} 
			else 
			{
				$erroeotp2 = "OTP Error! Try again";
				unset($_SESSION['user_otp']);
			}
		}
	}
}
