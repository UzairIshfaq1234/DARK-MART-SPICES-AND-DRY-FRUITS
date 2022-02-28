<!-- -----------Header included---------- -->

<?php
require('top.inc.php');
?>

<?php

$bannerimageerror = "";

$user_data_not_inserted = "";
$user_data_inserted = "";
$upadte12="";


if (isset($_POST['submitbanner'])) 
{


  
        
        $largehead = $_POST['largehead'];
        $smallhead = $_POST['smallhead'];

        $bannerid=rand(1, 999999);
        $bannerid_stick =  preg_replace(" /\s+/ ", "",$bannerid);

        // iamge file data
        $file_name = $_FILES['bannerimg']['name'];
        $dateo = date('ljS\ofFYhisA');
        $file_name2 = $dateo . "_" . $file_name;
        $file_size = $_FILES['bannerimg']['size'];
        $file_tmp = $_FILES['bannerimg']['tmp_name'];
        $file_type = $_FILES['bannerimg']['type'];
        // iamge file data
        if ($file_type == "image/png" or $file_type == "image/jpg" or $file_type == "image/jpeg") 
        {
    
            $upload_product = "INSERT INTO `heading_banner` (`large_head`, `small_head`, `banner_img`, `bannerid`,`status`) VALUES ('$largehead', '$smallhead', '$file_name2','$bannerid_stick','Active');";
            $dataenterycheck = mysqli_query($con, $upload_product);
    
            if ($dataenterycheck) 
            {
                if (move_uploaded_file($file_tmp, "frontbanner/" . $file_name2)) 
                {
    
                    $user_data_inserted = "Product Successfully Added !";
    
                    header("location:banner_update_heading.php");
                } 
                else 
                {
                    $user_data_not_inserted = "Alert! Image Error Please try again";
                }
            } 
            else 
            {
                $user_data_not_inserted = "Alert! Data Error Please try again";
            }
        } 
        else 
        {
            $bannerimageerror = "Use only jpg , png , jpeg images!";
        }
    
}


?>





<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong style="font-size: 39px;">Website Banner & Title (628X472 size) </strong><br><small style="color:grey;">Choose something attractive!</small>

                        <a href="#" class="addCategories">
                            <h6 class="box-title " style="font-size: 12px ;background-color:black; color:white;font-weight:bolder; padding:8px;margin-top:10px; border-radius:3px;width:120px;"> <a style="color: white;" href="banner_update_heading.php" class="linkall">All Banner Data</a> </h6>
                        </a>
                    </div>

                    <div class="card-body card-block">



                        <!-- <------------------form strat--------------------->
                        <form action="banner_heading.php" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                            <h5 style="margin-bottom: 10px;color:red;font-weight:bolder;"><?php echo $bannerimageerror; ?> </h5>
                            <h5 style="margin-bottom: 10px;color:red;font-weight:bolder;"><?php echo $user_data_not_inserted; ?> </h5>

                            <h5 style="margin-bottom: 10px;color:green;font-weight:bolder;"><?php echo $user_data_inserted; ?> </h5>

                            <h5 style="margin-bottom: 10px;color:red;font-weight:bolder;"><?php echo $upadte12; ?> </h5>


                            <div class="form-group">
                                <label for="largehead" class=" form-control-label">Large Heading</label>
                                <input type="text" required id="largehead" name="largehead" placeholder="Add Large Heading" class="form-control">

                                <div class="valid-feedback">
                                    WoW Lovely title!
                                </div>

                                <div class="invalid-feedback">
                                    Please provide your Product title !
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="smallhead" class=" form-control-label">Small Heading</label>
                                <input type="text" required id="smallhead" name="smallhead" placeholder="Add Small Heading" class="form-control">


                                <div class="valid-feedback">
                                    Perfect Price!
                                </div>

                                <div class="invalid-feedback">
                                    Product Price Missing !
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="bannerimg" class=" form-control-label">Banner Image</label>
                                <input type="file" class="form-control-file" id="bannerimg" name="bannerimg" required>
                                <div class="valid-feedback">
                                    Beautiful Banner image!
                                </div>


                                <div class="invalid-feedback">
                                    Upload Banner image in png!
                                </div>
                            </div>





                            <button style="background-color: black;border:none;" type="submit" name="submitbanner" class="btn btn-lg btn-info btn-block">
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