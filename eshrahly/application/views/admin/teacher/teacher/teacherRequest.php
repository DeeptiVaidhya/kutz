<style type="text/css">
.search-data{
    display: none;
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
    <h1> Teacher Request<small>(List)</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="<?php echo base_url();?>index.php/Admin/teacher">Back</a></li>
        <li class="active">Teacher Request</li>
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
                    <h3 class="box-title">List of Teacher Request</h3>
                </div>
                <div class="box-body table-responsive default-data" >
                    <table id="example1" class="table table-bordered "  data-order='[[ 0, "desc" ]]' data-page-length='25' >
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Teacher Name</th>
                                <th>Student Name</th>
                                <th>Date</th>
                                <!--<th>Total Time</th>-->
                                <!--<th>Remaining Time</th>-->
                                <th>Service Selector</th>
                                <th>Stage</th>
                                <th>Material</th>
                                <th>Status</th>
                                <th>Cash</th>
                                <th>Credit Card</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach ($request as $key) { ?>
                            <tr>
                                <td>
                                    <?php echo $i;  ?>
                                </td>
                                <td>
                                <?php 
                                    $where  = array('teacher_id' => $key['teacher_id']);
                                    $teacher = $this->Model->singleRowdata($where,'teacher');
                                    if ($teacher) {
                                        echo $teacher->teacher_name;  
                                    }
                                 ?>
                                </td>
                                <td>
                                <?php 
                                    $where  = array('student_id' => $key['student_id']);
                                    $student = $this->Model->singleRowdata($where,'student');
                                    if ($student) {
                                        echo $student->student_name;  
                                    }
                                 ?>
                                </td>
                                <td><?php echo $key['date'] ; ?></td>
                                <!--<td><?php echo gmdate("H:i", $key['total_second']) ;?></td>-->
                                <!--<td><?php echo gmdate("H:i", $key['remaining_time']);?></td>-->
                                <td>
                                    <?php echo $key['student_type']; ?>
                                </td>
                                
                                <td>
                                <?php 
                                $whereLevel = array('l_id' => $key['stage'], );
                                $getLevel = $this ->Model-> singleRowdata($whereLevel, 'learning_level');
                                if ($getLevel) {
                                   echo $getLevel->level_name;
                                }  
                                ?>
                                </td>
                                <td> <?php 
                                $whereCity = array('material_id' => $key['subject'], );
                                $getMat= $this ->Model-> singleRowdata($whereCity, 'learning_material');

                                if ($getMat) {
                                   echo $getMat->material_name;
                                } ?>
                                    
                                </td>
                                <td>
                                    <?php
                                    if ($key['lesson_status'] == 2) {?>
                                        Lesson Completed
                                    <?php }else {?>
                                         Lesson Pending
                                    <?php } ?>
                                </td>
                                <?php 
                                    $where  = array('request_id' => $key['request_id']);
                                    $transaction = $this->Model->singleRowdata($where,'transaction');
                                    if ($transaction) {
                                        $cash_amount =  $transaction->cash_amount; 
                                        $credit_card = $transaction->credit_card;
                                        $total = $transaction->total_pay_amount;
                                        $pay_by = $transaction->pay_by;
                                    }
                                ?>
                                <td>
                                    <?php echo $cash_amount; ?>
                                </td>
                                <td>
                                    <?php echo $credit_card; ?>
                                </td>
                                <td>
                                    <?php echo $total; ?>
                                </td>
                                <!--  <td>
                                    <?php echo $pay_by; ?>
                                </td> -->
                            </tr>
                                <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
                <?php $teacher_id = $this->uri->segment(3);?>
                <center>
                    <a href="<?php echo site_url('Admin/teacherFilterRequest/')?><?php echo $teacher_id;?>">
                        <button class="btn btn-info btn-flat" id="show_btn" style="margin: 0px 0px 25px 0px; font-size: 18px;width: 18%;background-color: #205686;
                            border-color: #205686;">Click For Balance
                        </button>
                    </a>
                </center>

            <?php  ?>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>