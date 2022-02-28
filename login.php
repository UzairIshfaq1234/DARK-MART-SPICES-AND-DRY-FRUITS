<?php


$msg="";
// <-including files for using perpose ->
require('connection.php');
require('function_inc.php');
session_start();

if (isset($_POST['submit'])) {
   $username = get_safe_value($con, $_POST['username']);
   $password = get_safe_value($con, $_POST['password']);

   // echo $username;
   $sql = "SELECT * FROM `admin_users` WHERE `username`='$username' AND `password` = '$password'";
   $res=mysqli_query($con,$sql);
   $count=mysqli_num_rows($res);

   if($count>0)
   {
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;

      header('location:categories.php');

      die();
   }
   else{
      $msg="Please enter correct deatils";
   }



}

?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Login Page</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="assets/css/normalize.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/themify-icons.css">
   <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
   <link rel="stylesheet" href="assets/css/flag-icon.min.css">
   <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
   <div class="sufee-login d-flex align-content-center flex-wrap">
      <div class="container">
         <div class="login-content">
            <div class="login-form mt-150">
               <form action="login.php" method="POST">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" require name="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" require class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
               </form>
               <div style="margin-top:15px; color: red;" class="error">
                  <?php echo $msg; ?>

               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
   <script src="assets/js/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/plugins.js" type="text/javascript"></script>
   <script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>