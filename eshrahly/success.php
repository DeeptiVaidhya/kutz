<?php 
//print_r($_SESSION);die;
  //include('db.php');
$con = mysqli_connect("localhost","jokingfriend","Joking@123#","pansjbt");
  // $txnid= $_POST['TXNID'];
  // $order= $_SESSION['order_id'];
  echo "success fully done";
  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");
  session_start();
  // following files need to be included
  require_once("./Paytm_Web_Sample_Kit_PHP-master/PaytmKit/lib/config_paytm.php");
  require_once("./Paytm_Web_Sample_Kit_PHP-master/PaytmKit/lib/encdec_paytm.php");
  //require_once("db.php");
  $paytmChecksum = "";
  $paramList = array();
  $isValidChecksum = "FALSE";
  $paramList = $_POST;
  $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";
  $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum);

  if ($_POST["STATUS"] == "TXN_SUCCESS"){
        $datetime = date('Y/m/d H:i:s');
        $payment_status = 1;
        date_default_timezone_set('Asia/Calcutta');
        $date      = date('Y-m-d H:i:s');
        $payment_date = $date;
        mysqli_query($con, "update payment set payment_status='$payment_status', payment_date='$payment_date' where order_id='$ORDERID'");        
    }else{
      header("Location:https://www.mahakaalstore.com");
    }   
   ?>
<link href="http://www.afterfeed.com/template/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://www.afterfeed.com/template/css/main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Thankyou | Mahakaal Shop</title>
      <meta name="author" content="Afterfeed Shop">
      <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
      <link rel="shortcut icon" href="favicon.ico">
      <?php
         require_once('headlink.php');
         ?>
   </head>
   <body class="boxed">
      <!-- Loader -->
      <div id="loader-wrapper">
         <div class="cube-wrapper">
            <div class="cube-folding">
               <span class="leaf1"></span>
               <span class="leaf3"></span>
               <span class="leaf4"></span>
            </div>
         </div>
      </div>
      <div id="wrapper">
         <!-- Page -->
         <div class="page-wrapper">
            <!-- Header -->
            <?php
               $variant = 2;
               require_once('header.php');
               ?>
            <!-- /Sidebar -->
            <!-- Page Content -->
            <main class="page-main">
               <div class="block">
                  <div class="container">
                     <ul class="breadcrumbs">
                        <li><a href="index.php"><i class="icon icon-home"></i></a></li>
                        <li>/<span>Thankyou</span></li>
                     </ul>
                  </div>
               </div>
               <div class="block">
                  <div class="container">
                     <div class="form-card">
                        <center>
                           <h2>Thank You For Order!</h2>
                        </center>
                        <br>
                        <center><b >Please check your email and message.We will call you.</b></center>
                        <br>
                        <div>
                           <center><a href="order-history.php" type="submit" name="btn_otp" class="btn btn-lg">My order</a>
                              <a href="index.php" type="submit" name="btn_otp" class="btn btn-lg">CONTINUE SHOPPING</a>
                           </center>
                        </div>
                        <!-- 
                           <form class="account-create" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="myotp">
                           <label>Enter Code<span class="required">*</span></label>
                           <input type="text" name='otpvalue' class="form-control input-lg">
                           <input type="hidden" name='mobile' class="form-control input-lg" value="<?php echo $_SESSION['mobile'];?>">
                           <div><button type="submit" name="btn_otp" class="btn btn-lg">Submit</button></div>
                           </form> -->
                     </div>
                  </div>
               </div>
            </main>
            <!-- /Page Content -->
            <!-- Footer -->
            <?php
               require_once('footer.php');
               ?>
            <!-- /Footer -->
         </div>
         <!-- /Page -->
      </div>
      <?php
         require_once('extra.php');
         require_once('footerscript.php');
         ?>
   </body>
</html>
