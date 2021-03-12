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
.table_hide{
    display: none;
}
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <center><button class="btn btn-info btn-flat" id="show_btn" style="margin-top: 30px;
    font-size: 18px;
    margin-left: 100px;">Click For Balance</button></center>
    <div class="table_hide" id="table_hide">
        <section class="content-header">
        <h1> Teacher Request<small>(List)</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
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
                    <div class="col-md-3 form-group"> </div>
                    <div class="col-md-5 form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation"/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <div class="col-md-4 form-group" style="padding-top: 24px;">
                        <button type="submit" onclick="getRecord();" class="btn-success applyBtn btn btn-small" style="background-color: #D81B60 !important;border-color: #d81b60;">Submit</button> 
                    </div>
                    </div><!-- /.box-body -->
                    <div class="box-body table-responsive search-data">
                        <table id="example3" class="table table-bordered" ><thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Teacher Name</th>
                                    <th>Student Name</th>
                                    <th>Date</th>
                                    <th>Service Selector</th>
                                    <th>Stage</th>
                                    <th>Material</th>
                                    <th>Status</th>
                                    <th>Cash</th>
                                    <th>Credit Card</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                        <tbody id="show_history_data"></tbody></table>    
                    </div>
                    <div class="box-body table-responsive default-data">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Teacher Name</th>
                                    <th>Student Name</th>
                                    <th>Date</th>
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
                                <?php 
                            $i=1;
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
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($key['date'])); ?></td>
                                    <td>
                                        <?php echo $key['service_selector']; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $key['stage']; ?>
                                    </td>
                                    <td>
                                        <?php echo $key['subject']; ?> 
                                    </td>
                                    <td>
                                        <?php
                                        if ($key['is_status'] == 1) {?>
                                            Completed
                                        <?php }else {?>
                                             Cancled
                                        <?php } ?>
                                    </td>
                                     <td>
                                        <?php echo $key['amount']; ?>
                                    </td>
                                     <td>
                                        <?php echo $key['pay_by']; ?>
                                    </td>
                                    <td>
                                        <?php echo $key['total']; ?>
                                    </td>
                                </tr>
                                    <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    </div>
    
    <!-- /.content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $("#show_btn").click(function(){
        alert('sdsd')
      $("#table_hide").show();
      $("#show_btn").hide();
    });
</script>

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
    url: "<?php echo base_url('index.php/Admin/fetchTeacherReqdata');?>/?from="+from+"&to="+to,
      success: function(data){
       $('.gif-loader').css('display','none');   
       $('#example1').hide();
       var obj = JSON.parse(data);
       console.log(data);
       if(obj.length>0){
          var html = '';
          var j=0;
          for(var i=0;i<obj.length;i++){
            var teacher_name   = obj[i]['teacher_name'];
            var student_name   = obj[i]['student_name'];
            var stage        = obj[i]['stage'];
            var subject      = obj[i]['subject'];
            var is_status    = obj[i]['is_status'];
            var amount       = obj[i]['amount'];
            var pay_by       = obj[i]['pay_by'];
            var total        = obj[i]['total'];
            var service_selector = obj[i]['service_selector'];
            var date = obj[i]['date'];

            if (is_status == '1') {
                getstatus = 'Completed';
            }else{
                getstatus = 'Cancled';
            }
            j = ++j;

            html += '<tr><td>'+j+'</td><td>'+teacher_name+'</td><td>'+student_name+'</td><td>'+date+'</td><td>'+service_selector+'</td><td>'+stage+'</td><td>'+subject+'</td><td>'+getstatus+'</td><td>'+amount+'</td><td>'+pay_by+'</td><td>'+total+'</td></tr>';
          }
          $('#show_history_data').html(html);
       }else{
          html = '<tr><td  colspan="8">No Data Found</td></tr>';
          $('#show_history_data').html(html);
      }
    }
    });
 }
 getRecord(); 
// });
</script>