<div class="content">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse">Distributor</p>
        <div class="panel-body">
        <?php
		  	$attributes = array('class' => 'form-horizontal', 'id' => 'distributor-update_form');
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

      			</div>
			</div>
			<br>
		    <div class="btn-toolbar list-toolbar">
		    <?php
				echo form_submit('distributor', 'Submit','class="btn btn-primary"');
			?>
		    </div>

       </div>
       <?php echo form_close();?>
	</div>
</div>

	

    