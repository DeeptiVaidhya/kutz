
<body class="skin-black">
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <center>
                    <h4><b> TODAY </b></h4></center>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row" style="padding:0px">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-8">
                        <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                        	<?php echo $this->session->flashdata('successtype'); ?>
                                    <?php echo $this->session->flashdata('alert'); ?>
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
                                                <td><img src="<?php echo base_url();?>/uploads/user/<?php echo $row['image'];?>" class="img-circle" alt="User Image" width="80">&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Report/singleReports/')?><?php echo $row['customer_id']; ?>"><b style="font-size: 16px; color:black;"><?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></b></a>&nbsp;&nbsp;
                                                    <?php echo $row['description'];?>
                                                </td>
                                            </tr>
                                             <?php   
                                            $i++; }?>
                                            <?php }else{
                                                echo 'No record found';
                                            } ?>
                                        </tbody>
                                    </table>
                               <!--  <table class="table table-hover">
                                    <tbody>
                                        <?php 
                                            if(!empty($customer)){
                                            foreach($customer as $row){ ?>
                                            <tr>
                                                <td><img src="<?php echo base_url();?>/assests/img/<?php echo $row['image'];?>" class="img-circle" alt="User Image" width="80">&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Report/singleReports/')?><?php echo $row['customer_id']; ?>"><b style="font-size: 16px; color:black;"><?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></b></a>&nbsp;&nbsp;
                                                    <?php echo $row['description'];?>
                                                </td>
                                            </tr>
                                            <?php   
                                            }?>
                                                <?php }else{
                                                echo 'No record found';
                                            } ?>
                                    </tbody>
                                </table> -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-xs-2"></div>
                </div>
            </section>
            <!-- /.content -->
        </aside>
        <!-- /.right-side -->
    </div>
    <!-- ./wrapper -->
</body>