<!-- -----------Header included---------- -->
<?php
require('top.inc.php');

if (isset($_GET['updatingproduct']) and $_GET['updatingproduct'] != "") 
{

    $cat1 = $_GET['updatingproduct'];
}

$imageerror = "";
$productiderror = "";
$user_data_inserted = "";
$user_data_not_inserted = "";


if (isset($_POST['submitproduct']) and isset($_GET['updatingproduct1'])) {



    $cat1 = $_GET['updatingproduct1'];
    $category11 = $_GET['category11'];
    $proid = $_GET['proid'];



    // $productid21 = $_POST['productid'];
    // $productid2 = preg_replace(" /\s+/ ", "", $productid21);

    // $productcategory2 = $_POST['productcategory'];
    // $productcategory =  preg_replace(" /\s+/ ", "",$productcategory2);

    $Producttitle = $_POST['Producttitle'];
    $Price = $_POST['Price'];

    // iamge file data
    $file_name = $_FILES['image']['name'];
    $dateo = date('ljS\ofFYhisA');
    $file_name2 = $dateo .$proid .$category11  . "_" . $file_name;
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    // iamge file data

    $productdetails = $_POST['productdetails'];
    $Descripition = $_POST['Descripition'];

    $Feature = $_POST['Feature'];





    if ($file_type == "image/png" or $file_type == "image/jpg" or $file_type == "image/jpeg" or $file_type == "") 
    {




        $upload_product = "UPDATE `product` SET `name`='$Producttitle',`price`='$Price',`image`='$file_name2',`product_details`='$productdetails',`descripition`='$Descripition',`product_feature`='$Feature' WHERE `product_id`='$proid';";
        $dataenterycheck = mysqli_query($con, $upload_product);

        if ($dataenterycheck) 
        {
            if (move_uploaded_file($file_tmp, "product_images_category/".$file_name2)) 
            {

                $user_data_inserted = "Product Successfully Added !";

                sleep(2);
                header("location:see_product_category.php?seedata=$category11");
            } 
            else 
            {
                $user_data_not_inserted = "Alert! Image not Inserted";
            }
        } 
        else 
        {
            $user_data_not_inserted = "Alert!Data Error Please try again";
        }
    } 
    else 
    {
        $imageerror = " Use only jpg , png , jpeg images !";
    }
}

?>

<style>
    .updateimage 
    {
        width: max-content;
        height: 200px;
        margin-bottom: 30px;
        margin-top: 20px;

    }
</style>
<?php

$display_category = "SELECT * FROM `product`";
$result = mysqli_query($con, $display_category);
$display_category_rows = mysqli_num_rows($result);

