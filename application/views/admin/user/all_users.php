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
   content : " ------------------------------------------------------- " ;
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
                    <center><h4><b> All Users </b></h4></center>
                </section>                
                <!-- Main content -->
                <section class="content" >
                    <!-- <div class="row">
                            <div class="col-12 col-xs-2 ">
                            </div>
                           <div class="col-12 col-xs-8 col-md-8 col-lg-6">
                                 <div class="form-group has-search">
                                    <div class="col-xs-10">
                                        <input type="text" id="search_name" class="form-control" placeholder="Search User" autocomplete="off">
                                    </div> 
                                    <div class="col-xs-2">
                                        <span class="fa fa-search form-control-feedback"></span>
                                    </div>
                                 </div>
                            </div>
                            <div></div>
                            <div class="col-12 col-xs-2">
                            </div>
                    </div> -->
                    <div class="row" style="padding:0px">
                        <div  class="col-xs-2" ></div>
                        <div class="col-xs-8" >
                            <div class="box" style="box-shadow: 0px 0px 0px 1px #e0e0e0; border-top: 0px solid #c1c1c1;">
                                <div class="box-body table-responsive" style="padding: 32px;margin-top: 30px;">
                                    <table class="table table-hover">
                                        <tbody>
                                            <?php 
                                            if(!empty($customer)){
                                            foreach($customer as $row){ ?>
                                            <tr>
                                                <td><img src="<?php echo base_url();?>/assests/img/<?php echo $row['image'];?>" class="img-circle" alt="User Image" style= "height:100px; width: 100px;">&nbsp;&nbsp;&nbsp;<?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></td>
                                                <td ></td>
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
                        <div  class="col-xs-2" ></div>
                    </div>
                </section><!-- /.content -->                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>