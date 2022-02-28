<!-- -----------Header included---------- -->
<?php
if (isset($_GET['seedata']) and $_GET['seedata']!="") 
{
    
    $cat1=$_GET['seedata'];
}

?>
<?php
require('top.inc.php');

if (isset($_GET['action']) and $_GET['action']!="") 
{
    
    $action=$_GET['action'];

    // echo $action;
    if ($action=="update_status")
    {
        $productid1=$_GET['name'];
        $operation=$_GET['operation'];

        // echo $operation;


        if($operation=="outofstock")
        {
    

            // echo  $conformation;

            $update_category_status = "UPDATE `product` SET `status`='outofstock' WHERE `product_id`='$productid1';";
            $result = mysqli_query($con, $update_category_status);
        }
        if($operation=="instock")
        {
            $update_category_status = "UPDATE `product` SET `status`='instock' WHERE `product_id`='$productid1';";
            $result = mysqli_query($con, $update_category_status);
        }



    }

    if($action=="delete_category")
    {
        $productid1=$_GET['name'];


      

        // SELECT * FROM `product` WHERE `category` = 'str'
        $delete_product_fully = "DELETE FROM `product` WHERE `product_id`='$productid1';";
        $result1 = mysqli_query($con, $delete_product_fully);


    }

}



?>
<style>
    .updateimage {
        /* width:auto;
        height:auto; */
        margin-bottom: 30px;
        margin-top: 20px;

    }

</style>
<div class="content pb-0">



    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="box-title" style="font-size:39px;margin-bottom:10px;"><span style="color:red;"><?php echo strtoupper($cat1);?> </span> PRODUCT </h3>
                   

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                    
                                        <th class="serial">Title</th>
                                        <th class="serial">Id</th>
                                        <th class="serial">Price </th>
                                        
                                        
                                        <th>Image </th>
                                        <th>Details</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Delete Product</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $display_category = "SELECT * FROM `product` ORDER BY `timestamp` DESC ;";
                                    $result = mysqli_query($con, $display_category);
                                    $display_category_rows = mysqli_num_rows($result);

                                    for ($i = 0; $i < $display_category_rows; $i++) {
                                        $data = mysqli_fetch_assoc($result);


                                        $product_id = $data['product_id'];

                                        
                                        $category = $data['category'];

                                        $name = $data['name'];
                                        $price = $data['price'];

                                        $image = $data['image'];
                                        $product_details = $data['product_details'];

                                        $descripition = $data['descripition'];
                                        $product_feature = $data['product_feature'];

                                        $status1 = $data['status'];
                                        $status  =  preg_replace(" /\s+/ ", "",$status1);
                                        $timestamp = $data['timestamp'];


                                  if($cat1==$category)
                                  {


                                        echo "
                                        <tr>
                                            <td class='serial'>$name</td>
                                            <td class='serial'>$product_id</td>
                                            <td class='serial'>Rs: $price</td>

                                            </td>
                                            <td><img src='product_images_category/$image' alt='' class='rounded-circle'>
                                            
                                            <td>
                                            <span class='badge badge-dark'> <a href='show_product.php?getdetails=$product_id' style='color: white;' class='deletecategory'>Product Details</a></span>
                                            </td>   
                                            
                                            <td>
                                            <span class='badge badge-primary'> <a href='update_product.php?updatingproduct=$product_id' style='color: white;' class='deletecategory'>Update</a></span>
                                        </td>    
                                        ";
                                        if($status== "instock")

                                        {
                                            echo"
                                                <td>
                                                    <span class='badge badge-success'> <a href='?action=update_status&name=$product_id&operation=outofstock&seedata=$category' style='color: white;' class='deletecategory'>$status</a></span>
                                                </td>
                                                ";

                                        }
                                        else
                                        {
                                            echo"
                                            <td>
                                                <span class='badge badge-warning'> <a href='?action=update_status&name=$product_id&operation=instock&seedata=$category' style='color: white;' class='deletecategory'>$status</a></span>
                                            </td>
                                            ";
                                        }

                                        echo "
    
                                            <td>
                                                <span class='badge badge-danger'> <a href='?action=delete_category&name=$product_id&seedata=$category' style='color: white;' class='deletecategory'>Delete Product</a></span>
                                            </td>
    
    
    
    
                                        </tr>

                                        ";
                                    }
                                }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- -----------footer included---------- -->
<?php
require('footer.inc.php');

?>