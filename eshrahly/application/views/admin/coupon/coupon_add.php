<style type="text/css">
    .intro {
        color: #c00000;
    }
.gif-loader {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    display: none;
    z-index:1060;
}
.gif-loader__img {
    max-width: 150px;
    width: 100%;
    margin-top: 150px;
}
</style>

<div class="gif-loader" style="display:none;"> 
    <center>
        <img src="qa.jainbandhutrust.com/assests/wait.gif" class="gif-loader__img" />
    </center>    
</div>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Coupon <small>Add</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#">Coupon</a></li>
            <li class="active">Add</li>
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
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Coupon Information</h3>
                            </div>
                            <form role="form" action="<?php echo base_url('index.php/Coupon/insertCoupon');?>" method="post">
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Coupon Code <span class="intro" id="errorname"></span></label>
                                        <input type="text" class="form-control" id="agentname" name="coupon_code" placeholder="Enter Code" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Coupon Name <span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="text" class="form-control" id="agentmobile" name="coupon_name" placeholder="Enter Name" required="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description<span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="text" class="form-control"  name="description" placeholder="Enter Description" required="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discount<span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="text" class="form-control" name="discount" placeholder="Enter Discount" required="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discount Type <span class="intro" id="errornationality"></span></label>
                                        </label>
                                        <select class="form-control" name="discount_type" style="text-transform: capitalize;">
                                            <option>--Choose--</option>
                                            <option value="Flat"> Flat </option>
                                            <option value="Percent"> Percent </option>
                                         </select>
                                    </div> 
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Start Date<span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="date" class="form-control"  name="start_date" required="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">End Date<span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="date" class="form-control"  name="end_date" required="" >
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </center>
                                </div>
                            </form>
                        </div>
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</aside>
<!-- /.right-side -->
