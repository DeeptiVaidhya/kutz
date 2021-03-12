<!DOCTYPE html>
<html>
<head>
<title>Apna Desi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
  background-color: lightgreen;
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
	<img src="1024.png" alt="Apna Desi" style="width: 100px;margin-top: 50px;" />
	<h2>Forgot Password</h2>
	<!-- <p>When submitting this form, the result will be opened in a new browser tab:</p> -->
<?php
$con = mysqli_connect("localhost","root","root","event_manager");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //$user_email = $_REQUEST['email'];

  if(isset($_REQUEST['submit'])){
    $email = $_REQUEST['email']; //$user_email;
    $new_password	  = md5($_REQUEST['new_password']);
    $confirm_password = md5($_REQUEST['confirm_password']);

    //$genrateNew_password = password_hash("new_password", PASSWORD_DEFAULT);

    if ($new_password == $confirm_password) {
    	$query = mysqli_query($con, "SELECT * FROM `user` WHERE `email_id` = '$email'");
  		$data  = mysqli_fetch_assoc($query);
  		//print_r($data['email']);

  		$check = mysqli_query($con , "UPDATE `user` SET `password` = '$new_password' WHERE `email_id` = '".$data['email']."'"); 
    	if ($check) {
    		echo "<h4 style='color:#21c6ce;'><b>alert :</b> Password update successfully.</h4>";
    	}
    }else{
    	echo "<h4 style='color:coral;'><b>Error :</b> Confirm Password doesn't match.</h4>";
    }
  }

?>
	<form id="from" target="_blank" style="width:50%;border:3px solid #dccece;padding: 40px 0px 40px 0px;">
		<div class="col-md-12 form-group">
	      <label for="email" style="float: left;">New Password:</label>
	      <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $_REQUEST['email']; ?>" />
	      <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter Password">
	    </div>
	    <div class="col-md-12 form-group">
	      <label for="pwd" style="float: left;">Confirm Password:</label>
	      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-Enter password">
	    </div>
	    <div class="checkbox">
	    	<span id='message'></span>
	    </div>
	    
	    <button type="submit" class="btn btn-default" name="submit">Submit</button>
	</form>
</center>
</body>
</html>
<script type="text/javascript">
$('#new_password, #confirm_password').on('keyup', function () {
  if ($('#new_password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>