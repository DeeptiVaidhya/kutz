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
                <div class="box-body">
                    <div class="col-md-2 form-group"> </div>
                    <div class="col-md-8 form-group">
                      <!-- <h5><b>Export Order in CSV formate.</b></h5> -->
                      <form action="<?php echo site_url();?>/Admin/ExportData" method="post"  style="float:left;padding-bottom: 10px;">

                       <div class="col-md-4 form-group" style="float: left;">
                        <div class="col-md-3"><label>From</label></div>
                         <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date"  class="form-control pull-right" name="export_from"  
                                 required=""> 
                        </div>
                       </div>
                        <div class="col-md-4 form-group" style="float: left;margin-left: 15px;">
                           <div class="col-lg-1"><label>To</label></div>
                            <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="export_to" class="form-control pull-right" required="">
                        </div>
                       </div>
                       <div class="col-lg-3 p-t-20" style="float: left;margin: 22px 0px 0px 25px;">
                         <div class="form-control-wrapper">
                              <button type="submit" class="btn btn-primary">Export Order</button> 
                         </div>
                       </div>
                      </form> 
                    </div>
                   
                <div class="box-body table-responsive search-data">
                    <table id="example3" class="table table-bordered" >
                            <thead>
                                <tr>
                                <th>S.No.</th>
                                <th>Student Name</th>
                                <th>Teacher Name</th>
                                <th>Date</th>
                                <th>Service Selector</th>
                                <th>Stage</th>
                                <th>Material</th>
                                <th>Cash</th>
                                <th>Credit Card</th>
                                <th>Total</th>
                                <th>Lesson Status</th>
                                <!-- <th>Pay Status</th> -->
                                </tr>
                            </thead>
                    <tbody id="show_history_data"></tbody></table>    
                </div>
                <div class="box-body table-responsive default-data" >
                    <table id="example1" class="table table-bordered "  data-order='[[ 0, "desc" ]]' data-page-length='25' >
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Student Name</th>
                                <th>Teacher Name</th>
                                <th>Date</th>
                                <th>Service Selector</th>
                                <th>Stage</th>
                                <th>Material</th>
                                <th>Cash</th>
                                <th>Credit Card</th>
                                <th>Total</th>
                                <th>Lesson Status</th>
                               <!--  <th>Pay Status</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach ($request as $key) { 
                            //echo '<pre>'; print_r($key);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i;  ?>
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
                                <td>
                                <?php 
                                    $where  = array('teacher_id' => $key['teacher_id']);
                                    $teacher = $this->Model->singleRowdata($where,'teacher');
                                    if ($teacher) {
                                        echo $teacher->teacher_name;  
                                    }
                                 ?>
                                </td>
                                <td><?php echo $key['date']; ?></td>
                                <!-- <td><?php echo gmdate("H:i", $key['total_second']) ;?></td>
                                <td><?php echo gmdate("H:i", $key['remaining_time']);?></td> -->
                                <td> <?php echo $key['student_type']; ?> </td>
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
                               
                                <?php 
                                    $where  = array('request_id' => $key['request_id']);
                                    $transaction = $this->Model->singleRowdata($where,'transaction');
                                    if ($transaction) {
                                        $cash_amount =  $transaction->cash_amount; 
                                        $credit_card = $transaction->credit_card;
                                        //$total = $cash_amount .'+'. $credit_card;
                                        $total = $transaction->total_pay_amount;
                                        $pay_by = $transaction->pay_by;
                                    }
                                ?>
                                <td>
                                    <?php echo $key['cash_amount']; ?>
                                </td>
                                <td>
                                    <?php echo $key['credit_card']; ?>
                                </td>
                                 <td>
                                    <?php echo $key['total_pay_amount']; ?>
                                </td>
                                 <td>
                                    <?php
                                    if ($key['lesson_status'] == 2) {?>
                                        Completed
                                    <?php }else {?>
                                         Pending
                                    <?php } ?>
                                </td>
                                <!-- <td>
                                    <?php
                                    if ($key['payment_status'] == 1) {?>
                                        Completed
                                    <?php }else {?>
                                        Failed
                                    <?php } ?>
                                </td> -->
                               
                            </tr>
                                <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
                <?php $teacher_id = $this->uri->segment(3);?>
               <!--  <center>
                    <a href="<?php echo site_url('Admin/teacherFilterRequest/')?><?php echo $teacher_id;?>">
                        <button class="btn btn-info btn-flat" id="show_btn" style="margin: 0px 0px 25px 0px; font-size: 18px;width: 18%;background-color: #205686;
                            border-color: #205686;">Click For Balance
                        </button>
                    </a>
                </center> -->

            <?php  ?>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>


<script type="text/javascript">
// $(document).ready(function(){  
    //$('.search-data').hide();  
function getRecord(){
    $('.default-data').hide();  
    $('.gif-loader').css('display','inline'); 
    $('.search-data').show(); 
    //alert(agent_id);
    var reservation = document.getElementById('reservation').value;
    var dateArray = reservation.split(' - '); 
    if (reservation == '') {
      var from = '';
      var to = '';
    }else{
      var from = dateArray[0];
      var to   = dateArray[1];
    }
    $.ajax({
      type: "GET",
      url: "<?php echo base_url('index.php/Admin/fetchAllOprationdata');?>/?from="+from+"&to="+to,
      success: function(data){
       $('.gif-loader').css('display','none');   
       $('#example1').hide();
       var obj = JSON.parse(data);
       console.log(data);
       if(obj.length>0){
          var html = '';
          var j=0;
          for(var i=0;i<obj.length;i++){
            var teacher_id      = obj[i]['teacher_id'];
            var teacher_name    = obj[i]['teacher_name'];
            var teacher_email   = obj[i]['teacher_email'];
            var teacher_phone   = obj[i]['teacher_phone'];
            var teacher_gender  = obj[i]['teacher_gender'];
            var nationality     = obj[i]['n_name'];
            var city            = obj[i]['city_name'];
            var qualification   = obj[i]['qualification'];
            var learning_levels = obj[i]['level_name'];
            var learning_materials = obj[i]['material_name'];
            var status             = obj[i]['status'];
         
            j = ++j;
            if (status == '0') {
                getstatus = 'Disapprove';
            }else if(status == '1') {
                getstatus = 'Appprove';
            }else{
                getstatus = 'Pending';
            }
            if (status == 0) {
              var demo = '<a href="<?php echo site_url('Admin/teacherVerify/')?>'+teacher_id+'"><button class="btn btn-success btn-flat btn-xs" style="margin-right: 5px;">APPROVE</button></a>';
            }else {
                var demo = '<a href="<?php echo base_url('index.php/Admin/teacherUnverify/')?>'+teacher_id+'"> <button class="btn btn-warning btn-flat btn-xs" style="margin-right: 5px;">DISAPPROVE</button></a>';
            } 
            var edit = '<a href="<?php echo site_url('Admin/editTeacher/')?>'+teacher_id+'" class="btn bg-purple  btn-flat btn-xs" style="margin-right: 5px;">EDIT</a>'; 

            var deleteUser = '<a href="<?php echo site_url('Admin/deleteTeacher/')?>'+teacher_id+'" class="btn bg-purple btn-red btn-flat btn-xs" style="background-color: #f56954!important;margin-right: 5px;">DELETE</a>';

            var viewTeacher = '<a target="_blank" href="<?php echo base_url('index.php/Admin/viewTeacherDetails/')?>'+teacher_id+'"><button class="btn btn-info btn-flat btn-xs" style="margin-right: 5px;background-color: #238de9;">VIEW</button></a>';

            var request = '<a href="<?php echo site_url('Admin/teacherRequest/')?>'+teacher_id+'" class="btn bg-maroon btn-flat btn-xs" style="margin-right: 5px;">REQUEST</a>';
          
              html += '<tr><td>'+j+'</td><td>'+teacher_name+'</td><td>'+teacher_phone+'</td><td>'+nationality+'</td><td>'+city+'</td><td>'+qualification+'</td><td>'+learning_levels+'</td><td>'+learning_materials+'</td><td>'+getstatus+'</td><td style="display: flex;padding-top: 2rem;padding-bottom: 27px;"> '+demo+' '+edit+' '+deleteUser+' '+viewTeacher+' '+request+'</td> </tr>';
          }
          $('#show_history_data').html(html);
       }else{
          html = '<tr><td  colspan="11">No Data Found</td></tr>';
          $('#show_history_data').html(html);
      }
    }
    });
 }
 getRecord(); 
// });
</script>