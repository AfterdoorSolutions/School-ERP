<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Graduation</p>
	        <div class="panel-body">
  <div class="row">
  <div class="col-md-8">
   <?php
   if(isset($message)) { echo $message; }
     $attributes = array('class' => 'form-horizontal', 'id' => 'graduation_form');
			echo form_open('', $attributes);
  ?>
   <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
        <div class="input-group">
        <label>Degree Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
        <?php echo form_error('name'); ?>
        </div>
      
        <div class="input-group">
        <label>Type</label>
          <select name="type" class="form-control">
            <option value="">Select</option>
            <option <?php echo set_select('type', 'Diploma'); ?> >Diploma</option>
            <option <?php echo set_select('type', 'Under Graduation'); ?> >Under Graduation</option>
            <option <?php echo set_select('type', 'Graduation'); ?> >Graduation</option>
            <option <?php echo set_select('type', 'Post Graduation'); ?> >Post Graduation</option>
            <option <?php echo set_select('type', 'Doctrate'); ?> >Doctrate</option>
            <option <?php echo set_select('type', 'Ohters'); ?> >Others</option>
          </select>
        </div>
       <?php echo form_error('type'); ?>
      </div>
</div>
<br>
    <div class="btn-toolbar list-toolbar">
     <?php
					echo form_submit('graduation', 'Submit','class="btn btn-primary"');
					?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
  </div>
  </div>
  </div>