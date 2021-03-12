</div>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- jQuery UI 1.10.3 -->
<script src="<?php echo base_url();?>/assests/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url();?>/assests/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


<!-- Sparkline -->
<script src="<?php echo base_url();?>/assests/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

<!-- jvectormap -->
<script src="<?php echo base_url();?>/assests/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assests/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>

<!-- fullCalendar -->
<script src="<?php echo base_url();?>/assests/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>/assests/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>/assests/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->

<script src="<?php echo base_url();?>/assests/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assests/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url();?>/assests/js/AdminLTE/dashboard.js" type="text/javascript"></script>  -->       
<script src="<?php echo base_url();?>/assests/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assests/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>

 <!-- InputMask -->
<script src="<?php echo base_url();?>assests/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assests/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assests/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url();?>assests/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>assests/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>

<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assests/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function() {
      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
      //Money Euro
      $("[data-mask]").inputmask();
      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
      //Date range as a button
      $('#daterange-btn').daterangepicker(
              {
                  ranges: {
                      'Today': [moment(), moment()],
                      'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                      'Last 7 Days': [moment().subtract('days', 6), moment()],
                      'Last 30 Days': [moment().subtract('days', 29), moment()],
                      'This Month': [moment().startOf('month'), moment().endOf('month')],
                      'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
              },
      function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      );

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal',
          radioClass: 'iradio_minimal'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-red',
          radioClass: 'iradio_flat-red'
      });

      //Colorpicker
      $(".my-colorpicker1").colorpicker();
      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //Timepicker
      $(".timepicker").timepicker({
          showInputs: false
      });
   });

   setTimeout(function() {
    $('.alert').slideUp("slow");
    }, 1000);

    $("#example1").dataTable({
        "aaSorting": [ [0,'desc'] ]
    }
    );
    $("#example5").dataTable();
    $("#example3").dataTable();
    $("#example4").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "order" : [[0, 'desc']]
    });
</script>