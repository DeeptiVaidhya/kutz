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
        <img src="<?php echo base_url();?>/assests/wait.gif" class="gif-loader__img" />
    </center>    
</div>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Teacher Information <small>Edit</small>
                    </h1>
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
                                <h3 class="box-title">Teacher Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo base_url('index.php/Admin/editTeacherDetails');?>" method="post" id="form" enctype="multipart/form-data" onsubmit="return validation();">
                                <div class="box-body" style="padding: 20px;">
                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name <span class="intro" id="errorname"></span></label>
                                            <input type="hidden" class="form-control" id="Title" name="id" value="<?php echo $teacher->teacher_id ?>">
                                            <input type="text" class="form-control" id="agentname" name="teacher_name" value="<?php echo $teacher->teacher_name; ?>" placeholder="Enter Name" required="">
                                        </div> 
                                    </div>
                                   
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile <span class="intro" id="errormobile"></span></label>
                                            </label>
                                            <input type="text" class="form-control" id="agentmobile" name="teacher_phone" value="<?php echo $teacher->teacher_phone; ?>" placeholder="Enter Mobile" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Gender <span class="intro" ></span></label>
                                        </label>
                                        <select class="form-control" id = "teacher_gender" name="teacher_gender" style="text-transform: capitalize;" required="">
                                            <option disabled="">--Choose--</option>
                                            <option <?php if ($teacher->teacher_gender == 'male') { echo 'selected';} ?> value="male"> Male </option>
                                            <option <?php if ($teacher->teacher_gender == 'female') { echo 'selected';} ?> value="female"> Female </option>
                                         </select>
                                    </div> 
                                    </div>
                                   
                                    <div class="col-lg-6 p-t-20" >
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Password<span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="text" class="form-control" id="teacher_password" name="teacher_password" placeholder="Enter Password" required="" value="<?php echo $teacher->teacher_password; ?>">
                                    </div>
                                    </div>
                                </div>

                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Nationality <span class="intro" id="errormobile"></span></label>
                                        </label>
                                         <select class="form-control" id="nationality" name="nationality" style="text-transform: capitalize;" required="">
                                          <?php $nationality = $this->Model->select('nationality');?>
                                          <?php foreach ($nationality as $key) { ?>
                                            <option <?php if($key['n_id']== $teacher->nationality){ echo'selected'; } ?> value="<?php echo $key['n_id'];?>"><?php echo $key['n_name'];?></option>
                                          <?php }
                                          ?>
                                         </select>
                                    </div>
                                    </div>
                                   
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">City <span class="intro" id="errormobile"></span></label>
                                         <select class="form-control"  id="selectCity" name="city" style="text-transform: capitalize;" required="">
                                            <?php
                                            $city = $this->Model->select('city');?>
                                             <?php foreach ($city as $c) {
                                             if($c['city_id'] == $teacher->city){?>
                                            <option  value="<?php echo $c['city_id'];?>" selected><?php echo $c['city_name'];?></option> 
                                           <?php } } ?>
                                         </select>
                                    </div>
                                    </div>
                                </div>

                                 <div class="card-body row">
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Qualification <span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $teacher->qualification; ?>" placeholder="Enter Qualification" required="">
                                    </div>
                                    </div>
                                   
                                    <div class="col-lg-6 p-t-20" >
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Learning Levels <span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <select class="form-control"  name="learning_levels" style="text-transform: capitalize;" required="">
                                          <?php 
                                           $learning_levels = $this->Model->select('learning_level');?>
                                          <?php foreach ($learning_levels as $key) { ?>
                                            <option <?php if($key['l_id']== $teacher->learning_levels){ echo'selected'; } ?> value="<?php echo $key['l_id'];?>"><?php echo $key['level_name'];?></option>
                                          <?php }
                                          ?>
                                         </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Learning Materials <span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <select class="form-control"  name="learning_materials" style="text-transform: capitalize;" required="">
                                          <?php 
                                           $learning_materials = $this->Model->select('learning_material');?>
                                          <?php foreach ($learning_materials as $key) { ?>
                                            <option <?php if($key['material_id']== $teacher->learning_materials){ echo'selected'; } ?> value="<?php echo $key['material_id'];?>"><?php echo $key['material_name'];?></option>
                                          <?php }
                                          ?>
                                         </select>
                                    </div>
                                    </div>
                                   
                                    <div class="col-lg-6 p-t-20" >
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>
                                </div>
                                     
                                <div class="card-body row">
                                    <div class="col-lg-4 p-t-20">
                                        <div class="form-group">
                                            <label >Certificate</label>
                                             <?php 
                                             $certifiacte = $teacher->certificate;
                                             if (!empty($certifiacte)) {
                                                 $explodCer = explode('.', $certifiacte);
                                                 if ($explodCer[1] = 'pdf') {?>
                                                    <a target="_blank" href="<?php echo $teacher->certificate;?>" style="margin-bottom: 12px;"><br>Download </a>
                                                   
                                                 <?php }elseif ($explodCer[1] = 'doc' &&  $explodCer[1] = 'docx') {?>
                                                     <a target="_blank" href="<?php echo $teacher->certificate;?>" style="margin-bottom: 12px;"><br>Download </a>
                                                 <?php } 
                                             }else{?>
                                                <a  href="#" ><br>Download </a>
                                            <?php }?>

                                            <div class="form-control" style=" margin-top: 10px;">
                                                <input id="fileupload" name="certificate" type="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-t-20">
                                        <div class="form-group">
                                            <label >Personal Card</label>
                                            <?php 
                                             $personal_card = $teacher->personal_card;
                                              if (!empty($certifiacte)) { 
                                             $explodCer = explode('.', $personal_card);

                                             if ($explodCer[1] = 'pdf') {?>
                                                <a target="_blank" href="<?php echo $teacher->personal_card;?>" style="margin-bottom: 12px;"><br>Download </a>
                                                 
                                             <?php }elseif ($explodCer[1] = 'doc' &&  $explodCer[1] = 'docx') {?>
                                                 <a target="_blank" href="<?php echo $teacher->personal_card;?>" style="margin-bottom: 12px;"><br>Download </a>
                                             <?php }
                                             }else{?>
                                                <a  href="#" ><br>Download </a>
                                            <?php }?>

                                            <div class="form-control" style=" margin-top: 10px;">
                                                <input id="fileupload" name="personal_card" type="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 p-t-20">
                                        <div class="form-group">
                                            <label >Image</label>
                                             <?php if($teacher->teacher_image == ''){ ?>
                                                <img src="<?php echo base_url();?>/uploads/user.png" class="profile-user-img img-responsive " style="width: 100px;  margin-left: 4px; margin-bottom: 12px;" alt="doc">
                                            <?php } else { ?>
                                               <img src="<?php echo $teacher->teacher_image;?>" class="profile-user-img img-responsive " alt="User profile picture" style="width: 100px;  margin-left: 4px; margin-bottom: 12px;">
                                            <?php } ?>
                                            <div class="form-control" style=" margin-top: 10px;">
                                                <input id="fileupload" name="teacher_image" type="file" required="">
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary" onclick="validateAndSend();">Submit </button>
                                    </center>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</aside>
<!-- /.right-side -->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script>
function validateAndSend() {
    $("#form").submit(function(e){
     $('.gif-loader').css('display','inline');
    });
}
</script>
<script type="text/javascript">
$(document).ready(function()
 {
    $("#nationality").on('change', function() {
        var level = $(this).val();
        if(level){
            $.ajax ({
                type: 'GET',
                url: '<?php echo base_url(); ?>index.php/Admin/getCity/'+level,
                success: function(data){
                var obj = JSON.parse(data);
                $("#selectCity option").remove(); 
                  if(obj.length>0){
                  for(var i=0; i<obj.length; i++){
                    //$("#selectCity option").remove();
                    $('#selectCity').append("<option value='"+obj[i].city_id+"' >"+obj[i].city_name+"</option>");
                  }
               }
              }
            });
        }
    });
});
</script>