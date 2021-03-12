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
    background-color: #205686!important;
}
.bg-green{
    background-color: #00cc00!important;
    
}
.table_inline{
    display: flex;
    padding-top: 3rem;
    padding-bottom: 52px!important;
}
.cell-breakWord {
word-wrap: break-word;
max-width: 150px;
/*line-height: 19px!important;*/
/*text-align: justify!important;*/
/*width: 50%;*/
/*padding: 10px!important;*/
}
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
 <section class="content-header">
    <h1> Teacher <small>(List)</small>
</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Teacher</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">                            
            <div class="box" style="overflow-x:scroll;">
                <div class="box-header">
                    <h3 class="box-title">List of Teacher </h3> 
                    <a href="<?php echo base_url('index.php/Admin/addTeacher');?>" class="btn btn-info" style="color:#fff;float: right;padding: 4px;margin: 10px 40px 0px 2px;">Add Teacher <i class="fa fa-plus" style="color:#fff;"></i></a>                               
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
                    <table id="example3" class="table table-bordered" ><thead><tr><th>S.No.</th><th>Name</th><th>Mobile</th><th>Nationality</th><th>City</th><th>Qualification</th><th>Learning Levels</th><th>Learning Materials</th><th>Status</th><th>Action</th></tr></thead>
                    <tbody id="show_history_data"></tbody></table>    
                </div>
                <div class="box-body table-responsive default-data" >
                    <table id="example1" class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Nationality</th>
                                <th>City</th>
                                <th>Qualification</th>
                                <th>Learning Levels</th>
                                <th>Learning Materials</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $i=1;
                        foreach ($teacher_list as $key) { ?>
                            <tr>
                                <td> <?php echo $i;?></td>
                                <td><?php echo $key['teacher_name']; ?></td>
                                <td> <?php echo $key['teacher_phone']; ?> </td>
                                <td>
                                    <?php 
                                        $where  = array('n_id' => $key['nationality']);
                                        $nationality = $this->Model->singleRowdata($where,'nationality');
                                        if ($nationality) {
                                            echo $nationality->n_name; 
                                        }
                                     ?>
                                </td>
                                <td>
                                    <?php 
                                        $where  = array('city_id' => $key['city']);
                                        $city = $this->Model->singleRowdata($where,'city');
                                        if ($city) {
                                            echo $city->city_name;
                                        }
                                     ?>
                                </td>
                                <td> <?php echo $key['qualification']; ?> </td>
                                <td class="cell-breakWord">
                                    <?php 
                                    if($key['learning_levels']){
                                        $result = $this->Model->learning_level($key['learning_levels']);
                                        if(!empty($result)){
                                            echo $result;
                                        }    
                                    }
                                    ?>
                                </td>
                                <td class="cell-breakWord">
                                    <?php
                                    if($key['learning_materials']){
                                        $learning_materials = $this->Model->learningMaterials($key['learning_materials']);
                                        if(!empty($learning_materials)){
                                            echo $learning_materials;
                                        }    
                                    }
                                    
                                    
                                    // $learning_materials = explode(',', $key['learning_materials']);
                                    // foreach ($learning_materials as $val) {
                                    // $where = array('material_id' => $val);
                                    // $mat = $this->Model->selectLearningMat($where, 'learning_material');
                                    // echo $mat->material_name;
                                    // }
                                    ?>
                                </td>
                               
                                <td>
                                    <?php
                                    if ($key['status'] == 0) {?>
                                        Disapprove
                                    <?php }else {?>
                                         Approve
                                    <?php } ?>
                                </td>
                                <td class="table_inline">
                                    <a href="<?php echo site_url('Admin/teacherRequest/')?><?php echo $key['teacher_id'];?>" class="btn bg-maroon btn-flat btn-xs" style="margin-right: 5px;font-size: 12px;padding: 4px 10px 6px 8px">OPERATION</a>
                                    <?php
                                    if ($key['status'] == 0) {?>
                                    <a href="<?php echo base_url('index.php/Admin/teacherVerify/'.$key['teacher_id']);?>">
                                        <button class="btn btn-success btn-flat btn-xs" style="margin-right: 5px;padding: 4px 10px 6px 8px;    font-size: 12px;">APPROVE</button>
                                    </a>
                                    <?php }else {?>
                                        <a href="<?php echo base_url('index.php/Admin/teacherUnverify/'.$key['teacher_id']);?>">
                                            <button class="btn btn-warning btn-flat btn-xs" style="margin-right: 5px;padding: 4px 10px 6px 8px;    font-size: 12px;">DISAPPROVE</button>
                                        </a>
                                    <?php } ?>
                                        <a href="<?php echo site_url('Admin/editTeacher/')?><?php echo $key['teacher_id'];?>" class="btn bg-purple  btn-flat btn-xs" style="margin-right: 5px;padding: 4px 10px 6px 8px;font-size: 12px;">EDIT</a>
                                        <a href="<?php echo site_url('Admin/deleteTeacher/')?><?php echo $key['teacher_id']; ?>" class="btn bg-purple btn-red btn-flat btn-xs" style="background-color: #f56954!important;margin-right: 5px;padding: 4px 10px 6px 8px;font-size: 12px;">DELETE</a>
                                         
                                         <a href="<?php echo site_url('Admin/viewTeacherDetails/')?><?php echo $key['teacher_id'];?>" class="btn bg-yellow btn-flat btn-xs" style="margin-right: 5px;padding: 4px 10px 6px 8px;background-color: #2e8e17!important;    font-size: 12px;">VIEW</a>
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
    $.ajax({
      type: "GET",
      url: "<?php echo base_url('index.php/Admin/fetchTeacherdata');?>/?from="+from+"&to="+to,
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
            var learning_levels = obj[i]['learning_levels'];
            var learning_materials = obj[i]['learning_materials'];
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

            var viewTeacher = '<a target="_blank" href="<?php echo base_url('index.php/Admin/viewTeacherDetails/')?>'+teacher_id+'"><button class="btn btn-info btn-flat btn-xs" style="margin-right: 5px;background-color: #2e8e17!important;">VIEW</button></a>';

            var request = '<a href="<?php echo site_url('Admin/teacherRequest/')?>'+teacher_id+'" class="btn bg-maroon btn-flat btn-xs" style="margin-right: 5px;">OPERATION</a>';
          
              html += '<tr><td>'+j+'</td><td>'+teacher_name+'</td><td>'+teacher_phone+'</td><td>'+nationality+'</td><td>'+city+'</td><td>'+qualification+'</td><td class="cell-breakWord">'+learning_levels+'</td><td class="cell-breakWord">'+learning_materials+'</td><td>'+getstatus+'</td><td style="display: flex;padding-top: 2rem;padding-bottom: 27px;">'+request+' '+demo+' '+edit+' '+deleteUser+' '+viewTeacher+' </td> </tr>';
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