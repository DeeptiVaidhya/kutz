<style type="text/css">
    .intro {
        color: #c00000;
    }
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Learning Material Information <small>Edit</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo $this->session->flashdata('success');?>
                    <?php echo $this->session->flashdata('alert');?>
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Learning Material Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo base_url('index.php/Admin/editLearningMaterialDetails');?>" method="post" >
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="intro" id="errorname"></span></label>
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $learning_material->material_id;?>">
                                        <input type="text" class="form-control"  name="material_name" value="<?php echo $learning_material->material_name; ?>" placeholder="Enter Learning Material Name" required="">
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</aside>
<!-- /.right-side -->
<script>
    function validation() {
        var subadmin_name = document.getElementById('Title').value;
        if (subadmin_name.length == "") {
            document.getElementById('error_sub_admin_name').innerHTML = "please enter Title!";
            return false;
        }

        var email = document.getElementById('Email').value;
        if (email.length == "") {
            document.getElementById('erroremail').innerHTML = "please enter email";
            return false;
        }

        var password = document.getElementById('Description').value;
        if (password.length == "") {
            document.getElementById('errorpassword').innerHTML = "please enter Description";
            return false;
        }

        var mobile = document.getElementById('Image').value;
        if (mobile.length == "") {
            document.getElementById('errormobile').innerHTML = "please enter agent Image";
            return false;
        }
    }
</script>