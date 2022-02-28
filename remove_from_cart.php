<?php
require("menubar.php");
$username = $_SESSION['login_gmail_username'];

if (isset($_GET['Removeid']) and $_GET['Removeid'] != "") {

    $Removeproduct = $_GET['Removeid'];


    $delete_cart_fully = "DELETE FROM `cart` WHERE `productidcart`=$Removeproduct and username='$username';";
    $result = mysqli_query($con, $delete_cart_fully);
}

?>
<script>
    window.location.href='add_to_cart.php';

</script>