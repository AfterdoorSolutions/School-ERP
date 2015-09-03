<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Agent</p>
	        <div class="panel-body">
		  <div class="row">   
		  <div class="col-md-12">
  <?php
  $attributes = array('class' => 'form-horizontal', 'id' => 'agent_form');
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
        </div><!-- 
        <div class="input-group">
            <label>Distributor</label> -->
           <input type="hidden" name="distributor_id" value="<?php echo $this->config->item('user_portal_id'); ?>" >
            <?php

          /*$query =$this->db->query('SELECT user_portal_id,name FROM user_portal where parent_id="0"'); 
          $options= array(''=>"Select distributor");
          foreach ($query->result() as $row)
          {
            $options[$row->user_portal_id]=$row->name;
          }
          echo form_dropdown('distributor_id', $options, set_value('distributor_id'),'class="form-control"');
      ?>
      <?php echo form_error('distributor_id'); */?>
            
          <!-- </div> -->
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
    