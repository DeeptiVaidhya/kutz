<style type="text/css">
.search-data{
    display: none;
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
        <h1> Teacher Request<small>(List)</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?php echo base_url();?>index.php/Admin/teacher">Back</a></li>
            <li class="active">Teacher Request</li>
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
                        <h3 class="box-title">List of Teacher Request</h3>
                    </div>
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
                    <?php $teacher_id = $this->uri->segment(3);?>
                    <div class="col-md-4 form-group" style="padding-top: 24px;">
                        <button type="submit" onclick="getRecord(<?php echo $teacher_id;?>);" class="btn-success applyBtn btn btn-small" style="background-color: #D81B60 !important;border-color: #d81b60;">Submit</button> 
                    </div>
                    </div><!-- /.box-body -->
                    <div class="box-body table-responsive search-data">
                        <table id="example3" class="table table-bordered" ><thead>
                                <tr>
                                    <th>Teacher Name</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Cash</th>
                                    <th>Credit Card</th>
                                    <th>Total</th>
                                    <th>App Profit</th> 
                                    <th>Remind</th> 
                                </tr>
                                </thead>
                                <tbody id="show_history_data"></tbody>
                        </table>    
                    </div>
                    <div class="box-body table-responsive default-data">
                        <table id="example5" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>Teacher Name</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Cash</th>
                                    <th>Credit Card</th>
                                    <th>Total</th>
                                    <th>App Profit</th> 
                                    <th>Remind</th> 
                                    <th>Invoice</th> 
                                    <th>Action</th> 
                                </tr>
                            </thead>
                                <?php
                                    if ($transaction) { ?>
                                       <tbody>
                                    <tr>
                                       <td>
                                       <?php 
                                        $where  = array('teacher_id' => $transaction['teacher_id']);
                                        $teacher = $this->Model->singleRowdata($where,'teacher');
                                        if ($teacher){
                                        echo $teacher->teacher_name; 
                                        }  ?> 
                                       </td> 
                                        <td>  <?php echo $transaction['start_date'];?></td>
                                        <td>  <?php echo $transaction['end_date'];?></td>
                                        <td> $ <?php echo $transaction['CashAmt'];?></td>
                                        <td> $ <?php echo $transaction['CardAmt'];?></td>
                                        <td> $ <?php echo $transaction['Total'];?> </td>
                                        <td> $ <?php echo $transaction['AppProfit'];?></td>
                                        <td> $ <?php echo $transaction['Remind'];?></td>
                                        <td> <?php
                                            $CashAmt = $transaction['CashAmt'];
                                            $CardAmt = $transaction['CardAmt'];
                                            
                                            $AppProfit = $transaction['AppProfit'];
                                            $Remind = $transaction['Remind'];
                                            $id    = $transaction['tran_id'];
                                            $name  = $teacher->teacher_name; 
                                            $Total  = $transaction['Total'];
                                            ?>
                                           
                                            <a  target="_blank" href="<?php echo base_url(); ?>index.php/Admin/GenerateInvoicePdf/?id=<?php echo urlencode(base64_encode($id)) ?>&name=<?php echo urlencode(base64_encode($name))?>&cash=<?php echo urlencode(base64_encode($CashAmt))?>&card=<?php echo urlencode(base64_encode($CardAmt))?>&profit=<?php echo urlencode(base64_encode($AppProfit))?> &rem=<?php echo urlencode(base64_encode($Remind))?> &total=<?php echo urlencode(base64_encode($Total))?> ">Click</a>
                                        </td> 
                                        <td>
                                            <?php 
                                            $start_date = $transaction['start_date'];
                                            $end_date = $transaction['end_date'];
                                            ?>
                                            <form action="<?php echo site_url();?>/Admin/ClearMonth" method="post"  id="myForm" >
                                                <input type="hidden" name="start_date" value="<?php echo $transaction['start_date'];?>">
                                                <input type="hidden" name="end_date" value="<?php echo $transaction['end_date'];?>" > 
                                                <button  class="btn btn-info btn-flat" id="show_btn" style="background-color: #205686;border-color: #205686;font-size: 14px;"  onclick="return conformDelete();">Clear Balance</button>
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>  
                                <?php } ?>
                           
                        </table>
                    </div>
                   
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->

<script type="text/javascript">
    function conformDelete(){
        var x = confirm("Are you sure you want to clear this Balance?");
          if (x == true){
            $("#myForm").submit();
          }else{
            return false;
          }
    }

// $(document).ready(function(){  
    //$('.search-data').hide();  
function getRecord(id){
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
    url: "<?php echo base_url('index.php/Admin/fetchTeacherReqdata');?>/?from="+from+"&to="+to+"&id="+id,
      success: function(data){
       $('.gif-loader').css('display','none');   
       $('#example5').hide();
       var obj = JSON.parse(data);
       //console.log(data);
       //alert(data);
       if(obj.length>0){
          var html = '';
          var j=0;
          var cash_amount_amt = 0;
          var credit_card_amt = 0;
          var total_amt = 0;
          for(var i=0;i<obj.length;i++){
            var teacher_name = obj[i]['teacher_name'];
            var cash_amount  = obj[i]['cash_amount'];
            var credit_card  = obj[i]['credit_card'];
            var total        = obj[i]['total'];
            var app_profit   = obj[i]['app_profit'];
            var remind       = obj[i]['remind'];
            var date         = obj[i]['date'];
            var from_date    = from;
            var to_date      = to;

            cash_amount_amt += parseInt(cash_amount);
            credit_card_amt += parseInt(credit_card);
            total_amt += parseInt(cash_amount) + parseInt(credit_card);
            j = ++j;
          }
        html += '<tr><td>'+teacher_name+'</td><td>'+from_date+'</td><td>'+to_date+'</td><td>'+cash_amount_amt+'</td><td>'+credit_card_amt+'</td><td>'+total_amt+'</td><td>'+app_profit+'</td><td>'+remind+'</td></tr>';
          $('#show_history_data').html(html);
       }else{
          html = '<tr><td  colspan="8">No Data Found</td></tr>';
          $('#show_history_data').html(html);
      }
    }
    });
 }
 //getRecord(); 
// });
</script>