<?php

$cart_for_menu_display = "SELECT * FROM `cart` WHERE username='$username'";
$res = mysqli_query($con, $cart_for_menu_display);
$cart_for_menu_display_rows = mysqli_num_rows($res);

// echo  $cart_for_menu_display_rows;

for ($k = 0; $k < $cart_for_menu_display_rows; $k++) {
    $dataget = mysqli_fetch_assoc($res);

    $productidcart = $dataget['productidcart'];
    $qty = $dataget['qty'];

    $cart_for_menu_display2 = "SELECT * FROM `product` WHERE product_id='$productidcart'";
    $res2 = mysqli_query($con, $cart_for_menu_display2);
    $cart_for_menu_display2_rows = mysqli_num_rows($res2);
    // echo  $cart_for_menu_display2_rows;

    for ($m = 0; $m < $cart_for_menu_display2_rows; $m++) {
        $dataget2 = mysqli_fetch_assoc($res2);


        $product_id = $dataget2['product_id'];
        $name = $dataget2['name'];
        $price = $dataget2['price'];
        $image = $dataget2['image'];

        $total_price = $price * $qty;
    }
}


?>



<div class='shp__cart__wrap'>
    <div class='shp__single__product'>
        <div class='shp__pro__thumb'>
            <a href='#'>
                <img src='images/product-2/sm-smg/1.jpg' alt='product images'>
            </a>
        </div>
        <div class='shp__pro__details'>
            <h2><a href='product-details.html'>BO&Play Wireless Speaker</a></h2>
            <span class='quantity'>QTY: 1</span>
            <span class='shp__price'>$105.00</span>
        </div>
        <div class='remove__btn'>
            <a href='#' title='Remove this item'><i class='zmdi zmdi-close'></i></a>
        </div>
    </div>
</div>