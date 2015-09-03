<div class="content">
	    <div class="panel panel-default">
    <p class="panel-heading no-collapse">Location</p>
	        <div class="panel-body">
  <div class="row">
  <div class="col-md-8">
    <?php
          
      $attributes = array('class' => 'form-horizontal', 'id' => 'location_form');
      echo form_open('', $attributes);
  ?>
    <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
        <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
        <?php echo form_error('name'); ?>
        </div>
        

        <div class="input-group">
          <label>Parent</label>
          <?php

          $query =$this->db->query('SELECT location_id,name FROM location'); 
          $options= array(''=>"Select Religion");
          $options= array('0'=>"Self");
          foreach ($query->result() as $row)
          {
            $options[$row->location_id]=$row->name;
          }
          echo form_dropdown('parent', $options, set_value('location_id'),'class="form-control"');
          ?>
      <?php echo form_error('parent'); ?>
        </div>
      </div>
</div>
<br>
     <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
             
          </div>
       </div><!-- row -->
       <?php echo form_close(); ?>
  </div>
  </div>
  </div>