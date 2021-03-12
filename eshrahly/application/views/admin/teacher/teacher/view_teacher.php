<aside class="right-side">
<section class="content-header">
    <h1>View Teacher Details<small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
         <li><a href="<?php echo base_url();?>index.php/Admin/teacher">Back</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body"> 
                    <div class="card-body row">
                        <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" class="form-control" value="<?php echo $teacher_details->teacher_name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Mobile</label>
                                <input type="text" class="form-control" value="<?php echo $teacher_details->teacher_phone ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Gender</label>
                                <input type="text" class="form-control" value="<?php echo $teacher_details->teacher_gender; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Password</label>
                                <input type="text" class="form-control" value="<?php echo $teacher_details->teacher_password ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                         <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Nationality</label>
                                <?php 
                                $where  = array('n_id' => $teacher_details->nationality);
                                $nationality = $this->Model->singleRowdata($where,'nationality');
                                if ($nationality ) {
                                    $nationality = $nationality->n_name; 
                                }?>
                                  <input type="text" class="form-control" value="<?php echo $nationality; ?>" readonly>
                            </div>
                        </div>
                         <div class="col-lg-6 p-t-20">
                             <div class="form-group">
                                <label >City</label>
                                <?php 
                                $where  = array('city_id' => $teacher_details->city);
                                $city = $this->Model->singleRowdata($where,'city');
                                if ($city) {
                                    $city =  $city->city_name;
                                }?>
                                 <input type="text" class="form-control" value="<?php echo $city?>" readonly>
                            </div>
                        </div>
                       
                    </div>
                    
                    <div class="card-body row">
                        <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Learning Levels</label>
                                 <?php 
                                if($teacher_details->learning_levels){
                                    $result = $this->Model->learning_level($teacher_details->learning_levels);
                                    if(!empty($result)){?>
                                        <input type="text" class="form-control" value="<?php echo $result;?>" readonly>
                                    <?php }  } ?>
                            </div>
                        </div>
                         <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Learning Materials</label>
                                 <?php
                                    if($teacher_details->learning_materials){
                                    $learning_materials = $this->Model->learningMaterials($teacher_details->learning_materials);
                                    if(!empty($learning_materials)){ ?> 
                                        <input type="text" class="form-control" value="<?php echo $learning_materials ?>" readonly>
                                    <?php }  }  ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                         <div class="col-lg-6 p-t-20">
                            <div class="form-group">
                                <label >Qualification</label>
                                <input type="text" class="form-control" value="<?php echo $teacher_details->qualification ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                         <div class="col-lg-4 p-t-20">
                            <div class="form-group">
                                <label >Certificate</label>
                                 <?php 
                                 $certifiacte = $teacher_details->certificate;
                                 if (!empty($certifiacte)) {
                                     $explodCer = explode('.', $certifiacte);
                                     if ($explodCer[1] = 'pdf') {?>
                                        <a target="_blank" href="<?php echo $teacher_details->certificate;?>"><br>Download </a>
                                       
                                     <?php }elseif ($explodCer[1] = 'doc' &&  $explodCer[1] = 'docx') {?>
                                         <a target="_blank" href="<?php echo $teacher_details->certificate;?>"><br>Download </a>
                                     <?php } 
                                 }else{?>
                                    <a  href="#" ><br>Download </a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-lg-4 p-t-20">
                            <div class="form-group">
                                <label >Personal Card</label>
                                <?php 
                                 $personal_card = $teacher_details->personal_card;
                                  if (!empty($certifiacte)) { 
                                 $explodCer = explode('.', $personal_card);

                                 if ($explodCer[1] = 'pdf') {?>
                                    <a target="_blank" href="<?php echo $teacher_details->personal_card;?>"><br>Download </a>
                                     
                                 <?php }elseif ($explodCer[1] = 'doc' &&  $explodCer[1] = 'docx') {?>
                                     <a target="_blank" href="<?php echo $teacher_details->personal_card;?>"><br>Download </a>
                                 <?php }
                                 }else{?>
                                    <a  href="#" ><br>Download </a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-lg-4 p-t-20">
                            <div class="form-group">
                                <label >Image</label>
                                 <?php if($teacher_details->teacher_image == ''){ ?>
                                    <img src="<?php echo base_url();?>/uploads/user.png" class="profile-user-img img-responsive " style=" width: 200px;    margin-left: 5px;" alt="doc">
                                <?php } else { ?>
                                   <img src="<?php echo $teacher_details->teacher_image;?>" class="profile-user-img img-responsive " alt="User profile picture" style=" width: 200px;    margin-left: 5px;">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section> 
</aside>
<script>
    function goBack() {
    }
</script>