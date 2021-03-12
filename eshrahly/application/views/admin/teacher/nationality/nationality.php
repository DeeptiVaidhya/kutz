<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nationality
        <small>(List)</small>
    </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Nationality</li>
        </ol>
    </section>
    <div class="col-md-12">
        <?php echo $this->session->flashdata('success');?>
            <?php echo $this->session->flashdata('alert');?>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Nationality</h3>
                        <a href="<?php echo base_url('index.php/Admin/addNationality');?>" class="btn btn-info" style="color:#fff; float: right;padding: 4px;margin: 10px 40px 0px 2px;">Add Nationality <i class="fa fa-plus " style="color:#fff;"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="overflow-y: scroll;">

                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $i=1;
                            foreach ($nationality as $key) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i;  ?>
                                    </td>
                                    <td>
                                        <?php echo $key['n_name']; ?>
                                    </td>
                                    <td style="display: flex;padding-top:2rem;padding-bottom: 27px;">
                                    <a href="<?php echo site_url('Admin/editNationality/')?><?php echo $key['n_id'];?>" class="btn bg-purple  btn-flat btn-xs" style="margin-right: 5px;">EDIT</a>
                                    <a href="<?php echo site_url('Admin/deleteNationality/')?><?php echo $key['n_id']; ?>" class="btn bg-purple btn-red btn-flat btn-xs" style="background-color: #f56954!important;margin-right: 5px;">DELETE</a>
                                    </td>
                                </tr>
                                    <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->