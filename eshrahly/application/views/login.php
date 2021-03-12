<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Tambola | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url();?>/assets_front/images/favicon.png" type="image/png" rel="icon">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>/assests/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>/assests/css/font-awesome.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>/assests/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assests/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <style type="text/css">
    .bg-black{
        background: #e9e9e9 !important;
    }
    </style>
    <body class="bg-black">

        <div class="form-box" id="login-box">
          
            <div style="margin-bottom:10px">
                <?php echo $this->session->flashdata('success');?>
                <?php echo $this->session->flashdata('alert');?>
            </div>
            <div class="header" style="background-color: #1fc8db!important;background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)!important;">Admin Login</div>
            <form action="<?php echo base_url('index.php/Login/signIn');?>" method="post" name="login" id="login">
                <div class="body bg-gray" style="background-color:  #ffffff !important;">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" id="username" name="username" style="background: #e9e9e9 !important;"/ >
                    </div>
                    <div class="form-group">
                         <input type="password" class="form-control"  placeholder="Password" id="password" name="password" style="background: #e9e9e9 !important;"/>
                    
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer" >                                                               
                    <button type="submit" class="btn bg-olive btn-block" style="background-color: #1fc8db!important;
    background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)!important;">Login</button>
                </div>
            </form>
        </div>
    </body>
    <script src="<?php echo base_url(); ?>/assests/js/bootstrap.min.js" type="text/javascript"></script> 
        <script type="text/javascript">
        setTimeout(function() {
            $('.alert').slideUp("slow");
        }, 3000);
        </script> 
</html>

