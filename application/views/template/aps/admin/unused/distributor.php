<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Distributor</p>
	        <div class="panel-body">
		  <div class="row">   
		  <div class="col-md-12">
  <?php
  $attributes = array('class' => 'form-horizontal', 'id' => 'distributor_form');
			echo form_open('', $attributes);
  ?>

    
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
       <div class="input-group">
       		<label> Name</label>
         		<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" >
         		<?php echo form_error('name'); ?>
        </div>
 		
         <div class="input-group">
       		<label> Phone No</label>
         		<input type="text" name="phone_no" class="form-control" value="<?php echo set_value('phone_no'); ?>" >
         		<?php echo form_error('phone_no'); ?>
        </div>
        <div class="input-group">
       		<label> Email Address</label>
         		<input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" >
         		<?php echo form_error('email'); ?>
        </div>
        <div class="input-group">
       		<label> Password</label>
         		<input type="password" autocomplete="off" name="password" class="form-control" value="<?php echo set_value('password'); ?>" >
         		<?php echo form_error('password'); ?>
        </div>
        <div class="input-group">
       		<label> Address</label>
         		<textarea name="address" class="form-control"><?php echo set_value('address'); ?></textarea>
         		<?php echo form_error('address'); ?>
        </div>
       
      </div>
</div>
<br>
     <div class="btn-toolbar list-toolbar">
     <?php
		echo form_submit('distributor', 'Submit','class="btn btn-primary"');
	?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
	</div>
	</div>

	</div>
    