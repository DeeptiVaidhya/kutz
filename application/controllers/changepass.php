
<body class="skin-black">
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <center><h4 style="width:50%;"><b>CHANGE PASSWORD</b></h4></center>
            </section>
             <section class="content" >
                    <div class="row" style="padding:0px">
            
                        <div  class="col-xs-3" ></div>
                        <div class="col-xs-6" >
                            <?php echo $this->session->flashdata('sucesstype'); ?>
                                <?php echo $this->session->flashdata('alert'); ?>
                            <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                                
                                <div class="box-body table-responsive" style="padding: 32px;">
                                     <form class="form-horizontal" action="<?php echo site_url('Home/changeAdminPassword');?>" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <input type="hidden" class="form-control" name="old_password" id="old_password" value="<?php echo $pass->password; ?>" placeholder="Old password">
                                                <label for="exampleInputEmail1">Current Password</label>
                                                <input type="password" class="form-control" name="password" id="pwd" placeholder="Current Password" style="border-radius: 10px !important;" required="" data-toggle="password">
                                                <span id='msg'></span>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="form-group"> 
                                            <div class="col-sm-2"></div>                                           
                                            <div class="col-sm-8">
                                                <label for="exampleInputEmail1">New Password</label>
                                                <input type="password" class="form-control" name="new_password" id="password" placeholder=" New Password" style="border-radius: 10px !important;" required="" data-toggle="password">
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <label for="exampleInputEmail1"> Confirm New Password</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" style="border-radius: 10px !important;" required="" data-toggle="password">
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <span id='message'></span>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer" style="border-top:none;">
                                            <center><button type="submit" class="btn bg-navy margin" value="Submit" name="submit" style=" background-color: #ce0030 !important; width: 290px;border-radius: 10px;">SAVE</button></center>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div  class="col-xs-3"></div>
                    </div>
                </section>
        </aside>
        <!-- /.right-side -->
    </div>
    <!-- ./wrapper -->
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script type="text/javascript">
    // alert('bdbsgnjjgg');
    $("#pwd").password('toggle');
</script>