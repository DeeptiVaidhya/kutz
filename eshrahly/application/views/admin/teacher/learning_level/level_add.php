<style type="text/css">
    .intro {
        color: #c00000;
    }
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>  Learning Level <small>Add</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#">Learning Level</a></li>
            <li class="active">Add</li>
        </ol>
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
                                <h3 class="box-title">Add Learning Level Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo base_url('index.php/Admin/insertLearningLevel');?>" method="post" id="login" enctype="multipart/form-data" onsubmit="return validation();">
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="intro" id="errorname"></span></label>
                                        <input type="text" class="form-control" id="Learning" name="level_name" placeholder="Enter Learning Level" required="">
                                    </div>
                                    
                                    <div class="box-footer">
                                        <center>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </center>
                                    </div>
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
