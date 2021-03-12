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
            <form id="from" action="<?php echo base_url('index.php/Home/updatePassword');?>"  method="post">
                  <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $_REQUEST['email']; ?>" />
                  <div class="body bg-transparent" style="background: none;">
                    <div class="input-icons"> 
                        <i class="fa fa-key icon"></i> 
                        <input class="form-control" type="password" id="new_password" name="new_password" placeholder="Enter Password"  style="border-radius: 32px !important;background: #212121;border: 0px;color: white;padding: 14px 58px;" required/> 
                    </div>
                    <div class="input-icons">
                       <i class="fa fa-key icon"></i>
                         <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-Enter password" style="border-radius: 32px !important;background: #212121;border: 0px;color: white;padding: 14px 58px;" required/>                    
                    </div>
                </div>
                <div class=" footer bg-transparent"  style="background: transparent;">
                    <button type="submit" class="btn bg-olive btn-block" style="background:#E69151 !important;border-radius: 32px;color: #0d0d0d !important"><b>RESET PASSWORD</b></button>
                </div>
            </form>
        </div>
    </body>
</html>

