<div class="dialog">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse"> All Graduation</p>
	        <div class="panel-body">
  <div class="row">
  <div class="col-md-8">
    <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }
     $attributes = array('class' => 'form-horizontal', 'id' => 'graduation-update_form');
			echo form_open('', $attributes);
  ?>
        <div class="input-group">
        <label>Degree Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $result['name'];
?>">
       
        </div>
      
        <div class="input-group">
        <label>Type</label>
       
          <select name="type" class="form-control">
          
            <option value="">Select</option>
            <option value="Graduation" <?php echo set_select('type', 'graduation'); ?> >Graduation</option>
           <option value="Post Graduation" <?php echo set_select('type', 'post graduation'); ?> >Post Graduation</option>

          </select>

           
        </div>
        
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