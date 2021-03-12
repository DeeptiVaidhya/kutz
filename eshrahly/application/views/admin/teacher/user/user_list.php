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
    <h1>
        Student
        <small>(List)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Student</li>
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
                    <h3 class="box-title">List of Student</h3> 
                    <a href="<?php echo base_url('index.php/Admin/studentAdd');?>" class="btn btn-info" style="color:#fff;float: right;padding: 4px;margin: 10px 40px 0px 2px;">Add Student <i class="fa fa-plus" style="color:#fff;"></i></a>
                </div><!-- /.box-header -->
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
                    <table id="example3" class="table table-bordered" ><thead><tr><th>S.No.</th><th>Name</th><th>Mobile</th><th>Gender</th><th>Password</th><th>Status</th><th>Action</th></tr></thead>
                    <tbody id="show_history_data"></tbody></table>    
                </div>
                <div class="box-body table-responsive default-data">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                            foreach ($student_list as $key) { ?>
                            <tr>
                                <td>
                                    <?php echo $i;  ?>
                                </td>
                                <td>
                                    <?php echo $key['student_name']; ?>
                                </td>
                                <td>
                                    <?php echo $key['student_phone']; ?>
                                </td>
                                <td>
                                    <?php echo $key['student_gender']; ?>
                                </td>
                                <td>
                                    <?php 
                                    $pass = $key['password'];
                                    echo $pass;
                                    //echo md5($pass);
                                    ?>
                                </td>
                               <!--  <td>
                                    <?php 
                                    if($key['student_image'] == ''){ ?>
                                    <img src="<?php echo base_url();?>/uploads/user.png" class="profile-user-img img-responsive " style= "height:100px; width: 100px;" alt="doc">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url();?>/uploads/student_image/<?php echo $key['student_image']; ?>" class="img-circle" alt="User Image" style= "height:100px; width: 100px;">
                                    <?php } ?>
                                </td> -->
                                <td>
                                    <?php
                                    if ($key['status'] == 0) {?>
                                        Disapprove
                                    <?php }else {?>
                                         Approve
                                    <?php } ?>
                                </td>
                                <td><?php
                                    if ($key['status'] == 0) {?>
                                        <a href="<?php echo base_url('index.php/Admin/studentVerify/'.$key['student_id']);?>"><button class="btn btn-success btn-flat btn-xs">APPROVE</button></a>
                                    <?php }else {?>
                                       <a href="<?php echo base_url('index.php/Admin/studentUnverify/'.$key['student_id']);?>"><button class="btn btn-warning btn-flat btn-xs">DISAPPROVE</button>
                                       </a>
                                    <?php } ?>
                                    </a> 
                                    <a href="<?php echo site_url('Admin/editStudent/')?><?php echo $key['student_id'];?>" class="btn bg-purple  btn-flat btn-xs" >EDIT</a>
                                    <a href="<?php echo site_url('Admin/deleteStudent/')?><?php echo $key['student_id']; ?>" class="btn bg-purple btn-red btn-flat btn-xs" style="background-color: #f56954!important">DELETE</a>

                                     <a href="<?php echo site_url('Admin/studentOperation/')?><?php echo $key['student_id'];?>" class="btn bg-maroon btn-flat btn-xs" style="margin-right: 5px;">OPERATION</a>
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
    //var base_url = 'https://www.jainbandhutrust.com/index.php';
    $.ajax({
      type: "GET",
      url: "<?php echo base_url('index.php/Admin/fetchStudentdata');?>/?from="+from+"&to="+to,
      success: function(data){
       $('.gif-loader').css('display','none');   
       $('#example1').hide();
       var obj = JSON.parse(data);
       console.log(data);
       if(obj.length>0){
          var html = '';
          var j=0;
          for(var i=0;i<obj.length;i++){
            var student_id      = obj[i]['student_id'];
            var student_name    = obj[i]['student_name'];
            var student_phone   = obj[i]['student_phone'];
            var student_gender  = obj[i]['student_gender'];
            var status          = obj[i]['status'];
            // var image           =  obj[i]['student_image'];
            // if (image == '') {
            //    var student_image = ' <img src="<?php echo base_url();?>/uploads/user.png" class="profile-user-img img-responsive " style= "height:100px; width: 100px;" alt="doc">';
            // }else {
            //     var student_image = 'href="<?php echo site_url('uploads/student_image/')?>'+student_id+'" class="img-circle" alt="User Image" style= "height:100px; width: 100px;">';
            // } 
             
            
            j = ++j;
            if (status == '0') {
                getstatus = 'Disapprove';
            }else if(status == '1') {
                getstatus = 'Appprove';
            }else{
                getstatus = 'Pending';
            }

            if (status == 0) {
              var demo = '<a href="<?php echo site_url('Admin/studentVerify/')?>'+student_id+'"><button class="btn btn-success btn-flat btn-xs" style="margin-right: 5px;">APPROVE</button></a>';
            }else {
                var demo = '<a href="<?php echo base_url('index.php/Admin/studentUnverify/')?>'+student_id+'"> <button class="btn btn-warning btn-flat btn-xs" style="margin-right: 5px;">DISAPPROVE</button></a>';
            } 
            var edit = '<a href="<?php echo site_url('Admin/editStudent/')?>'+student_id+'" class="btn bg-purple  btn-flat btn-xs" style="margin-right: 5px;">EDIT</a>'; 

            var deleteUser = '<a href="<?php echo site_url('Admin/deleteStudent/')?>'+student_id+'" class="btn bg-purple btn-red btn-flat btn-xs" style="background-color: #f56954!important;margin-right: 5px;">DELETE</a>';

              html += '<tr><td>'+j+'</td><td>'+student_name+'</td><td>'+student_phone+'</td><td>'+getstatus+'</td><td style="display: flex;padding-top: 2rem;padding-bottom: 27px;"> '+demo+' '+edit+' '+deleteUser+'  </td> </tr>';
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
