<?php
require('connection.php');

if (isset($_POST['killlogin'])){

	$loginmail = $_POST['loginmail'];
	$loginpass = $_POST['loginpass'];


echo "hi";
	



	$display_login_users = "SELECT * FROM `users_register`";
	$result4 = mysqli_query($con, $display_login_users);
	$display_category_rows4 = mysqli_num_rows($result4);

	for ($i = 0; $i < $display_category_rows4; $i++) {
		$data = mysqli_fetch_assoc($result4);


		$fullname_login = $data['fullname'];
		$gmail_register_login = $data['gmail_register'];
		$password_user_login = $data['password_user'];

		echo  $data['password_user'];

	}
}



?>