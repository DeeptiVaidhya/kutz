
<aside class="right-side">                
                <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Withdraw Request
        <small>(User)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Withdraw Request</li>
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
        <div class="nav-tabs-custom" id="tabs_section">
               <!--  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">PENDING</a></li>
                    <li><a href="#tab_2" data-toggle="tab">IN PROCESS</a></li>
                    <li><a href="#tab_3" data-toggle="tab">VERIFY</a></li>
                    <li><a href="#tab_4" data-toggle="tab">REJECT</a></li>  
                </ul> -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-header">
                            <h3 class="box-title">List of Withdraw Request</h3>
                        </div>
                        <div class="box-body table-responsive" style="overflow-x: scroll;">
                            <table id="example1" class="table table-bordered "  data-order='[[ 0, "desc" ]]' data-page-length='25'>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Datetime</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach ($withdraw_request as $data) {?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                         <?php 
                                            $student_id  = $data['user_id']; 
                                            //print_r($student_id);die;
                                            $whereId= array('teacher_id' => $student_id);
                                            $agentData = $this->Model->singleRowdata($whereId,'teacher');
                                            //print_r($agentData);
                                            if ($agentData) {
                                               $name = $agentData->teacher_name;
                                            }
                                            ?>
                                        <td><?php echo $name; ?></td>  
                                        <td><?php echo $data['amount']; ?></td>
                                         <td><?php echo date('d M h:i A', strtotime($data['created_at'])); ?></td>  
                                         <td><?php
                                         if ($data['status'] == 0) {?> 
                                           PENDING
                                        <?php  }else if ($data['status'] == 1) { ?>
                                          INPROCESS
                                         <?php }else{?>
                                          COMPLETED
                                         <?php }?> 
                                          </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/Admin/changeStatus/<?php echo $data['withdraw_id']; ?>"><button class="btn btn-success btn-sm" >VIEW</button></a>
                                        </td>
                                    </tr>   
                                    <?php $i++;} ?>
                                </tbody>
                               
                            </table>
                        </div>
                    </div><!-- /.tab-pane -->
                    
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->                           
         
        </div>
    </div>

</section><!-- /.content -->

<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <!--  <form action="<?php echo site_url();?>/Orders/updateStatus" method="post" > -->
      <div class="modal-header">
        <h4 class="col-md-12 modal-title" style="text-align: center;">Send Acknowledgement</h4>
      </div>
      <div class="modal-body" style="height: 150px;">
        <div class="col-md-12 form-group">
          <input type="hidden" name="application_id" id="application_id">
          <textarea class="form-control" rows="5" name="notes" id="notes" placeholder="TYPE HERE..." required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Send" name="Submit" onClick="rejectPANapplication(this);"  />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    <!-- </form> -->
    </div>

  </div>
</div>


<!-- Acknoledment for data-->
<div id="myModalVerify" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo site_url();?>/Admin/sendPanAcknowledgement" method="post" enctype="multipart/form-data" >
      <div class="modal-header">
        <h4 class="col-md-12 modal-title" style="text-align: center;">Send Acknowledgement</h4>
      </div>
      <div class="modal-body" style="height: 150px;">
        <div class="col-md-12 form-group">
           <p style="font-size: 16px;font-weight: bold;">Choose Document</p> 
           <input type="hidden" name="application_id1" id="application_id1">
           <input type="hidden" name="type1" id="type1">
           <input type="file" class="form-control" name="acknowledgement_file" id="acknowledgement_file" required onchange="ValidateSingleInput(this);">
           <br>
           <div id="fileError" style="font-size: 15px;color: red;"></div>
           <br>
           <p style="font-size: 16px;font-weight: bold;">Message</p> 
          <textarea class="form-control" rows="5" name="notes1" id="notes1" placeholder="TYPE HERE..." ></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Send" name="Submit"  />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>


