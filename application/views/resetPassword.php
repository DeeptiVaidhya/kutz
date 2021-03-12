<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Kutz | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>/assests/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>/assests/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>/assests/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <style type="text/css">
        .bg-black{
                background: url(http://jokingfriend.com/kutz/assests/img/Login.jpg);
        }
        .input-icons i { 
            position: absolute; 
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon { 
            padding: 10px; 
            color: #444; 
            min-width: 50px; 
            text-align: center; 
        } 
          
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
        } 
          
        h2 { 
            color: #444 !important; 
        } 
    </style>
    <body class="bg-black" >

        <div class="form-box" id="login-box">
            <center>
              <img src="<?php echo base_url();?>assests/img/logo.png" alt="" class="logo_img" style="width:150px">
            </center>
            <div style="margin-bottom:10px">
                <?php echo $this->session->flashdata('success');?>
                <?php echo $this->session->flashdata('alert');?>
            </div>
            <form id="from" target="_blank" style="width:50%;border:3px solid #dccece;padding: 40px 0px 40px 0px;">
                <div class="col-md-12 form-group">
                  <label for="email" style="float: left;">New Password:</label>
                  <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $_REQUEST['email']; ?>" />
                  <div class="body bg-transparent" style="background: none;">
                    <div class="input-icons"> 
                        <i class="fa fa-envelope icon"></i> 
                        <input class="input-field" type="password" id="new_password" name="new_password" placeholder="Enter Password"  style="border-radius: 32px !important;background: #212121;border: 0px;color: white;" /> 
                    </div>
                    <div class="input-icons">
                       <i class="fa fa-key icon"></i>
                         <input type="password" class="input-field" id="confirm_password" name="confirm_password" placeholder="Re-Enter password" style="border-radius: 32px !important;background: #212121;border: 0px;"/>                    
                    </div>
                </div>
                <div class="checkbox">
                    <span id='message'></span>
                </div>
                
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
            </form>
           <!--  <form action="<?php echo base_url('index.php/Home/sendLinkToEmail');?>" method="post" name="login" id="login">
                <div class="body bg-transparent" style="background: none;">
                    <div class="input-icons"> 
                        <i class="fa fa-envelope icon"></i> 
                        <input class="input-field" type="text" placeholder="Email" name="email" style="border-radius: 32px !important;background: #212121;border: 0px;color: white;" /> 
                    </div>
                </div>
                <div class=" footer bg-transparent"  style="background: transparent;"> 
                                                                            
                    <button type="submit" class="btn bg-olive btn-block" style="background:#E69151 !important;border-radius: 32px;color: #0d0d0d !important"><b>SUBMIT</b></button>
                </div>
            </form> -->

        </div> 

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

