<!-- -----------Header included---------- -->

<?php
require("menubar.php");

if (isset($_GET['sub']) and $_GET['sub'] != "") {

    $catego = $_GET['sub'];
}
?>

<style>
    /* .bradcaump__inner {
        text-align: left;
    } */
    .ht__bradcaump__area {
        align-items: flex-start;
        display: flex;
        margin-top: 0px;
    }
    .breadcrumb-item {
    color: #000000;
    font-family: "Poppins",sans-serif;
    /* font-size: 18px; */
    /* font-weight: 500; */
    text-transform: capitalize;
}
</style>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href=""><?php echo "$catego"; ?></a>

                            <?php

                            $display_category = "SELECT * FROM `categories` WHERE main_category_sub='$catego'";
                            $result = mysqli_query($con, $display_category);
                            $display_category_rows = mysqli_num_rows($result);

                            for ($i = 0; $i < $display_category_rows; $i++) {
                                $data = mysqli_fetch_assoc($result);

                                $categories = $data['categories'];
                                $status = $data['status'];

                                if ($status == "Active") {
                                    echo " <span class='brd-separetor'><i class='zmdi zmdi-chevron-right'></i></span>
                                         <a class='breadcrumb-item' href='index.html'>$categories</a>
    ";
                                }
                            }
                            ?>

                        </nav>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">


                        <!-- Start List And Grid View -->
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <!-- Start Single Product -->

                                <?php

                                $display_category = "SELECT * FROM `product` WHERE category='$catego'";
                                $result = mysqli_query($con, $display_category);
                                $display_category_rows = mysqli_num_rows($result);

                                for ($i = 0; $i < $display_category_rows; $i++) {
                                    $data = mysqli_fetch_assoc($result);

                                    $name = $data['name'];
                                    $price = $data['price'];
                                    $image = $data['image'];
                                    $status = $data['status'];
                                    $product_id = $data['product_id'];
                                    $category = $data['category'];

                                    $product_details = $data['product_details'];

                                    if ($status == "instock") {
                                        echo "

                                            <div class='col-md-4 col-lg-4 col-sm-6 col-xs-12'>
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


                                <!-- End Single Product -->

                            </div>
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-xs-12">
                                    <div class="ht__list__wrap">
                                        <!-- Start List Product -->
                                        <?php

                                        $display_category = "SELECT * FROM `product` WHERE category='$catego';";
                                        // ORDER BY `orders` DESC LIMIT 12
                                        $result = mysqli_query($con, $display_category);
                                        $display_category_rows = mysqli_num_rows($result);

                                        for ($i = 0; $i < $display_category_rows; $i++) {
                                            $data = mysqli_fetch_assoc($result);

                                            $name = $data['name'];
                                            $price = $data['price'];
                                            $image = $data['image'];
                                            $category = $data['category'];

                                            $status = $data['status'];
                                            $product_id = $data['product_id'];

                                            $product_details = $data['product_details'];

                                            if ($status == "instock") {
                                                echo "
        
        <div class='ht__list__product'>
    <div class='ht__list__thumb'>
        <a href='data_of_product.php?item=$product_id&cat=$category'>
        <img src='product_images_category/$image' alt='product images'>
        </a>
    </div>
    <div class='htc__list__details'>
        <h2><a href='data_of_product.php?item=$product_id&cat=$category'>$name</a></h2>
        <ul class='pro__prize'>
            <li>Rs $price</li>
        </ul>

        <p>$product_details</p>



    </div>
</div>
        
        ";
                                            }
                                        }
                                        ?>

                                        <!-- End List Product -->



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>

            </div>
            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                <div class="htc__product__leftsidebar">
                    <!-- Start Best Sell Area -->

                    <div class="htc__recent__product">
                        <h2 class="title__line--4">best seller</h2>
                        <div class="htc__recent__product__inner">
                            <!-- Start Single Product -->
                            <?php

$display_category = "SELECT * FROM `product` WHERE category='$catego' ORDER BY `orders` DESC LIMIT 12
;";
$result = mysqli_query($con, $display_category);
$display_category_rows = mysqli_num_rows($result);

for ($i = 0; $i < $display_category_rows; $i++) {
    $data = mysqli_fetch_assoc($result);

    $name = $data['name'];
    $price = $data['price'];
    $image = $data['image'];

    $status = $data['status'];
    $orders = $data['orders'];
    $category = $data['category'];

    $product_id = $data['product_id'];

                       
    $product_details = $data['product_details'];

    if ($status == "instock") {
        if ($orders > 0) {        echo "
        
        <div class='htc__best__product'>
    <div class='htc__best__pro__thumb'>
        <a href='data_of_product.php?item=$product_id&cat=$category'>
            <img src='product_images_category/$image' alt='small product'>
        </a>
    </div>
    <div class='htc__best__product__details'>
        <h2><a href='data_of_product.php?item=$product_id&cat=$category'>$name</a></h2>

        <ul class='pro__prize'>
            <li>Rs $price </li>
        </ul>
    </div>
</div>
        
        
        ";
        }
    }
}?>
                           
                            <!-- End Single Product -->


                        </div>
                    </div>
                    <!-- End Best Sell Area -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- Start Footer Area -->


<?php
require("footer.php");

?>