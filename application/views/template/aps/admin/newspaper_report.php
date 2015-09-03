<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Newspaper Report</li>
              </ul>
              <h4>Newspaper Report</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php     
      $attributes = array('class' => 'form-horizontal', 'id' => 'newspaper_report');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Newspaper Report</h4></div>
        
        <div class="panel-body">
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>          
          <div class="row">
           <div class="col-md-6">
                <label class="control-label">Start Date</label>
                <input type="text" name="start_date" class="form-control datepicker" value="<?php echo set_value('start_date'); ?>" >
                <?php echo form_error('start_date'); ?>
            </div><!-- col-md-6 -->

            <div class="col-md-6">
                <label class="control-label">End Date</label>
                <input type="text" name="end_date" class="form-control datepicker" value="<?php echo set_value('end_date'); ?>" >
                <?php echo form_error('end_date'); ?>
            </div><!-- col-md-6 -->
          </div><!-- row -->
          

        </div><!-- panel-body -->
        <div class="panel-footer"><?php echo form_submit('report', 'Submit','class="btn btn-primary",');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
   
    <?php echo form_close();?>  
  <?php 
  if(isset($query))
  {
  ?>
<table id="basicTable" class="table table-striped table-bordered responsive">
<thead class="">
  <th>S.No</th>
  <th>Newspaper Title</th>
  <th>Date</th>
  <th>Volume</th>
  <th>Price</th>
  <th>Total Price</th>
</thead>
<tbody>
 <?php    
          $total_volume=0;
          $total_price=0;     
          $i=0;
          if($query!=NULL)
          {
           
            foreach ($query as $data) 
          {           
        ?> 
          <tr>
            <td><?php echo ++$i;?></td>
            <td><?php echo $data->name;?></td>
            <td><?php echo $data->date;?></td> 
            <td><?php $total_volume=$total_volume+$data->volume;echo $data->volume;?></td>
            <td><?php echo $data->price;?></td> 
            <td><?php $total_price=$total_price+$data->volume*$data->price;echo $data->volume*$data->price;?></td> 
          </tr>          
        <?php
           } 
           }
          else
          {
              echo "<tr><td colspan='7'> No Data Found</td></tr>";
          }
          ?>
          <tr>
            <td></td>
            <td></td>
            <th class="text-right">Total Volume</th>
            <td><?php echo $total_volume;?></td>
            <th class="text-right">Total Price</th>
            <td><?php echo $total_price;?></td>

          </tr>

      </tbody>
        </table>
        <?php
        }
?>
  </div><!-- row -->
</div><!-- contentpanel -->