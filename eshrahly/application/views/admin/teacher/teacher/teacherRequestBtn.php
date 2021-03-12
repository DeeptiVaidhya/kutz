
<body class="skin-black">
    <div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <!--  <center><h4 style="width:50%;"><b>CHANGE PASSWORD</b></h4></center> -->
        <?php $teacher_id = $this->uri->segment(3);
        //print_r($teacher_id);
        ?>
        <center>
            <a href="<?php echo site_url('Admin/teacherRequest/')?><?php echo $teacher_id;?>">
            <button class="btn btn-info btn-flat" id="show_btn" style="margin-top: 30px;font-size: 18px;">Click For Balance
            </button>
        </a></center>
    </section>
     <section class="content" >
            <div class="row" style="padding:0px">
                
            </div>
        </section>
</aside>
        <!-- /.right-side -->
    </div>
    <!-- ./wrapper -->
</body>