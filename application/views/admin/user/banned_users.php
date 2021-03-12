<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <center>
            <h4><b> BANNED USERS</b></h4></center>
    </section>
    
            <section class="content">
                <div class="row">
                    <div class="col-xs-2"></div>                    
                    <div class="col-xs-8">
                        <?php echo $this->session->flashdata('success');?>
                        <?php echo $this->session->flashdata('alert');?>
                        <br>
                        <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                            if(!empty($customer)){
                                            foreach($customer as $row){ ?>
                                            <tr>
                                                <!-- <td><?php echo $i; ?></td> -->
                                                <td>
                                                    <img src="<?php echo base_url();?>/uploads/user/<?php echo $row['image'];?>" class="img-circle" alt="User Image" width="80">&nbsp;&nbsp;&nbsp;
                                                    <b><?php echo $row['first_name'];?>&nbsp;
                                                        <?php echo $row['last_name'];?></b>
                                                    <a href="<?php echo site_url('User/liftBan')?>/<?php echo $row['customer_id'];?> ">
                                                        <button class="btn btn-sm bg-navy" style=" background-color: #ce0030 !important; border-radius: 6px !important; margin-left: 5px!important;width:100px; float: right; margin-top: 16px;">LIFT BAN</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php   
                                            $i++; }?>
                                                <?php }else{
                                                echo 'No record found';
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-xs-2"></div>
                </div>

            </section>