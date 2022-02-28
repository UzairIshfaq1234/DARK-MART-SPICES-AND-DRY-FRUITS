<?php

require("menubar.php");
$username = $_SESSION['login_gmail_username'];


?>


<div class='cart-main-area ptb--100 bg__white'>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <form action='#'>

                    <div class='table-content table-responsive'>
                        <table>
                            <thead>
                                <tr>
                                    <th class='product-thumbnail'>products</th>
                                    <th class='product-name'>name of products</th>
                                    <th class='product-price'>Price</th>
                                    <th class='product-subtotal'>Place Order</th>
                                    <th class='product-remove'>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $cart_display = "SELECT * FROM `cart` WHERE username='$username'";
                                $result = mysqli_query($con, $cart_display);
                                $cart_display_rows = mysqli_num_rows($result);

                                // echo  $cart_display_rows;

                                for ($i = 0; $i<$cart_display_rows; $i++) {
                                    $data = mysqli_fetch_assoc($result);

                                    $productidcart = $data['productidcart'];
                                    $qty = $data['qty'];

                                    $cart_display2 = "SELECT * FROM `product` WHERE product_id='$productidcart'";
                                    $result2=mysqli_query($con, $cart_display2);
                                    $cart_display2_rows = mysqli_num_rows($result2);
                                    // echo  $cart_display2_rows;

                                    for ($j = 0; $j<$cart_display2_rows; $j++)
                                    {
                                        $data2 = mysqli_fetch_assoc($result2);


                                        $product_id = $data2['product_id'];
                                        $name = $data2['name'];
                                        $price = $data2['price'];
                                        $image = $data2['image'];
                                       
                                        $total_price=$price*$qty;





                                        echo  "
                                        <tr>
                                        <td class='product-thumbnail'><a href='#'><img src='product_images_category/$image' alt='product img' /></a></td>
                                        <td class='product-name'><a href='#'>$name</a>
                                            <ul class='pro__prize'>
                                                <li>Rs: $price</li>
                                            </ul>
                                        </td>
                                        <td class='product-price'><span class='amount'>Rs: $total_price</span></td>
                                        <td class='product-remove'><a href='User_order_page.php?productid=$product_id'><i class='icon-bag icons'></i></a></td> 
                                  
                                 


                                        <td class='product-remove'><a href='remove_from_cart.php?Removeid=$product_id'><i class='icon-trash icons'></i></a></td>
                                    </tr>
                                        
                                        ";



                                    }
                                }
                                ?>
                     

                            </tbody>
                        </table>
                    </div>
                    <div class='row'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='buttons-cart--inner'>
                                <div class='buttons-cart'>
                                    <a href='first_page.php'>Continue Shopping</a>
                                </div>
                                <div class='buttons-cart checkout--btn'>
                                    <a style="color:white;background-color:red;" href='Order_inprog.php'>Your Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>