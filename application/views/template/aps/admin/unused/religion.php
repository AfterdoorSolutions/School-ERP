<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Religion</p>
	        <div class="panel-body">
        <?php
        if(isset($message)) { echo $message; }
          $attributes = array('class' => 'form-horizontal', 'id' => 'religion_form');
           echo form_open('', $attributes);
        
        ?>
  <div class="row">
  <div class="col-md-8">
     <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
        <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
        <?php echo form_error('name'); ?>
        </div>
        </div>
</div>
<br />
    <div class="btn-toolbar list-toolbar">
     <?php
					echo form_submit('religion', 'Submit','class="btn btn-primary"');
					?>
          </div>
          
       </div><!-- row -->
       <?php echo form_close();?>
  </div>
  </div>
  </div>