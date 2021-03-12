<aside class="right-side">                
    <!-- Content Header (Page header) -->
   <section class="content-header">
       <center><h4><b>EDIT USER</b></h4></center>
    </section>  
   <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box ">
                        <?php echo $this->session->flashdata('Sucessmessage');?>
                        <?php echo $this->session->flashdata('message');?>
                        <form action="<?php echo site_url('User/userEdit');?>"  class="cmxform"  method="post"  id="formdata1" enctype="multipart/form-data" style="margin: 20px;">
                            <div class="box-body">
                                <div class="card-body row">
                                    <div class="col-lg-12 p-t-20">
                                        <div class="form-group">
                                            <span style="color:red"></span><label > First Name</label>
                                            <input type="hidden" class="form-control"  name="customer_id" value="<?php echo $users->customer_id; ?>"  required>
                                            <input type="text" class="form-control"  name="first_name" value="<?php echo $users->first_name; ?>"  required>
                                             
                                        </div>
                                    </div>
                                </div> 
                                <div class="card-body row">
                                    <div class="col-lg-12 p-t-20">
                                        <div class="form-group">
                                            <span style="color:red"></span><label >Last Name</label>
                                            <input type="text" class="form-control"  name="last_name"  value="<?php echo $users->last_name; ?>" required>
                                             
                                        </div>
                                    </div>
                                </div> 
                                <div class="card-body row">    
                                    <div class="col-lg-12 p-t-20">
                                        <div class="form-group">
                                            <span style="color:red"></span><label >Email</label>
                                            <input type="text" class="form-control"  name="email" value="<?php echo $users->email; ?>" required>
                                             
                                        </div>
                                    </div>
                                </div>   

                                <div class="card-body row">    
                                    <div class="col-lg-12 p-t-20">
                                        <div class="form-group">
                                            <span style="color:red"></span><label >Contact</label>
                                            <input type="text" class="form-control"  name="mobile" value="<?php echo $users->mobile; ?>" required>
                                             
                                        </div>
                                    </div>
                                </div>
                                 <div class="card-body row">    
                                    <div class="col-lg-12 p-t-20">
                                        <div class="form-group">
                                            <span style="color:red"></span><label >Address</label>
                                            <input type="text" class="form-control" value="<?php echo $users->address; ?>" name="address"   required>
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body row">
                                     <div class="col-lg-4 p-t-20">
                                        <div class="form-group">
                                             <img src="<?php echo base_url();?>uploads/user/<?php echo $users->image;?>" class="profile-user-img img-responsive " alt="User profile picture" style=" width: 100px;">
                                        </div>
                                    </div>
                                     <div class="col-lg-8 p-t-20">
                                        <div class="form-group">
                                            <span style="color:red"></span><label >Image Upload</label>
                                             <input type="file" name="user_image" class="form-control"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <center>
                                    <button type="submit" class="btn bg-navy margin" value="Submit" name="submit" style=" background-color: #ce0030 !important; width: 290px;border-radius: 10px;">SAVE</button>
                                </center>
                            </div>
                       </form>
                </div>
            </div>
        </div>
    </section> 
    
</aside><!-- /.right-side -->

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
 {
    $("#cat_id").on('change', function() {
        var level = $(this).val();
        if(level){
            $.ajax ({                
                type: 'GET',
                url: '<?php echo base_url(); ?>index.php/User/getSubcat/'+level,
                success: function(data){
                var obj = JSON.parse(data); 
                  if(obj.length>0){
                    $("#sub_cat_id option").remove();
                  for(var i=0; i<obj.length; i++){

                    $('#sub_cat_id').append("<option value='"+obj[i].sub_cat_id+"' >"+obj[i].sub_cat_name+"</option>");
                  }
               }
              }
            });
        }
    });   
});
</script>