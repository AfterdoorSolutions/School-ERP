<div class="content">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse">Agent</p>
        <div class="panel-body">
        <?php
		  	$attributes = array('class' => 'form-horizontal', 'id' => 'agent-update_form');
			echo form_open('', $attributes);
		?>
	  		<div class="row">   
	  			<div class="col-md-8">
					 <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }?>

				        <div class="input-group">
				       		 <label> Name</label>
				         		<input type="text" name="name" class="form-control" value="<?php echo $result['name'];?>" >
				        </div>
				        <div class="input-group">
				       		 <label> Phone No</label>
				         		<input type="text" name="phone_no" class="form-control" value="<?php echo $result['phone_no'];?>" >
				        </div>
				         <div class="input-group">
				       		 <label> Email Address</label>
				         		<input type="text" name="email" class="form-control" value="<?php echo $result['email'];?>" >
				        </div>
				       

				       <div class="input-group">
				       		 <label> Address</label>
				         		<input type="text" name="address" class="form-control" value="<?php echo $result['address'];?>" >
				        </div>

				        <div class="input-group">
				            <label>Distributor</label>
				           
				            <?php

				            	$query =$this->db->query('SELECT distributor_id,name FROM distributor'); 
								$options= array(''=>"Select Distributor");
								foreach ($query->result() as $row)
								{
								  $options[$row->distributor_id]=$row->name;
								}
								$distributor_id=$result['distributor_id'];
								echo form_dropdown('distributor_id', $options, $distributor_id,'class="form-control"');
							?>
						</div>
      			</div>
			</div>
			<br>
		    <div class="btn-toolbar list-toolbar">
		    <?php
				echo form_submit('agent', 'Submit','class="btn btn-primary"');
			?>
		    </div>

       </div>
       <?php echo form_close();?>
	</div>
</div>

	

    