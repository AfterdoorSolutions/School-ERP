<?php

if(isset($student))
{
?>
   <table id="basicTable" class="table table-striped table-bordered responsive datatable">
        	<tr>
        		<th>Name</th>
        		<td><?php echo $student->name;?></td>
        		<th>Father's Name</th>
        		<td><?php echo $student->father_name;?></td>
        	</tr>
		</table>
<?php
}
else
{
?>
   <table id="basicTable" class="table table-striped table-bordered responsive datatable">
        	<tr>
        		<th>Name</th>
        		<td><?php echo $staff->name;?></td>
        	</tr>
		</table>
<?php	
}
     