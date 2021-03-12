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
        <h1>  Teacher <small>Add</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#">Teacher</a></li>
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
                                <h3 class="box-title">Teacher Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo base_url('index.php/Admin/insertTeacher');?>" method="post" id="login" enctype="multipart/form-data" onsubmit="return validation();">
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="intro" id="errorname"></span></label>
                                        <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Enter Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile <span class="intro" id="errormobile"></span></label>
                                        </label>
                                        <input type="text" class="form-control" id="teacher_phone" name="teacher_phone" placeholder="Enter Mobile" required="" maxlength="10">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender <span class="intro" id="errornationality"></span></label>
                                        </label>
                                        <select class="form-control" id = "gender" name="gender" style="text-transform: capitalize;">
                                            <option>--Choose--</option>
                                           	<option value="male"> Male </option>
                                           	<option value="female"> FeMale </option>
                                         </select>
                                        <!-- <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" required=""> -->
                                    </div> 
                                    
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Nationality <span class="intro" id="errornationality"></span></label>
                                        </label>
                                        <select class="form-control" id = "nationality" name="nationality" style="text-transform: capitalize;">
                                            <option>--Choose--</option>
                                            <?php 
                                              $nationality = $this->Model->select('nationality');?>
                                              <?php foreach ($nationality as $key) {?>
                                                <option value="<?php echo $key['n_id'] ?>"><b><?php echo $key['n_name'] ?></b></option> 
                                              <?php } ?>
                                         </select>
                                        <!-- <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" required=""> -->
                                    </div> 
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">City <span class="intro" id="errorcity"></span></label>
                                        <select class="form-control" id = "selectCity" name="city" style="text-transform: capitalize;">
                                            <option>--Choose--</option>
                                        </select>

                                        <!-- <input type="text" class="form-control" id="selectCity" name="city" placeholder="Enter City" required=""> -->
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Qualification <span class="intro" id="errorcity"></span></label>
                                        </label>
                                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter Qualification" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Learning Levels <span class="intro" id="errorlearning_levels"></span></label>
                                        </label>
                                        <select id="learning_levels" class="form-control"   name="learning_levels"   required="">
                                            <option>--Choose--</option>
                                            <?php 
                                              $learning_levels = $this->Model->select('learning_level');?>
                                              <?php foreach ($learning_levels as $key) {?>
                                                <option value="<?php echo $key['l_id'];?>"><b><?php echo $key['level_name'] ?></b></option> 
                                              <?php } ?>
                                         </select>
                                       <!--  <input type="text" class="form-control" id="learning_levels" name="learning_levels" placeholder="Enter Learning Levels" required=""> -->
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Learning Materials<span class="intro" id="errorlearning_materials"></span></label>
                                        </label>
                                        <select class="form-control" id="learning_materials" name="learning_materials"  >
                                            <option>--Choose --</option>
                                            <?php 
                                              $learning_materials = $this->Model->select('learning_material');?>
                                              <?php foreach ($learning_materials as $key) {?>
                                                <option value="<?php echo $key['material_id'];?>"><b><?php echo $key['material_name'] ?></b></option> 
                                              <?php } ?>
                                         </select>
                                        <!-- <input type="text" class="form-control" id="learning_materials" name="learning_materials" placeholder="Enter Learning Materials" required=""> -->
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Certificate<span class="intro" id="errorcity"></span></label>
                                        </label>
                                         <div class="form-group">
                                            <div class="form-control">
                                                <input  name="certificate" type="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Personal Card<span class="intro" id="errorcity"></span></label>
                                        </label>
                                         <div class="form-group">
                                            <div class="form-control">
                                                <input  name="personal_card" type="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image<span class="intro" id="erroremail"></span></label>
                                        </label>
                                        <div class="form-group">
                                            <div class="form-control">
                                                <input id="fileupload" name="teacher_image" type="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <center>
                                            <button type="submit" class="btn btn-primary" >Submit</button>
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
<!-- <script>
function validateAndSend() {
    $("#new_pan_form").submit(function(e){
     $('.gif-loader').css('display','inline');
    });
}
</script> -->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>


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
                    $('#selectCity').append("<option value='"+obj[i].city_id+"' >"+obj[i].city_name+"</option>");
                  }
               }
              }
            });
        }
    });
});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
  // jQuery("#learning_levels").chosen();
  // jQuery("#learning_materials").chosen();
});
</script>