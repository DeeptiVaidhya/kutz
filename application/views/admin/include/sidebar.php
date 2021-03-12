<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php 
                            $admin_id = $_SESSION['login_id'];
                            $wheredata = array(
                                'admin_id' => $admin_id
                            );
                            $data = $this->Model->singleRowdata($wheredata,'admin');

                            ?> 
                            <img src="<?php echo base_url();?>/uploads/admin/<?php echo $data->image; ?> " class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Welcome,<br><br>
                             <?php echo  $data->fname; ?>&nbsp;<?php echo  $data->lname;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                    	<?php $url_fun = $this->uri->segment(2); ?> 
                        <li class="<?php if ($url_fun == 'reports') {?> active <?php } ?>">
                            <a href="<?php echo base_url('index.php/Report/reports');?>">
                                <i class="fa fa-file"></i> <span>Reports</span>
                            </a>
                        </li>
                        
                        <li class="<?php if ($url_fun == 'beauticianApp') {?> active <?php } ?>" >
                            <a href="<?php echo base_url('index.php/Application/beauticianApp');?>">
                                <i class="fa fa-file"></i> <span>Beauticians Applications</span>
                            </a>
                        </li>
                        <li class="<?php if ($url_fun == 'allUser') {?> active <?php } ?>">
                            <a href="<?php echo base_url('index.php/User/allUser');?>">
                                <i class="fa fa-users"></i> <span>All users</span>
                            </a>
                        </li>
                        <li  class="<?php if ($url_fun == 'bannedUser') {?> active <?php } ?>">
                            <a href="<?php echo base_url('index.php/User/bannedUser');?>">
                                <i class="fa fa-ban"></i> <span>Banned users</span>
                            </a>
                        </li>
                        <li class="<?php if ($url_fun == 'changePassword') {?> active <?php } ?>" >
                            <a href="<?php echo base_url('index.php/Home/changePassword');?>">
                                <i class="fa fa-key"></i> <span>Change Password</span>
                            </a>
                        </li>
                        <li  class="<?php if ($url_fun == 'editProfile') {?> active <?php } ?>">
                            <a href="<?php echo base_url('index.php/Home/editProfile');?>">
                                <i class="fa fa-pencil"></i> <span>Edit Profile</span>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo base_url('index.php/Home/logout');?>">
                                <i class="fa fa-power-off"></i> <span>Logout</span>
                            </a>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
<script type="text/javascript">
	
$('.sidebar-menu li').click(function(){
	$(this).addClass('active');
});

</script>

          