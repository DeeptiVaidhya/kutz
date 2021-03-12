<style type="text/css">
.skin-black .sidebar>.sidebar-menu>li {
    border-top: 1px solid #fff;
    border-bottom: 0 solid #fff;
}
.skin-black .sidebar {
    border-bottom: 1px solid #fcfcfc;
}
.skin-black .sidebar>.sidebar-menu>li>a:hover, .skin-black .sidebar>.sidebar-menu>li.active>a {
    color: #f6f6f6;
    background: #66d9eb9e;
}
.skin-black .sidebar>.sidebar-menu>li:first-of-type {
    border-top: 1px solid #fff;
}

.skin-black .treeview-menu > li > a {
    color: #fff;
}

.treeview-menu li a:hover {
    background: #64cfdb;
}
</style>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas" style=" background-color: #1fc8db!important;
  background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)!important;">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php 
                            $AdminId = $_SESSION['login_id'];
                            $where = array('id' => $AdminId,);
                            $data = $this->Model->singleRowdata($where,'login');
                            ?> 
                            <img src="<?php echo base_url();?>/uploads/admin/<?php echo $data->image;?> " class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $data->fullname; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php
                        $role_id = $_SESSION['role']; 
                    ?>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" style="font-weight: bold;font-size: 14px;">
                        <?php if($role_id == 1 ){?>
                        <li class="active">
                            <a href="<?php echo base_url('index.php/Login/dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php } ?>
                         <?php if ($role_id == 1 ) {?>
                        <li>
                            <a href="<?php echo base_url('index.php/Admin/teacher');?>">
                                <i class="fa fa-user"></i> <span>Teacher</span> 
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($role_id == 1 ){?>
                        <li>
                            <a href="<?php echo base_url('index.php/Admin/student');?>">
                                <i class="fa fa-user"></i> <span>Student</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($role_id == 1 ){?>
                        <li>
                            <a href="<?php echo base_url('index.php/Admin/withdraw_request');?>">
                                <i class="fa fa-folder"></i> <span>Withdraw Request</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($role_id == 1 ){?>
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>CMS</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="color: #f6f6f6;background: #39c5d2;">
                            <li>
                                <a href="<?php echo base_url('index.php/CMS/teacherPages');?>">
                                    <i class="fa fa-circle-o"></i> <span>Teacher CMS</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/CMS/studentPages');?>">
                                    <i class="fa fa-circle-o"></i> <span>Student CMS</span>
                                </a>
                           </li>
                          </ul>
                        </li>
                        <?php } ?>

                         <?php if($role_id == 1 ){?>
                        <li>
                            <a href="<?php echo base_url('index.php/Contact/contact_form');?>">
                                <i class="fa fa-folder"></i> <span>Contact Us</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($role_id == 1 ){?>
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>Setting</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="color: #f6f6f6;background: #39c5d2;">
                            <li >
                                <a href="<?php echo base_url('index.php/Admin/nationality');?>">
                                    <i class="fa fa-circle-o"></i> <span>Nationality</span>
                                </a>
                           </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Admin/city');?>">
                                    <i class="fa fa-circle-o"></i> <span>City</span>
                                </a>
                           </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Admin/learning_level');?>">
                                    <i class="fa fa-circle-o"></i> <span>Learning Level</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url('index.php/Admin/learning_material');?>">
                                    <i class="fa fa-circle-o"></i> <span>Learning Material</span>
                                </a>
                            </li>
                             <li >
                            <a href="<?php echo base_url('index.php/Admin/changePassword');?>">
                                <i class="fa fa-key"></i> <span>Change Password</span>
                            </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Admin/editProfile');?>">
                                    <i class="fa fa-pencil"></i> <span>Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Admin/otherValue');?>">
                                    <i class="fa fa-pencil"></i> <span>Other Adding Value</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Coupon/coupon_managment');?>">
                                    <i class="fa fa-pencil"></i> <span>Coupon Managment</span>
                                </a>
                            </li>
                          </ul>
                        </li>
                        <?php } ?>
                       <!--  <?php if($role_id == 1 ){?>
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>CMS</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu" style="color: #f6f6f6;background: #39c5d2;">
                            <li >
                                <a href="<?php echo base_url('index.php/CMS/Pages');?>">
                                    <i class="fa fa-circle-o"></i> <span>Privacy Policy</span>
                                </a>
                           </li>
                            <li>
                                <a href="<?php echo base_url('index.php/Admin/usage_policy');?>">
                                    <i class="fa fa-circle-o"></i> <span>Usage Policy</span>
                                </a>
                           </li>
                          </ul>
                        </li>
                        <?php } ?> -->
                        <li>
                            <a href="<?php echo base_url('index.php/Admin/logout');?>">
                                <i class="fa fa-power-off"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

          