<div class="row row-stat">
  <?php
    //var_dump($query);
    $attributes = array('class' => 'form-horizontal', 'id' => 'edition_form');
    echo form_open('', $attributes);
  ?>
  <div class="col-md-12">
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

      <div class="panel-body">

        <div class="row">

          <div class="col-md-4"> 
              
              <label class="control-label">Month</label>
              <input type="text" name="month" class="form-control" value="<?php echo set_value('month'); ?>" placeholder="Enter month">
              <?php echo form_error('month'); ?>
           
          </div><!-- col-md-4-->

             <div class="col-md-4"> 
              
              <label class="control-label">Year</label>
              <input type="text" name="year" class="form-control datepicker_y" value="<?php echo set_value('year'); ?>" placeholder="Enter Year">
              <?php echo form_error('year'); ?>
            
          </div><!-- col-md-4 -->
         
         <div class="col-md-4"> 
             
              <label class="control-label">Volume</label>
              <input type="text" name="volume" class="form-control" value="<?php echo set_value('volume'); ?>" placeholder="Enter Volume">
              <?php echo form_error('volume'); ?>
            
          </div><!-- col-md-4 -->
        </div><!-- row -->

        <div class="row">

          <div class="col-md-4"> 
             <label class="control-label">Number</label>
              <input type="text" name="number" class="form-control" value="<?php echo set_value('number'); ?>" placeholder="Enter Number">
              <?php echo form_error('number'); ?>
           </div><!-- col-md-4 -->

           <div class="col-md-4"> 
             <label class="control-label">Date of Receipt</label>
              <input type="text" name="dor" class="form-control" value="<?php echo set_value('dor'); ?>" placeholder="Enter Date of Receipt">
              <?php echo form_error('dor'); ?>
           </div><!-- col-md-4 -->

        </div>
        
      </div><!-- panel-body -->

       <?php echo form_submit('magzine', 'Submit','class="btn btn-primary"');?>

  </div><!-- col-md-12 -->
  <?php echo form_close();?>  
</div><!-- row -->

