<style type="text/css">
    .intro {
        color: #c00000;
    }
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>  Policy<small>Edit</small>
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
                                <h3 class="box-title">Policy Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php foreach($records as $data){ ?>
                            <form action="<?php echo site_url('CMS/EditStudentPageData');?>" method="post" id="login"  enctype="multipart/form-data" onsubmit="return validation();" >
                              <input type = "hidden" id = "id" name="id"   value="<?php echo $data['id'];?>">
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                      <label >Page Name <span class="intro" id="errorname"></span></label>

                                        <input class = "form-control" type = "text" id = "freename" name="pagename" style="text-transform: capitalize;"  value="<?php echo $data['pageName'];?>">
                                          
                                    </div>

                                  <div class="form-group">
                                    <label >Description<span class="intro" id="errorname"></span></label>
                                          <textarea class="form-control"  name="Answer" id="editor1" rows="10" cols="80"><?php echo $data['description'];?>
                                          </textarea>
                                          <!-- <script>
                                            CKEDITOR.replace( 'editor1' );
                                          </script> -->
                                          <span class="intro" id="errordes"></span>
                                  </div>

                                <div class="box-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </center>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                        <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</aside>
