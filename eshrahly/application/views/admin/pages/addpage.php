<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Add Page</header>
								</div>
            
								<form action="<?php echo site_url('Pages/addpagescontent');?>" method="post" id="login"
									enctype="multipart/form-data" onsubmit="return validation();" >
       
									<div class="card-body row">

                     <div class="col-lg-6 p-t-20"> 
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input class = "mdl-textfield__input" type = "text" id = "freename" name="pagename" style="text-transform: capitalize;"  >
                                <label class = "mdl-textfield__label" >Page Name</label>
                                <span class="intro" id="errorname"></span>
                            </div>
                      </div>
                    
                       <div class="col-lg-12 p-t-20"> 
                              <div class="form-group">
                                <label class="col-sm-2 control-label"> Description</label>
                                <div class="col-sm-12">
                                      <textarea name="Answer" id="editor1" rows="10" cols="80">
                                      </textarea>
                                      <script>
                                        CKEDITOR.replace( 'editor1' );
                                      </script>
                                      <span class="intro" id="errordes"></span>
                                </div>
                              </div>  
                            </div>
                      </div>

                       <div class="col-lg-12 p-t-20"> 
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Meta Description</label>
                                <div class="col-sm-12">
                                      <textarea name="meta"  rows="10" cols="120">
                                      </textarea>
                                      
                                      <span class="intro" id="errordes"></span>
                                </div>
                              </div>  
                            </div>
                      </div>
							    
                      
								      <div class="col-lg-12 p-t-20 text-center"> 
							              	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary">Submit</button>
											</div>
									</div>
                </form>
     
							</div>
						</div>
					</div> 
    </div>
</div>
            <!-- end page content -->
<script>
             
function validation(){ 
   var freename =document.getElementById('freename').value;
  if(freename.length==""){
   document.getElementById('errorname').innerHTML = "Please Fill Full Name!";
   return false;
  } 
   
     
  var add =document.getElementById('description').value;
   if(add.length==""){
   document.getElementById('erroradd').innerHTML = "Please Fill Description!";
   return false;
   }
}
</script>
