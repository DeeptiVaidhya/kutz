<style type="text/css">
.search-data{
    display: none;
}

.btn-flat{
    font-size: 11px;
    margin-right: 5px;
}
.bg-red{
  background-color: #f31529!important;
}
.bg-maroon {
    background-color: #00c0ef!important;
}
.bg-green{
    background-color: #00cc00!important;
    
}
</style>
<aside class="right-side">                
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Coupon<small>(List)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Coupon</li>
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
                    <h3 class="box-title">List of Coupon</h3> 
                    <a href="<?php echo base_url('index.php/Coupon/couponAdd');?>" class="btn btn-info" style="color:#fff;float: right;padding: 4px;margin: 10px 40px 0px 2px;">Add Coupon <i class="fa fa-plus" style="color:#fff;"></i></a>
                </div>
                <div class="box-body table-responsive default-data">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th>S.No.</th>
                                 <th>Coupon Code</th>
                                 <th>Coupon Name</th> 
                                 <th>Description</th>
                                 <th>Discount</th>
                                 <th>Discount Type</th>
                                 <th>Start Date</th>
                                 <th>End Date</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                            foreach ($coupon as $key) { ?>
                            <tr>
                                <td>
                                    <?php echo $i;  ?>
                                </td>
                                <td>
                                    <?php echo $key['coupon_code']; ?>
                                </td>
                                <td>
                                    <?php echo $key['coupon_name']; ?>
                                </td>
                                <td>
                                    <?php echo $key['description']; ?>
                                </td>
                                <td>
                                    <?php echo $key['discount']; ?>
                                </td>
                                 <td>
                                    <?php echo $key['discount_type']; ?>
                                </td>
                                <!--  <td>
                                    <?php echo $key['coupon_applied_for']; ?>
                                </td> -->
                                <td>
                                    <?php echo $key['start_date']; ?>
                                </td>
                                <td>
                                    <?php echo $key['end_date']; ?>
                                </td>
                                
                                <td>
                                    <a href="<?php echo site_url('Coupon/editCoupon/')?><?php echo $key['coupon_id'];?>" class="btn bg-purple  btn-flat btn-xs" >EDIT</a>
                                    <a href="<?php echo site_url('Coupon/deleteCoupon/')?><?php echo $key['coupon_id']; ?>" class="btn bg-purple btn-red btn-flat btn-xs" style="background-color: #f56954!important">DELETE</a>
                                </td>
                               
                            </tr>   
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
