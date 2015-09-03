<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Add Magazine Subscription</li>
              </ul>
              <h4>Add Magazine Subscription</h4>
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
                
                <label class="control-label">Magazine</label>
                <?php
                  $options=array(''=>'Select Magazine');
                  foreach ($magazine_data as $value) 
                  {
                    $options[$value->magazine_id]=$value->title;
                  }
                  echo form_dropdown('magazine_id',$options,'','class="form-control"');
                 echo form_error('magazine_id'); ?>

             
            </div><!-- col-md-4-->

               <div class="col-md-4"> 
                
                <label class="control-label">Subscription Start</label>
                <input type="text" name="subscription_start" class="form-control datepicker_my" value="<?php echo set_value('subscription_start'); ?>" placeholder="Enter Time Period Start">
                <?php echo form_error('subscription_start'); ?>
              
            </div><!-- col-md-4 -->
           
           <div class="col-md-4"> 
               
                <label class="control-label">Subscription End</label>
                <input type="text" name="subscription_end" class="form-control datepicker_my" value="<?php echo set_value('subscription_end'); ?>" placeholder="Enter Time Period End">
                <?php echo form_error('subscription_end'); ?>
              
            </div><!-- col-md-4 -->
          </div><!-- row -->

          <div class="row">

            <div class="col-md-4"> 
               <label class="control-label">Amount</label>
                <input type="text" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>" placeholder="Enter Amount">
                <?php echo form_error('amount'); ?>
             </div><!-- col-md-4 -->

          </div>

              
          
          
        </div><!-- panel-body -->

         <div class="panel-footer"><?php echo form_submit('magzine', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->