<style type="text/css">
.profile-user-img {
    margin: 0 auto;
    width: 100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Admin Profile<small></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <?php echo $this->session->flashdata('success');?>
            <?php echo $this->session->flashdata('alert');?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Profile</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <section class="content">
                            <div class="row">
                                <form class="form-horizontal" action="<?php echo site_url('Admin/editAdminDetails')?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-3">
                                            <!-- About Me Box -->
                                            <div class="box box-primary">
                                                <div class="box-body box-profile">
                                                       <img src="<?php echo base_url();?>uploads/admin/<?php echo $profiledetails->image;?>" class="profile-user-img img-responsive img-circle" alt="User profile picture">
                                                    <h3 class="profile-username text-center"> </h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-10" style="margin-bottom: 30px;">
                                                        <input id="fileupload" name="image" type="file" style="margin-left:20%" >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-9">
                                            <div class="msg">
                                                <?php echo $this->session->flashdata('msg'); ?>
                                            </div>
                                            <div class="tab-pane" id="settings">
                                                <input type="hidden" name="id" value="<?php echo $profiledetails->id; ?>" />
                                                
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="email" id="inputEmail" value="<?php echo  $profiledetails->email; ?>" placeholder="email" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Full Name:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="fullname" value="<?php echo $profiledetails->fullname; ?>" placeholder="Enter Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Phone No.</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="mobile" id="inputPhone" value="<?php echo  $profiledetails->mobile; ?>" placeholder="Phone" required>
                                                    </div>
                                                </div>                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" value="Submit" class="btn btn-info" name="editProfile">
                                                    </div>
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