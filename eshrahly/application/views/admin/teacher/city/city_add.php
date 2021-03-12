<style type="text/css">
    .intro {
        color: #c00000;
    }
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>  City <small>Add</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#">City</a></li>
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
                                <h3 class="box-title">City Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo base_url('index.php/Admin/insertCity');?>" method="post" >
                                <div class="box-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nationality <span class="intro" id="errormobile"></span></label>
                                        </label>
                                         <select class="form-control" id="nationality" name="nationality_id" style="text-transform: capitalize;" required="">
                                          <?php 
                                           $nationality = $this->Model->select('nationality');?>
                                          <?php foreach ($nationality as $key) { ?>
                                            <option value="<?php echo $key['n_id'];?>"><?php echo $key['n_name'];?></option>
                                          <?php }
                                          ?>
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="intro" id="errorname"></span></label>
                                        <input type="text" class="form-control" id="City_name" name="city_name" placeholder="Enter City Name" required="">
                                    </div>
                                    
                                    <div class="box-footer">
                                        <center>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
    function validation() {
        var agentname = document.getElementById('agentname').value;
        if (agentname.length == "") {
            document.getElementById('errorname').innerHTML = "please enter agent name!";
            return false;
        }

        var agentemail = document.getElementById('agentemail').value;
        if (agentemail.length == "") {
            document.getElementById('erroremail').innerHTML = "please enter agent email";
            return false;
        }

        var agentmobile = document.getElementById('agentmobile').value;
        if (agentn.length == "") {
            document.getElementById('errormobile').innerHTML = "please enter agent mobile";
            return false;
        }

        var agentdob = document.getElementById('agentdob').value;
        if (agentn.length == "") {
            document.getElementById('errordob').innerHTML = "please enter date of birth";
            return false;
        }
    }
</script>