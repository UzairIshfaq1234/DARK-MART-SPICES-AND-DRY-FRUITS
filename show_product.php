<!-- -----------Header included---------- -->



<style>
    .data1 {
        font-weight: bold;
        text-align: center;
        font-family: 'Varela Round', sans-serif;

    }

    .hedingproduct1 {
        font-weight: bold;
        font-family: 'Varela Round', sans-serif;
        margin-top: 40px;


    }

    .productimage {
        /* width:500px; */
        /* height:300px; */
        margin-top: 40px;
        border-radius: 50%;
        font-family: 'Varela Round', sans-serif;

    }

    .prohead {
        /* font-size: 60px; */
        color: black;
        font-weight: bold;
        font-family: 'Varela Round', sans-serif;

    }

    .showproid {
        font-family: 'Varela Round', sans-serif;
    }



    .head21 {
        display: flex;
        font-family: 'Varela Round', sans-serif;

    }

    .inlinedopme {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        font-family: 'Varela Round', sans-serif;
        margin-top: 20px;
        margin-bottom: 50px;




    }
.header
{
    display: none;
}
.main-menu
{
    display: none;
}
    @media only screen and (max-width: 900px) {
        .inlinedopme {
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            justify-content: space-around;
        }

        .hedingproduct1 {
            font-size: 19px;
            text-align: left;
            margin-top: 20px;
        }
    }

    @media only screen and (max-width: 1300px) {
        .hedingproduct1 {
            font-size: 19px;
            width: 400px;
            text-align: left;
            margin-top: 20px;
        }
    }
</style>


<?php


require('top.inc.php');


if (isset($_GET['getdetails']) and $_GET['getdetails'] != "") {

    $displayitem = $_GET['getdetails'];

    $display_category = "SELECT * FROM `product`";
    $result = mysqli_query($con, $display_category);
    $display_category_rows = mysqli_num_rows($result);

    for ($i = 0; $i < $display_category_rows; $i++) {
        $data = mysqli_fetch_assoc($result);
        if ($displayitem == $data['product_id']) {
            $product_id = $data['product_id'];


            $category = $data['category'];

            $name = $data['name'];
            $price = $data['price'];

            $image = $data['image'];
            $product_details = $data['product_details'];

            $descripition = $data['descripition'];
            $product_feature = $data['product_feature'];

            $status1 = $data['status'];
            $status  =  preg_replace(" /\s+/ ", "", $status1);
            $timestamp = $data['timestamp'];

            echo   "

                
                <div class='content pb-0'>
                    <div class='orders'>
                        <div class='row'>
                            <div class='col-xl-12'>
                                <div class='card'>
                                    <div class='card-body'>
            
                                        <button type='button' class='btn btn-dark'> <a href='see_product_category.php?seedata=$category' style='color: white;' class='link'>Back</a> </button>
            
                                        <div class='data1'>
            
            
                                            <h3 class='hedingproduct1'>$name</h3>
                                            <img src='product_images_category/$image' alt='productiamge' class='productimage'>
            
                                        </div>
                                     
                                            <div class='head1'>
            
                                                <div class='inlinedopme'>
            
            
                                                    <div class='head1'>
            
                                                        <h4 class='prohead'>Product Id</h4>
                                                        <p class='showproid'>$product_id</p>
                                                    </div>
            
            
                                                    <div class='head1'>
                                                        <h4 class='prohead'>Category</h4>
                                                        <p class='showproid'>$category</p>
            
                                                    </div>
                                                    <div class='head1'>
                                                        <h4 class='prohead'>Price</h4>
                                                        <p class='showproid'>Rs: $price</p>
            
                                                    </div>
                                                    <div class='head1'>
                                                        <h4 class='prohead'>Status</h4>
                                                        <p class='showproid'>$status</p>
            
                                                    </div>
                                                    <div class='head1'>
                                                        <h4 class='prohead'>Uploaded On</h4>
                                                        <p class='showproid'>$timestamp</p>
            
                                                    </div>
                                                </div>

                                                
                                                
                                                
                                         
                                                
                                                
                                                <div class='column'>

                                                    <div class='data'>
                                                        <h4 class='prohead'>Details</h4>
                                                        <p class='showproid'>$product_details</p>
                
                                                    </div>
                                                    <div class='data'>
                                                        <h4 class='prohead'>Descripition</h4>
                                                        <p class='showproid'>$descripition</p>
                
                                                    </div>
                
                                                    <div class='data'>
                                                        <h4 class='prohead'>Product Feature</h4>
                                                        <p class='showproid'>$product_feature</p>
                
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                              



            
            
                                   
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='clearfix'></div>

                ";
        }
    }
}
?>