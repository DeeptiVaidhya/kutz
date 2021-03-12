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

        input-field:focus {
          border: none!important;
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
            <!-- <div class="header">Sign In</div> -->
            <form action="<?php echo base_url('index.php/Home/signIn');?>" method="post" name="login" id="login">
                <div class="body bg-transparent" style="background: none;">
                    <div class="input-icons"> 
                        <i class="fa fa-envelope icon"></i> 
                        <input class="form-control" type="text" placeholder="Email" name="username" style="border-radius: 32px !important;background: #212121;border: 0px;color: white;     padding: 14px 58px;" required="" /> 
                    </div>
                    <div class="input-icons">
                       <i class="fa fa-key icon"></i>
                         <input type="password" class="form-control"  placeholder="Password" id="password" name="password" style="border-radius: 32px !important;background: #212121;border: 0px;color: white;padding: 14px 58px;" required=""/>                    
                    </div>
                </div>
                <center><p><u><a href="<?php echo base_url('index.php/Home/forgotPassword');?>" style="color: #E69151 !important;font-size: 16px;"><b>Forgot Password</b></a></u></p></center> 
                <div class=" footer bg-transparent"  style="background: transparent;">
                    <button type="submit" class="btn bg-olive btn-block" style="background:#E69151 !important;border-radius: 32px;color: #0d0d0d !important"><b>LOGIN</b></button>
                </div>
            </form>

        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>/assests/js/bootstrap.min.js" type="text/javascript"></script> 
        <script type="text/javascript">
        setTimeout(function() {
            $('.alert').slideUp("slow");
        }, 1000);
        </script>       

    </body>
</html>

