<?php
session_start();
require('connection.php');
require('function_inc.php');

// error_reporting(0);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DARK CODERZ STORE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<style>
    .loginlabel {

        margin-left: 25px;

    }

    .mylabel112215 {
        text-transform: uppercase;
        font-weight: bolder;
        font-size: 15px;
        color: black;
        margin-top: 50px;
        font-family: Arial, Helvetica, sans-serif;




    }

    .loggended5 {
        margin-top: -150px;
        margin-left: 20px;
    }

    .icon12125 {
        color: black;
        margin-right: 15px;
        font-size: 25px;
    }

    .spano12232 {
        color: #c43b68;
    }

    @media (max-width: 767px) {

        .loginlabel {
            margin-left: -10px;
        }
    }
</style>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a style="padding-top: 24px;" href="first_page.php"><img src="images/logo/3a.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="first_page.php">Home</a></li>
                                        <?php
                                        $display_category13 = "SELECT * FROM `main_category`";
                                        $result23 = mysqli_query($con, $display_category13);
                                        $display_category_rows23 = mysqli_num_rows($result23);

                                        for ($i = 0; $i < $display_category_rows23; $i++) {
                                            $data23 = mysqli_fetch_assoc($result23);


                                            $category_id23 = $data23['sno'];
                                            $category_data23 = $data23['main_category'];
                                            $category_status23 = $data23['status'];


                                            if ($category_status23 == "Active") {
                                                echo " <li class='drop'><a href='display_product_subcategory_touser.php?get=$category_data23'>$category_data23</a>";
                                            }
                                        }
                                        ?>
                                    </ul>
                                    </li>
                                    </ul>
                                </nav>
                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="first_page.php">Home</a></li>
                                            <?php
                                            $display_category13 = "SELECT * FROM `main_category`";
                                            $result23 = mysqli_query($con, $display_category13);
                                            $display_category_rows23 = mysqli_num_rows($result23);

                                            for ($i = 0; $i < $display_category_rows23; $i++) {
                                                $data23 = mysqli_fetch_assoc($result23);


                                                $category_id23 = $data23['sno'];
                                                $category_data23 = $data23['main_category'];
                                                $category_status23 = $data23['status'];


                                                if ($category_status23 == "Active") {
                                                    echo "<li><a href='display_product_subcategory_touser.php?get=$category_data23'> $category_data23 </a></li>";
                                                }
                                            }
                                            ?>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__account">
                                        <?php
                                        if (!isset($_SESSION['login_gmail_username'])) {
                                            echo "
                                            <div>
                                            <a href='register_website.php'><i class='icon-user icons'></i></a>
                                            <p>Login</p>
                                            </div>   
                                            ";
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['login_gmail_username']) &&  $_SESSION['login_gmail_username'] != '') {

                                        $userloggend = $_SESSION['login_fullname'];
                                        $username2 = $_SESSION['login_gmail_username'];




                                        $cart_display = "SELECT * FROM `cart` WHERE username='$username2'";
                                        $result = mysqli_query($con, $cart_display);
                                        $cart_display_rows = mysqli_num_rows($result);

                                        // echo  $cart_display_rows;

                                        echo "<div class='htc__shopping__cart'>
                                          <a class='cart__menu' href='#'><i class='icon-handbag icons'></i></a>
                                          <a href='#'><span class='htc__qua'>$cart_display_rows</span></a>
  
                                      </div>";

                                        echo "
                                
                                        <a href='logout_register.php'><p class='loginlabel'>Logout</p></a>

                                        <div class='htc__shopping__cart'>
                                        <a class='cart__menu' href='#'><i class='icon-trash icons'></i></a>

                                    </div>          
                                    <br> ";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['login_gmail_username']) &&  $_SESSION['login_gmail_username'] != '') {

                            $userloggend = $_SESSION['login_fullname'];
                            echo "
                    <div class='loggended5'>
                    <p class='mylabel112215'><span><a class='icon12125' href='register_website.php'><i class='icon-user icons'></i></a></span><span class='spano12232'>Logined:</span> $userloggend</p>
                    </div>
                    ";
                        }
                        ?>
                    </div>
                    <!-- <div class="mobile-menu-area"></div> -->
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <?php
                    if (isset($_SESSION['login_gmail_username']) &&  $_SESSION['login_gmail_username'] != '') {
                        $getuser = $_SESSION['login_gmail_username'];

                        $cart_for_menu_display = "SELECT * FROM `cart` WHERE username='$getuser'";
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


                                echo
                                "       
                            
                            <div class='shp__cart__wrap'>
                            <div class='shp__single__product'>
                                <div class='shp__pro__thumb'>
                                    <a href='#'>
                                        <img src='product_images_category/$image' alt='product images'>
                                    </a>
                                </div>
                                <div class='shp__pro__details'>
                                    <h2><a href='product-details.html'>$name</a></h2>
                                    <span class='quantity'>QTY:  $qty</span>
                                    <span class='shp__price'>Rs:  $total_price</span>
                                </div>
                                <div class='remove__btn'>
                                    <a href='remove_from_cart.php?productid=$product_id' title='Remove this item'><i class='zmdi zmdi-close'></i></a>
                                </div>
                            </div>
                        </div>
                        ";
                            }
                        }
                    }
                    ?>
                    <ul class="shopping__btn">
                        <li><a href="add_to_cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="Order_inprog.php">Your Orders</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
</body>
</html>