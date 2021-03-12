<style type="text/css">
    .bg-aqua {
    background-color: #3c8dbc !important;
}

</style>

<aside class="right-side">
    <section class="content-header">
        <h1> Dashboard<small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo $request; ?>
                        </h3>
                        <p> New Request</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/request');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua" style="background-color: #3c8dbc !important;">
                    <div class="inner">
                        <h3>
                            <?php echo $register_teacher; ?>
                        </h3>
                        <p>
                            New Registerd Teacher
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/teacher');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php echo $register_student; ?>
                        </h3>
                        <p>
                            New Registerd Student
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/student');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php echo $operation; ?>
                        </h3>
                        <p>
                            Daily Operation 
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/dailyOperations');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green" style="background-color: #f56954 !important;">
                    <div class="inner">
                        <h3>
                            <?php echo $unregister_teacher; ?>
                        </h3>
                        <p>
                            Unactive Teacher</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/teacher');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua" style="background-color: #f56954 !important;">
                    <div class="inner">
                        <h3><?php echo $unregister_student; ?></h3>
                        <p> Unactive Student </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/student');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green" >
                    <div class="inner">
                        <h3>
                            <?php echo $contact; ?>
                        </h3>
                        <p>Contact</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Contact/contact_form');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua" style="background-color: #999 !important;">
                    <div class="inner">
                        <h3>
                            <?php echo $operation; ?>
                        </h3>
                        <p>
                            All Operation 
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url('index.php/Admin/allOperations');?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div>
        <div class="row">
            <div class="col-xs-12 connectedSortable">
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
       