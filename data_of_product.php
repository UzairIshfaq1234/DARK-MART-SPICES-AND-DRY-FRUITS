<!-- -----------Header included---------- -->

<?php
require("menubar.php");

if (isset($_GET['item']) and $_GET['item'] != "") {

    $itemid = $_GET['item'];
    $cat = $_GET['cat'];
}
?>
<style>
    .myselect
    {
        width: 200px;
        color: black;
        background-color: white;
        height: 30px;
        margin-top: 20px;
    }
</style>
<?php

$display_category = "SELECT * FROM `product` WHERE 	product_id='$itemid'";
$result = mysqli_query($con, $display_category);
$display_category_rows = mysqli_num_rows($result);

for ($i = 0; $i < $display_category_rows; $i++) {
    $data = mysqli_fetch_assoc($result);

    $name = $data['name'];
    $price = $data['price'];
    $image = $data['image'];
    $status = $data['status'];
    $category = $data['category'];

    $product_id = $data['product_id'];
    $product_details = $data['product_details'];
    $descripition = $data['descripition'];
    $product_feature = $data['product_feature'];

    echo "
    
    
    <section class='htc__product__details bg__white ptb--100'>
    <!-- Start Product Details Top -->
    <div class='htc__product__details__top'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-5 col-lg-5 col-sm-12 col-xs-12'>
                    <div class='htc__product__details__tab__content'>
                        <!-- Start Product Big Images -->
                        <div class='product__big__images'>
                            <div class='portfolio-full-image tab-content'>
                                <div role='tabpanel' class='tab-pane fade in active' id='img-tab-1'>
                                    <img src='product_images_category/$image' alt='full-image'>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Big Images -->

                    </div>
                </div>
                <div class='col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40'>
                    <div class='ht__product__dtl'>
                        <h2>$name</h2>
                        <ul class='pro__prize'>
                            <li>Rs    $price </li>
                        </ul>
                        <p class='pro__info'> $product_details</p>
                        <div class='ht__pro__desc'>
                            <div class='sin__desc'>
                                <p><span>Availability:</span> $status</p>
                            </div>
                            <div class='sin__desc align--left'>
                                <p><span>Categories:</span></p>
                                <ul class='pro__cat__list'>
                                    <li>$category</li>
                                </ul>
                            </div>

                          
                         
                     



                            <br>
                            <br>
                            <div class='fr__list__btn'>
                            <a class='fr__btn' href='add_to_cart_process.php?product=$product_id'>Add to Cart</a>
                        </div>

                        </form>

                        </div>
                        
                    </div>
    
                    
                </div>
                
            </div>
            
        </div>
    </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class='htc__produc__decription bg__white'>
    <div class='container'>
        <div class='row'>
            <div class='col-xs-12'>
                <!-- Start List And Grid View -->
                <ul class='pro__details__tab' role='tablist'>
                    <li role='presentation' class='description active'><a href='#description' role='tab' data-toggle='tab'>description</a></li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='ht__pro__details__content'>
                    <!-- Start Single Content -->
                    <div role='tabpanel' id='description' class='pro__single__content tab-pane fade in active'>
                        <div class='pro__tab__content__inner'>
                           
                            <h4 class='ht__pro__title'>Description</h4>
                            <p> $descripition</p>
                            <h4 class='ht__pro__title'>Standard Featured</h4>
                            <p>$product_feature</p>
                        </div>
                    </div>
                    <!-- End Single Content -->

                </div>
            </div>
        </div>
    </div>
</section>
    
    ";
}


?>

<!-- Start Product Details Area -->

<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Product -->
                <?php

                $display_category = "SELECT * FROM `product` WHERE 	category='$cat' ORDER BY `timestamp` DESC LIMIT 4";
                $result = mysqli_query($con, $display_category);
                $display_category_rows = mysqli_num_rows($result);

                for ($i = 0; $i < $display_category_rows; $i++) {
                    $data = mysqli_fetch_assoc($result);

                    $name = $data['name'];
                    $price = $data['price'];
                    $image = $data['image'];
                    $status = $data['status'];
                    $category = $data['category'];

                    $product_id = $data['product_id'];
                    $product_details = $data['product_details'];
                    $descripition = $data['descripition'];
                    $product_feature = $data['product_feature'];

                    echo

                    "
                    <div class='col-md-3 col-lg-3 col-sm-6 col-xs-12'>
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
                ?>

                <!-- End Single Product -->

            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->


<?php
require("footer.php");

?>