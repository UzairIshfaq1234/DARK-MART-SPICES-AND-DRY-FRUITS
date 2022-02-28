
<?php
// <!-- -----------Header included---------- -->

require('top.inc.php');
$show_success="";
$show_error="";
$show_exits="";
$show_Null="";

// Adding category to database

if (isset($_POST['submitCategory'])) 
{
    $Category1 = $_POST['Category'];
    $Category  =  preg_replace(" /\s+/ ", "",$Category1);




$Category_check= "SELECT * FROM `main_category` WHERE `main_category` = '$Category'";
$result = mysqli_query($con, $Category_check);
$if_exits = mysqli_num_rows($result);

if($Category=="")
{
    $show_Null="Please add a product category";

}
else

{
    if($if_exits>0)
    {
    
        $show_exits="Product Category Already Exits";
    }
    
    else
    {
    
        $Category_query = "INSERT INTO `main_category` (`main_category`, `status`) VALUES ('$Category', 'Active');";
        $result = mysqli_query($con, $Category_query);
    
    
        if($result)
        {
            $show_success="Category successfully added !";

        }
        else
        {
            $show_error="Category Not added !";
        
        }
    
    }

}


}

?>




<div class="content pb-0">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">

            <!-- form starting -->
                <form action="add_main_category.php" method="POST">


                    <div class="card-header"><strong style="font-size: 39px;">Add Main Product Categories</strong><br><small style="color:grey;">Main Categories should not be repeated !</small>
                     </div>

                    <!-- showing error -->
                    <div class="card-body card-block">
                    <label for="Category" class=" form-control-label" style="color:Green;font-weight:bold;"> <?php echo $show_success; ?></label>

                    <label for="Category" class=" form-control-label" style="color:red;font-weight:bold;"> <?php echo $show_error; ?></label>

                    <label for="Category" class=" form-control-label" style="color:red;font-weight:bold;"> <?php echo $show_Null; ?></label>
                    <!-- end showing error -->

                       <div class="form-group">
                           <label for="Category" class=" form-control-label">Product Category</label>
                           <input required type="text" id="Category" name="Category" placeholder="Enter your Product category" class="form-control">
                        </div>
                     
                       <button id="payment-button" type="submit" name="submitCategory" class="btn btn-lg btn-info btn-block" style="background-color: black; border:none;"> <span id="payment-button-amount">Submit</span>
                       </button>

                    </div>
                    <p style="margin-left: 20px;color:red;"><strong><?php  echo $show_exits;   ?></strong></p>

                </form>

                <!-- form ending -->

            </div>
         </div>
      </div>
   </div>
</div>

<!-- -----------footer included---------- -->
<?php
require('footer.inc.php');

?>