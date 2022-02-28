<!-- -----------Header included---------- -->

<?php
require('top.inc.php');
$imageerror = "";
$productiderror = "";
$user_data_inserted = "";
$user_data_not_inserted = "";

$product_id = rand(1, 999999);

if (isset($_POST['submitproduct'])) {
    $productid21 = $product_id;
    $productid2 =  preg_replace(" /\s+/ ", "", $productid21);

    // $productid2 = "509487";
    $productcategory2 = $_POST['productcategory'];
    $productcategory =  preg_replace(" /\s+/ ", "", $productcategory2);

    $productcategory21 = $_POST['mainproductcategory'];
    $productcategory2 =  preg_replace(" /\s+/ ", "", $productcategory21);


    $Producttitle = $_POST['Producttitle'];
    $Price = $_POST['Price'];

    // iamge file data
    $file_name = $_FILES['image']['name'];
    $dateo = date('ljS\ofFYhisA');
    $file_name2 = $dateo . $productid2 . $productcategory . "_" . $file_name;
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    // iamge file data

    $productdetails = $_POST['productdetails'];
    $Descripition = $_POST['Descripition'];

    $Feature = $_POST['Feature'];
    $productstatus23 = "instock";

    $productstatus2  =  preg_replace(" /\s+/ ", "", $productstatus23);


    // echo     $productid2."<br>";
    // echo     $productcategory."<br>" ;
    // echo     $Producttitle."<br>"  ;
    // echo     $Price."<br>";
    // echo      $file_name2."<br>";
    // echo      $productdetails."<br>";
    // echo      $Descripition."<br>";
    // echo      $Feature."<br>";
    // echo     $productstatus2."<br>" ;

    if ($file_type == "image/png" or $file_type == "image/jpg" or $file_type == "image/jpeg") 
    {

        $display_product_id="SELECT * FROM `product` WHERE `product_id` ='$productid2';";
        $result = mysqli_query($con, $display_product_id);
        $display_product_id_rows = mysqli_num_rows($result);

        if ($display_product_id_rows > 0) 
        {
            $productiderror = "Product Id already in use!<br>Please Refresh to get new Id.";
        }
        else 
        {
            $upload_product = "INSERT INTO `product` (`product_id`, `category`, `name`, `price`, `image`, `product_details`, `descripition`, `product_feature`, `status`,`main_category`) VALUES ('$productid2','$productcategory', '$Producttitle','$Price', '$file_name2','$productdetails','$Descripition','$Feature','$productstatus2','$productcategory2');";
            $dataenterycheck = mysqli_query($con, $upload_product);

            if ($dataenterycheck) {
                if (move_uploaded_file($file_tmp, "product_images_category/" . $file_name2)) {

                    $user_data_inserted = "Product Successfully Added !";

                    sleep(2);
                    header("location:product_manager.php");
                } else {
                    $user_data_not_inserted = "Alert! Image Error Please try again";
                }
            } else {
                $user_data_not_inserted = "Alert! Data Error Please try again";
            }
        }
    } 
    else 
    {
        $imageerror = " Use only jpg , png , jpeg images !";
    }
}


?>


