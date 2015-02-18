<?php
function get_active_menu()
{
	echo "string";
}
function print_message($message)
{
	if($message==1)
	{
	?>
	<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>oh Great!</strong> Task Completed Successfuly
    </div>
	<?php
	}
	else
	{
	?>
	<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Oh snap! Task Failed</strong> Something went worng please try submitting again.
    </div>
	<?php	
	}	
}
?>