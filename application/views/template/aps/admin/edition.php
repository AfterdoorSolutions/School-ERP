<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Add Edition</li>
              </ul>
              <h4>Add Edition</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'magzine_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Add Magazine</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-4"> 
                
                <label class="control-label">Select Magazine</label>
                <?php
                  $options=array(''=>'Select Magazine');
                  foreach ($magazine_data as $value) 
                  {
                    $options[$value->magazine_id]=$value->title;
                  }
                  echo form_dropdown('magazine_id',$options,'','class="form-control" id="magazine_id"');
                ?>
             
            </div><!-- col-md-4-->

               <div class="col-md-4"> 
                <label class="control-label">Subscription Year</label>
                <div id="show_subscription_year">

                <h6>Please Select Magazine First.</h6>
                </div>
              
            </div><!-- col-md-4 -->

            <div class="col-md-4"> 
                
                <label class="control-label">Month</label>
                <input type="text" name="month" class="form-control datepicker_m" value="<?php echo set_value('month'); ?>" placeholder="Enter month">
                <?php echo form_error('month'); ?>
             
            </div><!-- col-md-4-->

          </div>
          <div class="row">

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

            <div class="col-md-4"> 
             <label class="control-label">Number</label>
              <input type="text" name="number" class="form-control" value="<?php echo set_value('number'); ?>" placeholder="Enter Number">
              <?php echo form_error('number'); ?>
           </div><!-- col-md-4 -->

           <div class="col-md-4"> 
             <label class="control-label">Date of Receipt</label>
              <input type="text" name="dor" class="form-control datepicker" value="<?php echo set_value('dor'); ?>" placeholder="Enter Date of Receipt">
              <?php echo form_error('dor'); ?>
           </div><!-- col-md-4 -->
        
          </div><!-- row --> 
        </div><!-- panel-body -->

         <div class="panel-footer"><?php echo form_submit('edition', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->