<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong style="font-size: 39px;">ADD PRODUCT (290X385 size) </strong><br><small style="color:grey;">Dont Repeate Products !</small>

                        <a href="#" class="addCategories">
                            <h6 class="box-title " style="font-size: 12px ;background-color:black; color:white;font-weight:bolder; padding:8px;margin-top:10px; border-radius:3px;width:120px;"> <a style="color: white;" href="all_product_see.php" class="linkall">See Product List</a> </h6>
                        </a>
                    </div>

                    <div class="card-body card-block">
                        <h5 style="margin-bottom: 10px;color:red;font-weight:bolder;"><?php echo $imageerror; ?> </h5>
                        <h5 style="margin-bottom: 10px;color:red;font-weight:bolder;"><?php echo $productiderror; ?> </h5>

                        <h5 style="margin-bottom: 10px;color:green;font-weight:bolder;"><?php echo $user_data_inserted; ?> </h5>
                        <h5 style="margin-bottom: 10px;color:red;font-weight:bolder;"><?php echo $user_data_not_inserted; ?> </h5>


                        <!-- <------------------form strat--------------------->
                        <form action="product_manager.php" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>

                            <div class="form-group">
                                <label for="productid" class=" form-control-label">Product Id</label>
                                <input type="text" disabled id="productid" name="productid" value=<?php echo $product_id; ?> placeholder=<?php echo $product_id; ?> class="form-control">
                            </div>

                        
                            <div class='form-group'>
                                <label for='mainproductcategory' class=' form-control-label'>Main Category</label>
                                <select name='mainproductcategory' required class='form-control'>
                                    <option selected disabled value=''>Select Product Main Category</option>

                                    <?php

                                    $display_product_id = "SELECT * FROM `main_category`";
                                    $result = mysqli_query($con, $display_product_id);
                                    $display_product_id_rows = mysqli_num_rows($result);

                                    for ($i = 0; $i < $display_product_id_rows; $i++) {
                                        $data = mysqli_fetch_assoc($result);


                                        $category_id = $data['sno'];
                                        $category_data121 = $data['main_category'];
                                        $category_status111 = $data['status'];

                                        $category_data11 =  preg_replace(" /\s+/ ", "", $category_data121);

                                        if ($category_status111 == "Active") {


                                            echo "<option value=$category_data11>$category_data11</option>";
                                        }
                                    }

                                    ?>

                                    <div class='invalid-feedback'>
                                    </div>

                                </select>
                            </div>

                            <div class='form-group'>
                                <label for='productcategory' class=' form-control-label'>Sub Category</label>
                                <select name='productcategory' required class='form-control'>
                                    <option selected disabled value=''>Select Product sub Category</option>

                                    <?php

                                    $display_product_id = "SELECT * FROM `categories`";
                                    $result = mysqli_query($con, $display_product_id);
                                    $display_product_id_rows = mysqli_num_rows($result);

                                    for ($i = 0; $i < $display_product_id_rows; $i++) {
                                        $data = mysqli_fetch_assoc($result);


                                        $category_id = $data['id'];
                                        $category_data12 = $data['categories'];
                                        $category_status = $data['status'];

                                        $category_data =  preg_replace(" /\s+/ ", "", $category_data12);

                                        if ($category_status == "Active") {


                                            echo "<option value=$category_data>$category_data</option>";
                                        }
                                    }

                                    ?>

                                    <div class='invalid-feedback'>
                                    </div>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Producttitle" class=" form-control-label">Product title</label>
                                <input type="text" required id="Producttitle" name="Producttitle" placeholder="Add Product title" class="form-control">

                                <div class="valid-feedback">
                                    WoW Lovely title!
                                </div>

                                <div class="invalid-feedback">
                                    Please provide your Product title !
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Price" class=" form-control-label">Price</label>
                                <input type="text" required id="Price" name="Price" placeholder="Add Product Price" class="form-control">


                                <div class="valid-feedback">
                                    Perfect Price!
                                </div>

                                <div class="invalid-feedback">
                                    Product Price Missing !
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="image" class=" form-control-label">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                                <div class="valid-feedback">
                                    Beautiful Product Image!
                                </div>


                                <div class="invalid-feedback">
                                    Upload Product Image in (jpg ,png, jpeg) !
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="productdetails">Product Details</label>
                                <textarea class="form-control" id="productdetails" rows="15" name="productdetails" required></textarea>

                                <div class="valid-feedback">
                                    Best Product Details!
                                </div>

                                <div class="invalid-feedback">
                                    Product Details Needed !
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Descripition">Descripition</label>
                                <textarea class="form-control" id="Descripition" rows="10" name="Descripition" required></textarea>
                                <div class="valid-feedback">
                                    Product Described Nicely!
                                </div>


                                <div class="invalid-feedback">
                                    Product Descripition Needed !
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="Feature">Features</label>
                                <textarea class="form-control" id="Feature" rows="10" name="Feature" required></textarea>

                                <div class="valid-feedback">
                                    Amazing Features!
                                </div>

                                <div class="invalid-feedback">
                                    Product Feature Needed !
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="productstatus" class=" form-control-label">Product Status</label>
                                <input type="text" disabled name="productstatus" value="in_stock" placeholder="in_stock" class="form-control">
                            </div>



                            <button style="background-color: black;border:none;" type="submit" name="submitproduct" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>

                        </form>
                        <!-- <------------------form ended--------------------->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<!-- -----------footer included---------- -->
<?php
require('footer.inc.php');

?>