
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
 <section class="content-header">
    <h1> Teacher <small>(List)</small>
</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Teacher</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">                            
            <div class="box" style="overflow-x:scroll;">
                <div class="box-body table-responsive" >
                    <table id="example1" class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $i=1;
                        foreach ($contact as $key) { ?>
                            <tr>
                                <td> <?php echo $i;?></td>
                                <td><?php echo $key['name']; ?></td>
                                <td> <?php echo $key['email']; ?> </td>
                                <td> <?php echo $key['message']; ?> </td>
                                <td> <?php echo $key['type']; ?> </td>
                               
                            </tr>
                                <?php $i++; } ?>
                        </tbody>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
