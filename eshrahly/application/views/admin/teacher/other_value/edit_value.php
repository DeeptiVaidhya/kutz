<style type="text/css">
    .intro {
        color: #c00000;
    }
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Other Value Information <small>Edit</small>
                    </h1>
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
                                <h3 class="box-title">Other Value Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo base_url('index.php/Admin/editOtherValueDetails');?>" method="post" >
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="">Name <span class="intro" id="errorname"></span></label>
                                        <input type="hidden" class="form-control" name="other_id" value="<?php echo $other_value->other_id;?>">
                                        <input type="text" class="form-control"  name="value_name" value="<?php echo $other_value->value_name; ?>" placeholder="Enter Other Value Name" required="">
                                    </div>
                                </div>
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