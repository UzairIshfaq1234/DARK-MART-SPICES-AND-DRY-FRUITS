<?php
require("menubar.php");
?>


<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->


    
    <?php

    $display_category = "SELECT * FROM `heading_banner`";
    $result = mysqli_query($con, $display_category);
    $display_category_rows = mysqli_num_rows($result);

    for ($i = 0; $i < $display_category_rows; $i++) {
        $data = mysqli_fetch_assoc($result);

        $large_head = $data['large_head'];
        $small_head = $data['small_head'];
        $banner_img = $data['banner_img'];
        $status = $data['status'];



        if ($status == "Active") {





            echo "
        <div class='slider__container slider--one bg__cat--3'>
        <div class='slide__container slider__activation__wrap owl-carousel'>
            <!-- Start Single Slide -->
            <div class='single__slide animation__style01 slider__fixed--height'>
                <div class='container'>
                    <div class='row align-items__center'>
                        <div class='col-md-7 col-sm-7 col-xs-12 col-lg-6'>
                            <div class='slide'>
                                <div class='slider__inner'>
                                    <h2>$small_head</h2>
                                    <h1>$large_head</h1>
                                    <div class='cr__btn'>
                                        <a href='first_page.php'>Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-6 col-sm-5 col-xs-12 col-md-5'>
                            <div class='slide__thumb'>
                                <img src='frontbanner/$banner_img' alt='slider images'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
            <!-- Start Single Slide -->
            <div class='single__slide animation__style01 slider__fixed--height'>
                <div class='container'>
                    <div class='row align-items__center'>
                        <div class='col-md-7 col-sm-7 col-xs-12 col-lg-6'>
                            <div class='slide'>
                                <div class='slider__inner'>
                                    <h2>$small_head</h2>
                                    <h1>$large_head</h1>
                                    <div class='cr__btn'>
                                        <a href='first_page.php'>Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-6 col-sm-5 col-xs-12 col-md-5'>
                            <div class='slide__thumb'>
                                <img src='frontbanner/$banner_img' alt='slider images'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
        </div>
    </div>

        ";
        }
    }
    ?>

    <!-- Start Slider Area -->
    <!-- Start Category Area -->
    <section class="htc__category__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">New Arrivals</h2>
                        <p>We Trust our Quality!</p>
                    </div>
                </div>
            </div>
            <div class="htc__product__container">
                <div class="row">
                    <div class="product__list clearfix mt--30">


                        <?php

                        $display_category = "SELECT * FROM `product` ORDER BY `timestamp` DESC LIMIT 40;";
                        $result = mysqli_query($con, $display_category);
                        $display_category_rows = mysqli_num_rows($result);

                        for ($i = 0; $i < $display_category_rows; $i++) {
                            $data = mysqli_fetch_assoc($result);


                            $image = $data['image'];
                            $price = $data['price'];
                            $name = $data['name'];
                            $product_id = $data['product_id'];

                            $category = $data['category'];
                            $stats = $data['status'];

if($stats=='instock')    
{         
                            echo "

<div class='col-md-4 col-lg-3 col-sm-4 col-xs-12'>
    <div class='category'>
        <div class='ht__cat__thumb'>
            <a href='data_of_product.php?item=$product_id&cat=$category'>
                <img  src='product_images_category/$image' alt='product images'>
            </a>
        </div>
        <div class='fr__hover__info'>
            <ul class='product__action'>

                <li><a href='data_of_product.php?item=$product_id&cat=$category'><i class='icon-handbag icons'></i></a></li>

            </ul>
        </div>
        <div class='fr__product__inner'>
            <h4><a href='data_of_product.php?item=$product_id&cat=$category'>$name</a></h4>
            <ul class='fr__pro__prize'>

                <li>Rs $price</li>
            </ul>
        </div>
    </div>
</div>
";
}
                        }

                        ?>
                        <!-- Start Single Category -->

                        <!-- End Single Category -->

                        <!-- End Single Category -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Category Area -->
    <!-- Start Product Area -->
    <section class="ftr__product__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">Best Seller</h2>
                        <p>Our Costumers trust us!<br>Most Popular and most wanted products</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__wrap clearfix">
                    <!-- Start Single Category -->

                    <?php

                    $display_category = "SELECT * FROM `product` ORDER BY `orders` DESC LIMIT 12 ;";
                    $result = mysqli_query($con, $display_category);
                    $display_category_rows = mysqli_num_rows($result);

                    for ($i = 0; $i < $display_category_rows; $i++) {
                        $data = mysqli_fetch_assoc($result);


                        $image = $data['image'];
                        $price = $data['price'];
                        $name = $data['name'];
                        $product_id = $data['product_id'];
                        $orders = $data['orders'];
                        $category = $data['category'];
                        $stats2 = $data['status'];


if($stats2=='instock')    
{         
       

                        if ($orders > 0) {
                            echo "         <div class='col-md-4 col-lg-3 col-sm-4 col-xs-12'>
                        <div class='category'>
                            <div class='ht__cat__thumb'>
                                <a href='data_of_product.php?item=$product_id&cat=$category'>
                                    <img src='product_images_category/$image' alt='product images'>
                                </a>
                            </div>
                            <div class='fr__hover__info'>
                                <ul class='product__action'>

                                    <li><a href='data_of_product.php?item=$product_id&cat=$category'><i class='icon-handbag icons'></i></a></li>

                                </ul>
                            </div>
                            <div class='fr__product__inner'>
                                <h4><a href='data_of_product.php?item=$product_id&cat=$category'>$name </a></h4>
                                <ul class='fr__pro__prize'>
                                    <li>Rs $price</li>
                                </ul>
                            </div>
                        </div>
                    </div> ";
                        }

                    }
                    }
                    ?>
                    <!-- End Single Category -->

                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->
    <!-- Start Footer Area -->


    <?php
    require("footer.php");

    ?>