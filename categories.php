<!-- -----------Header included---------- -->

<?php
require('top.inc.php');

if (isset($_GET['action']) and $_GET['action']!="") 
{
    
    $action=$_GET['action'];

    // echo $action;
    if ($action=="update_status")
    {
        $name=$_GET['name'];
        $operation=$_GET['operation'];

        // echo $operation;


        if($operation=="Deactive")
        {
    

            // echo  $conformation;

            $update_category_status = "UPDATE `categories` SET `status`='Deactive' WHERE `categories`='$name';";
            $result = mysqli_query($con, $update_category_status);

            
            $update_category_status1 = "UPDATE `product` SET `status`='outofstock' WHERE `category`='$name';";
            $result = mysqli_query($con, $update_category_status1);
        }
        if($operation=="Active")
        {
            $update_category_status = "UPDATE `categories` SET `status`='Active' WHERE `categories`='$name';";
            $result = mysqli_query($con, $update_category_status);

            $update_category_status1 = "UPDATE `product` SET `status`='instock' WHERE `category`='$name';";
            $result = mysqli_query($con, $update_category_status1);
        }



    }

    if($action=="delete_category")
    {
        $name=$_GET['name'];


        $delete_category_fully = "DELETE FROM `categories` WHERE `categories`='$name';";
        $result = mysqli_query($con, $delete_category_fully);

        // SELECT * FROM `product` WHERE `category` = 'str'
        $delete_product_fully = "DELETE FROM `product` WHERE `category`='$name';";
        $result1 = mysqli_query($con, $delete_product_fully);


    }

}



?>

<div class="content pb-0">



    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="box-title" style="font-size:39px;margin-bottom:10px;">CATEGORIES </h3>
                        <a href="add_sub_categories.php" class="addCategories">
                            <h6 class="box-title" style="font-size: 12px ;background-color:black; color:white;font-weight:bolder; padding:8px; border-radius:3px;width:120px;">Add Categories </h6>
                        </a>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">Categories</th>
                                        <th>Product List </th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $display_category = "SELECT * FROM `categories`";
                                    $result = mysqli_query($con, $display_category);
                                    $display_category_rows = mysqli_num_rows($result);

                                    for ($i = 0; $i < $display_category_rows; $i++) {
                                        $data = mysqli_fetch_assoc($result);


                                        $category_id = $data['id'];
                                        $category_data = $data['categories'];
                                        $category_status = $data['status'];


                                        echo "
                                        <tr>
                                            <td class='serial'>$category_data</td>
                                            <td>
                                            <span class='badge badge-success'> <a href='see_product_category.php?seedata=$category_data' style='color: white;' class='deletecategory'>See Products</a></span>
                                        </td>    
                                        ";
                                        if($category_status== "Active")

                                        {
                                            echo"
                                                <td>
                                                    <span class='badge badge-info'> <a href='?action=update_status&name=$category_data&operation=Deactive' style='color: white;' class='deletecategory'>$category_status</a></span>
                                                </td>
                                                ";

                                        }
                                        else
                                        {
                                            echo"
                                            <td>
                                                <span class='badge badge-warning'> <a href='?action=update_status&name=$category_data&operation=Active' style='color: white;' class='deletecategory'>$category_status</a></span>
                                            </td>
                                            ";
                                        }

                                        echo "
    
                                            <td>
                                                <span class='badge badge-danger'> <a href='?action=delete_category&name=$category_data' style='color: white;' class='deletecategory'>Delete Category</a></span>
                                            </td>
    
    
    
    
                                        </tr>

                                        ";
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