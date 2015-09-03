<?php      $this->load->view(TEMPLATE_ADMIN_NAME.'/include/header');?>

    
   	<div class="dialog">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Sign In</p>
	        <div class="panel-body"> 
<div class="row">
		<div class="col-md-12">
			<?php
			// Login Form
			$attributes = array('class' => 'login form-horizontal', 'id' => 'login_form');
			echo form_open('admin/login', $attributes);
			?>
			<h4 class="login-title text-center">Log In</h4>
			<?php if(isset($message)) echo $message; ?>
			<div class="form-group">
				<label class="col-md-4 control-label">Username:</label>
				<div class="col-md-8">
					<?php
					$data = array(
					        'type'  => 'text',
					        'name'  => 'email',
					        'id'    => 'email',
					        'class' => 'username form-control',					        
					        'value'=>set_value('email'),
					        'value' => 'info@test.com'
					);

					echo form_input($data);
					?>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">Password:</label>
				<div class="col-md-8">
					<?php

					$data = array(
					        'type'  => 'password',
					        'name'  => 'password',
					        'id'    => 'password',
					        'value' => '1234',
					        'class' => 'password form-control',
					        'autocomplete'=>'off'
					);

					echo form_input($data);
					?>
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="">	
					<div class="col-md-7">	
						<label><input type="checkbox" name="remember" value="1" checked="checked"> Remember</label>
					</div>
					<div class="col-md-5">	
						<?php
						echo form_submit('login', 'Sign In','class="btn btn-primary"');
						?>
					</div>
				</div>
			</div>
			<div class="form-group text-center">
				
			</div>
			<!-- <div><a href="profile/forgot">Forgot Password?</a></div>
			<div><a href="profile/register">New User? Register Here</a></div> -->
			<?php echo form_close();?>
		</div>
	</div><!-- row -->
	</div>
	</div>
	</div>

<?php      $this->load->view(TEMPLATE_ADMIN_NAME.'/include/footer');?>