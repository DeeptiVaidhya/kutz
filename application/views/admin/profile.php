<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
                <center>
                    <h4 style="width:50%;"><b>EDIT PROFILE</b></h4></center>
            </section>
    <!-- Main content -->
    <section class="content" >
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-body">
                        <section class="content" style="background: none;">
                            <div class="row">
                                <?php echo $this->session->flashdata('sucesstype'); ?>
                                                <?php echo $this->session->flashdata('msg'); ?>
                                <form class="form-horizontal" action="<?php echo site_url('Home/editAdminDetails')?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6">
                                            <div class="box" style="box-shadow: 0px 0px 0px 1px #d2d6de; border-top: 0px solid #c1c1c1;">
                                                <div class="box-body box-profile">
                                                       <img src="<?php echo base_url();?>uploads/admin/<?php echo $profile_details->image;?>" class="profile-user-img img-responsive img-circle" alt="User profile picture"> 
                                                    <h3 class="profile-username text-center"> </h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-10" style="margin-bottom: 30px;">
                                                        <input id="fileupload" name="image" type="file" style="margin-left: 12px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            
                                            <div class="tab-pane" id="settings">
                                                <input type="hidden" name="admin_id" value="<?php echo $profile_details->admin_id; ?>" /> 
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" class="form-control" name="email"  value="<?php echo $profile_details->email; ?>" placeholder="email" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <label >First Name:</label>
                                                        <input type="text" class="form-control" name="fname" value="<?php echo $profile_details->fname; ?>" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <label>Last Name:</label>
                                                        <input type="text" class="form-control" name="lname"  value="<?php echo $profile_details->lname; ?>" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="box-footer" style="border-top:none;">
                                                        <center><button type="submit" class="btn bg-navy margin" value="Submit" name="submit" style=" background-color: #ce0030 !important; width: 180px;border-radius: 10px;">SAVE</button></center>
                                                </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                </div>
                                <!-- /.col -->
                               
                            </div>
                            <!-- /.row -->
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</aside>
<!-- /.right-side -->