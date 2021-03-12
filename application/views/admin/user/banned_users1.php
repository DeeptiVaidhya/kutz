<!DOCTYPE html>
<html>
<style type="text/css">
.h4 {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 20px;
}
h4::before, h4::after {
   content : " ---------------------------------- " ;
   /*border-top: 2px solid #c0c0c0;*/
   margin: 0 20px 0 0;
   flex: 1 0 20px;
}

</style>
    <body class="skin-black">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <center><h4><b> BANNED USERS </b></h4></center>
                </section>
                <!-- Main content -->
                <section class="content" >
                    <div class="row" style="padding:0px">
                        <div  class="col-xs-3" ></div>
                        <div class="col-xs-6" >
                            <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                                <div class="box-body table-responsive" >
                                    <?php echo $this->session->flashdata('success'); ?>
                                    <?php echo $this->session->flashdata('alert'); ?>
                                    <br>
                                    <table class="table table-hover">
                                        <tbody>
                                            <?php 
                                            // print_r($customer);die;
                                            if(!empty($customer)){
                                            foreach($customer as $row){ ?>
                                            <tr>
                                                <td><img src="<?php echo base_url();?>/uploads/user/<?php echo $row['image'];?>" class="img-circle" alt="User Image" width="80">&nbsp;&nbsp;&nbsp;<?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></td>
                                                <td ></td>
                                                <td>
                                                 <a href="<?php echo site_url('Home/liftBan')?>/<?php echo $row['customer_id'];?> "><button class="btn btn-sm bg-navy" style=" background-color: #ce0030 !important; border-radius: 6px !important; margin-left: 5px!important;width:100px; margin-top: 16px;">LIFT BAN</button></a>
                                                </td>
                                            </tr>                                             
                                            <?php   
                                            }?>
                                            <?php }else{
                                                echo 'No record found';
                                            } ?>

                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div  class="col-xs-3"></div>
                    </div>
                </section><!-- /.content -->                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    </body>
</html>