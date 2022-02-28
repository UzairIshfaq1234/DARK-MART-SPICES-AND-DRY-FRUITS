<?php
session_start();
require('connection.php');
require('function_inc.php');


if (isset($_GET['product']) and $_GET['product'] != "") {

  $producttocart = $_GET['product'];
}

$username=$_SESSION['login_gmail_username'] ;




   if(isset($_SESSION['login_gmail_username'] ) &&  $_SESSION['login_gmail_username']!='')
   {
     echo " cart addaed!";
     $cart_added = "INSERT INTO `cart` (`productidcart`, `username`, `qty`) VALUES ('$producttocart', '$username', '1');";
     $result = mysqli_query($con, $cart_added);

     if($result)
     {
       header("location:add_to_cart.php");
     }



   }
   else{

    header('location:register_website.php');
    die();   

}




?>