for ($i = 0; $i < $display_category_rows; $i++) {
    $data = mysqli_fetch_assoc($result);

    if ($cat1 == $data['product_id']) {


        $product_id1 = $data['product_id'];
        $product_id =  preg_replace(" /\s+/ ", "", $product_id1);


        $category1 = $data['category'];
        $category =  preg_replace(" /\s+/ ", "", $category1);

        $category112 = $data['main_category'];
        $category113 =  preg_replace(" /\s+/ ", "", $category112);


        $name = $data['name'];

        $price = $data['price'];

        $image1 = $data['image'];
        $image =  preg_replace(" /\s+/ ", "", $image1);

        $product_details = $data['product_details'];

        $descripition = $data['descripition'];
        $product_feature = $data['product_feature'];

        $status1 = $data['status'];
        $status  =  preg_replace(" /\s+/ ", "", $status1);
        $timestamp = $data['timestamp'];

        echo "<div class='content pb-0'>
                       <div class='animated fadeIn'>
                           <div class='row'>
                               <div class='col-lg-12'>
                                   <div class='card'>
                                       <div class='card-header'><strong style='font-size: 40px;'>UPDATE PRODUCT DETAILS (290X385 size)</strong><br><small style='color:black;font-weight:bolder;font-size:17px;'><br>Title: <span style='color:red;font-weight:bolder;font-size:17px;'>$name</span><br>Product Id:<span style='color:red;font-weight:bolder;font-size:17px;'>$product_id</span></small>
                   
                                   
                                       </div>
                   
                                       <div class='card-body card-block'>
                                       <h5 style='margin-bottom: 10px;color:red;font-weight:bolder;'>$imageerror</h5>
                                       <h5 style='margin-bottom: 10px;color:red;font-weight:bolder;'>$productiderror</h5>
                   
                                       <h5 style='margin-bottom: 10px;color:green;font-weight:bolder;'> $user_data_inserted</h5>
                                       <h5 style='margin-bottom: 10px;color:red;font-weight:bolder;'>$user_data_not_inserted</h5>
                   
                   
                                           <!-- <------------------form strat--------------------->
                                           <form action='update_product.php?updatingproduct1=$cat1&category11=$category&proid=$product_id' enctype='multipart/form-data' method='POST' class='needs-validation' novalidate>
                   
                                               <div class='form-group'>
                                                   <label for='productid' class=' form-control-label'>Product Id</label>
                                                   <input type='text' disabled id='productid' name='productid' value='$product_id' placeholder='$product_id' class='form-control'>
                                               </div>
                   
                   
                                               <div class='form-group'>
                                               <label for='productcategory' class=' form-control-label'>Main Category</label>
                                               <select name='productcategory' required class='form-control'>
                                                   <option selected disabled value='$category113'>$category113</option>
                                                   <div class='invalid-feedback'>
                                                   </div>
               
                                               </select>
                                           </div>
                                               <div class='form-group'>
                                                   <label for='productcategory' class=' form-control-label'>Sub Category</label>
                                                   <select name='productcategory' required class='form-control'>
                                                       <option selected disabled value='$category'>$category</option>
                                                       <div class='invalid-feedback'>
                                                       </div>
                   
                                                   </select>
                                               </div>

                   
                                               <div class='form-group'>
                                                   <label for='Producttitle' class=' form-control-label'>Product title</label>
                                                   <input type='text' required id='Producttitle' name='Producttitle' value='$name' class='form-control'>
                   
                                                   <div class='valid-feedback'>
                                                       WoW Lovely title!
                                                   </div>
                   
                                                   <div class='invalid-feedback'>
                                                       Please provide your Product title !
                                                   </div>
                                               </div>
                   
                                               <div class='form-group'>
                                                   <label for='Price' class=' form-control-label'>Price</label>
                                                   <input type='text' required id='Price' name='Price' value='$price' class='form-control'>
                   
                   
                                                   <div class='valid-feedback'>
                                                       Perfect Price!
                                                   </div>
                   
                                                   <div class='invalid-feedback'>
                                                       Product Price Missing !
                                                   </div>
                                               </div>
                   
                   
                   
                                               <div class='form-group'>
                                                   <label for='image' class=' form-control-label'>Image</label>
                                                   <input type='file' class='form-control-file' id='image' name='image' >
                                                   <div class='valid-feedback'>
                                                       Beautiful Product Image!
                                                   </div>
                   
                   
                                                   <div class='invalid-feedback'>
                                                       Upload Product Image in (jpg ,png, jpeg) !
                                                   </div>
                                               </div>
                                               <img src='product_images_category/$image' alt='' class='updateimage'>

                                               <div class='form-group'>
                                                   <label for='productdetails'>Product Details</label>
                                                   <textarea class='form-control'  id='productdetails' rows='3' name='productdetails' required >$product_details</textarea>
                   
                                                   <div class='valid-feedback'>
                                                       Best Product Details!
                                                   </div>
                   
                                                   <div class='invalid-feedback'>
                                                       Product Details Needed !
                                                   </div>
                                               </div>
                   
                                               <div class='form-group'>
                                                   <label for='Descripition'>Descripition</label>
                                                   <textarea class='form-control' id='Descripition' rows='3' name='Descripition' required>$descripition</textarea>
                                                   <div class='valid-feedback'>
                                                       Product Described Nicely!
                                                   </div>
                   
                   
                                                   <div class='invalid-feedback'>
                                                       Product Descripition Needed !
                                                   </div>
                                               </div>
                   
                   
                                               <div class='form-group'>
                                                   <label for='Feature'>Features</label>
                                                   <textarea class='form-control' id='Feature' rows='3' name='Feature' required>$product_feature</textarea>
                   
                                                   <div class='valid-feedback'>
                                                       Amazing Features!
                                                   </div>
                   
                                                   <div class='invalid-feedback'>
                                                       Product Feature Needed !
                                                   </div>
                                               </div>
                   
                                               <div class='form-group'>
                                                   <label for='productstatus' class=' form-control-label'>Product Status</label>
                                                   <input type='text' disabled  name='productstatus' value='$status' placeholder='in_stock' class='form-control'>
                                               </div>
                   
                   
                   
                                               <button  style='background-color: black;border:none;' type='submit' name='submitproduct' class='btn btn-lg btn-info btn-block'>
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
                   ";
    }
}


?>


<!-- -----------footer included---------- -->
<?php
require('footer.inc.php');

?>