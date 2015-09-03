<div class="content">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse">Caste</p>
        <div class="panel-body">
        <?php
		  	$attributes = array('class' => 'form-horizontal', 'id' => 'caste-update_form');
			echo form_open('', $attributes);
		?>
	  		<div class="row">   
	  			<div class="col-md-8">
					 <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }?>

				        <div class="input-group">
				       		 <label>Caste Name</label>
				         		<input type="text" name="name" class="form-control" value="<?php echo $result['name'];?>" >
				        </div>

				        <div class="input-group">
				            <label>Religion</label>
				           
				            <?php

				            	$query =$this->db->query('SELECT religion_id,name FROM religion'); 
								$options= array(''=>"Select Religion");
								foreach ($query->result() as $row)
								{
								  $options[$row->religion_id]=$row->name;
								}
								$religion_id=$result['religion_id'];
								echo form_dropdown('religion_id', $options, $religion_id,'class="form-control"');
							?>
						</div>
      			</div>
			</div>
			<br>
		    <div class="btn-toolbar list-toolbar">
		    <?php
				echo form_submit('caste', 'Submit','class="btn btn-primary"');
			?>
		    </div>

       </div>
       <?php echo form_close();?>
	</div>
</div>

	

    