<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li> Settings</li>
              </ul>
              <h4> Settings</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'settings_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Add Settings</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">
             <div class="col-md-4"> 
               
                <label class="">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $query->name; ?>" >
                <?php echo form_error('name'); ?>
              
            </div><!-- col-md-4 -->

           <div class="col-md-4"> 
               
                <label class="">Logo</label>
                <input type="text" name="logo" class="form-control" value="<?php echo $query->logo; ?>" >
                <?php echo form_error('logo'); ?>
              
            </div><!-- col-md-4 -->
            <div class="col-md-4"> 
               
                <label class="">Books Issuable</label>
                <input type="text" name="book_issue_no" class="form-control" value="<?php echo $query->book_issue_no;?>" >
                <?php echo form_error('book_issue_no'); ?>
              
            </div><!-- col-md-4 -->
          </div><!-- row -->

               <div class="row">

            <div class="col-md-4"> 
                <label class="">Student Issue Time Period</label>
                <input type="text" name="student_time_period" class="form-control" value="<?php echo $query->student_time_period;?>" >
                <?php echo form_error('student_time_period'); ?>
            </div><!-- col-md-4 -->

            <div class="col-md-4"> 
                
                <label class="">Staff Issue Time Period</label>
                <input type="text" name="staff_time_period" class="form-control" value="<?php echo $query->staff_time_period; ?>" >
                <?php echo form_error('staff_time_period'); ?>
                

            </div><!-- col-md-4 -->
                 <div class="col-md-4"> 
                <label class="">Tan</label>
                <input type="text" name="tan" class="form-control" value="<?php echo $query->tan; ?>" >
                <?php echo form_error('tan'); ?>
                </div><!-- col-md-4 -->
          </div><!-- row -->
          <div class="row">

            <div class="col-md-4"> 
                
                <label class="">Pan</label>
                <input type="text" name="pan" class="form-control" value="<?php echo $query->pan;?>" >
                <?php echo form_error('pan'); ?>
              
            </div><!-- col-md-4 -->
             <div class="col-md-4"> 
                
                <label class="">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $query->address;?>" >
                <?php echo form_error('address'); ?>
              
            </div><!-- col-md-4 -->
        </div><!-- panel-body -->


      </div><!-- panel panel-default -->
         <div class="panel-footer"><?php echo form_submit('settings', 'Update','class="btn btn-primary"');?></div>
      
    </div><!-- col-md-12 -->    
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->
