
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">                
 <section class="content-header">
    <h1> CMS <small>(List)</small>
</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">CMS</li>
    </ol>
</section>
<?php echo $this->session->flashdata('success');?>
                    <?php echo $this->session->flashdata('alert');?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">                            
            <div class="box" style="overflow-x:scroll;">
                <div class="box-body table-responsive" >
                    <table id="example1" class="table table-bordered" >
                        <thead>
                           <tr>
                              <th>S.No </th>
                              <th>Page Name</th>
                              <th>Description</th>
                              <th> Date </th>
                              <th> Action </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $i=0;
                              foreach($result as $row){
                               $description=strip_tags($row['description']);
                               $i++;
                               ?>
                            <tr class="odd gradeX">
                              <td class="left"><?php echo $i;?></td>
                              <td class="left"><?php echo $row['pageName'];?></td>
                         
                              <td class="left"><?php echo substr($description,0,120);?>
                              </td>
                              <td class="left"><?php $date = $row['date'];echo date('d-m-Y', strtotime($date)); ?></td>
                              <td>
                                 <a href="<?php echo site_url('CMS/editpage/').$row['id'];?>" class="btn btn-primary btn-xs">
                                 <i class="fa fa-pencil"></i>
                                 </a>

                                 <!--  <a href="<?php echo site_url('CMS/deleterecord/').$row['id'];?>/RTI_pages/Pages" class="btn btn-danger btn-xs" onclick="return conformDelete()">
                                 <i class="fa fa-trash-o "></i>
                                 </a> -->
                                
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                    </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
