<!-- -----------Header included---------- -->

<?php
require('top.inc.php');
if (isset($_GET['action']) and $_GET['action']!="") 
{
    
    $action=$_GET['action'];

    // echo $action;
    if ($action=="update_banner")
    {
        $name=$_GET['name'];
        $operation=$_GET['operation'];

        // echo $operation;


        if($operation=="Deactive")
        {
    

            // echo  $conformation;

            $update_category_status = "UPDATE `heading_banner` SET `status`='Deactive' WHERE `bannerid`='$name';";
            $result = mysqli_query($con, $update_category_status);

            
      
        }
        if($operation=="Active")
        {
            $update_category_status = "UPDATE `heading_banner` SET `status`='Active' WHERE `bannerid`='$name';";
            $result = mysqli_query($con, $update_category_status);

        }



    }

    if($action=="delete_banner")
    {
        $name=$_GET['name'];


        $delete_category_fully = "DELETE FROM `heading_banner` WHERE `bannerid`='$name';";
        $result = mysqli_query($con, $delete_category_fully);

   

    }

}

?>

<div class="content pb-0">



    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="box-title" style="font-size:39px;margin-bottom:10px;">Data Banner & Heading (628X472 size) </h3>
                 
                        <h5 class="box-title" style="font-size:39px;margin-bottom:10px;">Only One can be Active at a time </h5>

                    </div>

                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">Large Heading</th>
                                        <th>BannerImg</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $display_category = "SELECT * FROM `heading_banner` ORDER BY `tstamp` DESC ;";
                                    $result = mysqli_query($con, $display_category);
                                    $display_category_rows = mysqli_num_rows($result);

                                    for ($i = 0; $i < $display_category_rows; $i++) {
                                        $data = mysqli_fetch_assoc($result);


                                        $large_head = $data['large_head'];
                                        $banner_img = $data['banner_img'];
                                        $status = $data['status'];
                                        $bannerid = $data['bannerid'];




                                        echo "
                                        <tr>
                                            <td class='serial'>$large_head</td>
                                           
                                            <td><img src='frontbanner/$banner_img' alt='' class='rounded-circle'>
                                            
                                        
                                        </td>    
                                        ";
                                        if($status== "Active")

                                        {
                                            echo"
                                                <td>
                                                    <span class='badge badge-info'> <a href='?action=update_banner&name=$bannerid&operation=Deactive' style='color: white;' class='deletecategory'>$status</a></span>
                                                </td>
                                                ";

                                        }
                                        else
                                        {
                                            echo"
                                            <td>
                                                <span class='badge badge-warning'> <a href='?action=update_banner&name=$bannerid&operation=Active' style='color: white;' class='deletecategory'>$status</a></span>
                                            </td>
                                            ";
                                        }

                                        echo "
    
                                            <td>
                                                <span class='badge badge-danger'> <a href='?action=delete_banner&name=$bannerid' style='color: white;' class='deletecategory'>Delete Category</a></span>
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