<?php
session_start();

unset($_SESSION['login_gmail_username']);

unset($_SESSION['login_fullname']);
unset($_SESSION['mobile_no2']);

header('location:register_website.php');
die();


?>