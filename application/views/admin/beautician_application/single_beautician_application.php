<body class="skin-black">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center><h4 style="width: 33.33333333333333%;"><b>APPLICATIONS</b></h4></center>
                </section>
                <!-- Main content -->
                <section class="content" >
                    <div class="row" style="padding:0px">
                        <div  class="col-xs-4"></div>
                        <div class="col-xs-4" >
                            <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            if(!empty($customer)){
                                            foreach($customer as $row){ ?>
                                                <div class="box-body">
                                                     <div class="form-group">
                                                        <center>
                                                            <img src="<?php echo base_url();?>/uploads/user/<?php echo $row['image'] ?>" class="img-circle" alt="User Image" width="80">
                                                            <h5><b style="font-size: 16px; color:black;"><?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></b></h5>
                                                        </center>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-control" style="height: 100px;background-color: #eee;text-align: center;    padding-top: 34px;"><b>DOCUMENT</b></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-control" style="height: 100px;background-color: #eee;text-align: center;    padding-top: 34px;"><b>DOCUMENT</b></div>
                                                    </div>
                                                </div><!-- /.box-body -->
                                                <div class="box-footer">
                                                        <center>
                                                            <button type="submit" class="btn bg-navy margin" value="Submit" style="background-color: #1a941a !important; width: 200px;  border-radius: 8px;">ACCEPT APPLICATION</button>
                                                        </center>
                                                         <center>
                                                            <button type="submit" class="btn bg-navy margin" value="Submit" style="background-color: #ce0030 !important; width: 200px;  border-radius: 10px;">DECLINE</button>
                                                        </center>
                                                </div>
                                                 <?php   
                                            $i++; }?>
                                            <?php }else{
                                                echo 'No record found';
                                            } ?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div  class="col-xs-4"></div>
                    </div>
                </section><!-- /.content -->                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

</body>
</html>