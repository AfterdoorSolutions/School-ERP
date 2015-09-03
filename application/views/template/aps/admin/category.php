<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Category</p>
	        <div class="panel-body">
		  <div class="">   
		  <div class="col-md-12">
  <?php
  //var_dump($query);
  $attributes = array('class' => 'form-horizontal', 'id' => 'category_form');
			echo form_open('', $attributes);
  ?>

		<?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
        <div class="form-group">
       		<label> Name</label>
     		<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" >
     		<?php echo form_error('name'); ?>
        </div>

        <div class="form-group">
       		<label>Parent</label>
       	 <?php
          $options= array(''=>"Select Any",'0'=>'Self');
          foreach ($query as $data)
          {
            $options[$data->category_id]=$data->name;
          }
          echo form_dropdown('parent', $options, set_value('parent'),'class="form-control"');
          ?>
          <?php echo form_error('parent'); ?>
        </div>

        
      </div>
</div>
<br>
     <div class="btn-toolbar list-toolbar">
     <?php
		echo form_submit('category', 'Submit','class="btn btn-primary"');
	?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
	</div>
	</div>

	</div>
    