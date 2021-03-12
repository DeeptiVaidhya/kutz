<body class="skin-black">
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <?php 
                if(!empty($customer)){
                foreach($customer as $row){ ?>
                <section class="content-header">
                    <center>
                        <h4 style="width: 33.33333333333333%;"><b><?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?> Report</b></h4></center>
                </section>
                <section class="content">
                    <div class="row" style="padding:0px">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-4">
                            <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                                <?php echo$this->session->flashdata('msg'); ?>
                                    <?php echo$this->session->flashdata('msg1'); ?>
                                        <div class="box-body table-responsive">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <!-- <div class="col-sm-2"></div> -->
                                                    <div class="col-sm-12">
                                                        <center>
                                                            <img src="<?php echo base_url();?>/uploads/user/<?php echo $row['image'];?>" class="img-circle" alt="User Image" width="80">
                                                            <h5><b style="font-size: 16px;"><?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></b></h5>
                                                            <span>
                                                        <?php
                                                          for($i=1;$i<=$row['rate'];$i++) {?>
                                                    <img src="<?php echo base_url();?>/assests/img/star.jpg" class="img-circle" alt="Image" style="width: 30px;padding-top: 18px!important;">
                                                    <?php // echo $row['rate'];?>
                                                          <?php }  ?>
                                                </span>
                                                            <p style="padding-top: 18px!important;">
                                                                <?php echo $row['review'];?>
                                                            </p>
                                                        </center>

                                                    </div>
                                                    <!--  <div class="col-sm-2"></div> -->
                                                </div>
                                            </div>
                                            <?php   }?>
                                                <div class="box-footer" style="border-top:none;">
                                                    <center>
                                                        <a href="<?php echo site_url('Report/delateReview')?>/<?php echo $row['customer_id'];?> ">
                                                            <button type="submit" class="btn bg-navy margin" value="Submit" name="submit" style=" background-color: #ce0030 !important; width: 220px;border-radius: 8px;">DELETE REVIEW</button>
                                                        </a>
                                                    </center>
                                                    <center>
                                                        <a href="<?php echo site_url('Report/banReportUser')?>/<?php echo $row['customer_id'];?> ">
                                                            <button type="submit" class="btn bg-navy margin" value="Submit" name="submit" style=" background-color: #ce0030 !important; width: 220px;border-radius: 8px;">BAN THIS USER</button>
                                                        </a>
                                                    </center>
                                                </div>
                                                <?php }else{
                                                echo 'No record found';
                                            } ?>
                                        </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-xs-4"></div>
                    </div>
                </section>

        </aside>
        <!-- /.right-side -->
    </div>
    <!-- ./wrapper -->
</body>

</html>