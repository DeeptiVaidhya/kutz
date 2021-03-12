<style type="text/css">
.skin-black .logo {
    background-color: #1fc8db!important;
    background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)!important;
}
.goog-te-combo{
    color: #00c0ef;
    border: 0px solid #ffffff;
}
.goog-logo-link{
    display: none;
}
.skiptranslate goog-te-gadget{
    display: none !important;
    font-size: 0px !important;
}
.goog-te-gadget {
    color: #fff !important;
}
.goog-te-gadget .goog-te-combo {
    margin: 12px 0 !important;
}

.no-print {
    display: none;
}
</style>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Elearning</title>
        <link href="<?php echo base_url();?>/assets_front/images/favicon.png" type="image/png" rel="icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>/assests/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>/assests/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>/assests/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url();?>/assests/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url();?>/assests/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo base_url();?>/assests/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url();?>/assests/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url();?>/assests/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>/assests/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assests/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
           <a href="<?php echo base_url('index.php/Login/dashboard');?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Eleaning
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <div id="google_translate_element"></div>
                            <!-- a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                
                            </a> -->
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                
                               <!--  <li class="user-header bg-light-blue" style="background-color: #1fc8db!important;background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)!important;">
                                    
                                    <img src="<?php echo base_url();?>/uploads/admin/<?php echo $data->image;?> " class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $data->fullname; ?>
                                    </p>
                                </li> -->
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <!-- <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('index.php/Admin/profile')?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('index.php/Login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        