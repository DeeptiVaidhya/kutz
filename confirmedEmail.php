<!DOCTYPE html>
<html>
<head>
<title>Kutz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
  /*background-color: lightgreen;*/
  background: url(http://jokingfriend.com/kutz/assests/img/Login.jpg) repeat center center fixed;
}

/*@media only screen and (max-width: 600px) {
  body {
    #form{
      width: 100%
    }
  }
}*/
</style>
</head>
<body>
<center>
  <img src="http://jokingfriend.com/kutz/assests/img/logo.png" alt="Apna Desi" style="width: 100px;margin-top: 50px;" />
  <!-- <h2 style="color: white;">Confirm Email</h2> -->
  <!-- <p>When submitting this form, the result will be opened in a new browser tab:</p> -->
<?php
$con = mysqli_connect("localhost","jokingfriend","Joking@123#","kutz");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //$user_email = $_REQUEST['email'];

  if(isset($_REQUEST['submit'])){
    $customer_ids = $_REQUEST['customer_id']; //$user_email;

    $query = mysqli_query($con, "SELECT * FROM `customers` WHERE `customer_id` = '".$customer_ids."'");
    $data  = mysqli_fetch_assoc($query);

      $check = mysqli_query($con , "UPDATE `customers` SET `email_verify` = '1' WHERE `customer_id` = '".$data['customer_id']."'"); 
      if ($check) {
        echo "<h4 style='color:#286090;margin:20px;'><b></b> Email verify successfully.</h4>";
      }else{
        echo "<h4 style='color:#da2d2c;margin:20px;'><b>Sorry :</b> Can't verify  this email.</h4>";
      }
  }    


  $query1 = mysqli_query($con, "SELECT * FROM `customers` WHERE `customer_id` = '".$_GET['email']."'");
  $data1   = mysqli_fetch_assoc($query1);
  if($data1['email_verify'] == '0'){
?>
  
  
  <form id="from" style="width:50%;padding-top: 50px;">

      <div class="col-md-12 form-group">
        <label for="email" style="float: left;color: white;">Welcome to Kutz community!</label>
        <label for="email" style="float: left;color: white;">Click below to confirm your email and create your account with us.</label>
        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?php echo $_REQUEST['email']; ?>" />
      </div>

      
      <button type="submit" class="btn btn-default" name="submit">Confirm Email</button>
      <p style="margin-top: 25px;color: brown;">if you got this email in error, Ignore this email</p>
  </form>

<?php }else{ ?>
    <div class="col-md-12 form-group">
      <h2 style="color: white;">Verified</h2>
      <label for="email" style="text-align: center;color: #f15b5b;font-size: 15px;">You are succesfully verified  by this email.</label>
    </div>
    
<?php } ?>
</center>
</body>
</html>
