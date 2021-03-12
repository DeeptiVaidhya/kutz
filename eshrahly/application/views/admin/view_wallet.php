<aside class="right-side">
    <section class="content-header">
        <h1>
            Withdraw Request
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#"> Withdraw Request</a></li>
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
                <div class="box box-primary" style="height: 200px;">
                    <div class="box-header">
                        <h3 class="box-title"> Withdraw Request Information</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"  action="<?php echo base_url('index.php/Admin/updateWithdraw');?>" method="post" >
                        <?php 
                        $withdraw_id = $this->uri->segment(3);
                        //print_r($withdraw_id);die;
                        ?>
                        <input type="hidden" name="withdraw_id" value="<?php echo $withdraw_id;?>">
                        <div class="box-body" style="padding: 20px;">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">--Select Option--<span class="intro" id="errorname"></span></label>
                                <select class="form-control" name="status" required>
                                    <option value="1">Inprocess</option>
                                    <option value="2">Completed</option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer" style="padding: 5px!important;">
                            <button type="submit" class="btn bg-navy" style="background-color: #3c763d !important">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

