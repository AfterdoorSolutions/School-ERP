<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>All Pay Slips</li>
              </ul>
              <h4>All Pay Slips</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      //$attributes = array('class' => 'form-horizontal', 'id' => 'menu_form');
      //echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">All Pay Slips</h4></div>
        <?php //if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

            <table class="table table-bordered">
              <thead>
                <th>SNo.</th>
                <th>Name</th>
                <th>Month</th>
                <th>Generate</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php if($salary_slip)

                {
                  $i=1;foreach ($salary_slip as $key => $value) { ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo get_data('staff',$value->staff_id,'staff_id','firstname')." ".get_data('staff',$value->staff_id,'staff_id','lastname'); ?></td>

                    <td><?php echo $value->month; ?></td>
                    <td><a href="<?php echo admin_url().'staff/slip/'.$value->salary_slip_id;?> "><i class="fa fa-print"></i></a></td>
                    <td>
                      <a href="<?php echo admin_url().'';?>#"><i class="fa fa-pencil"></i></a>
                      <a href="<?php echo admin_url().'';?>#"><i class="fa fa-trash-o"></i></a>
                    </td> 
                  </tr>
                <?php $i++; } } 
                else{
                  echo "<tr><td colspan='5'>No Salary Slip Found</td></tr>";
                }
                ?>
              </tbody>

            </table>
          
        </div><!-- panel-body -->


      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php //echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->