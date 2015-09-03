<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Staff Member</li>
                </ul>
                <h4>All Staff Member</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12">
    	<?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead class="">
	            <tr>
					<th>S.No.</th>
					<th>EMP CODE</th>
					<th>Staff Name</th>
					<th>Generate PaySlip</th>
					<th>View All PaySlips</th>
					<th>Assign Class</th>
					<th>Actions</th>
	            </tr>
            </thead>
            <tbody>
			<?php
		      //var_dump($query);
		      $i=0;
		      if($query!=NULL)
		      {
		      	foreach ($query as $data) 
		      {           
		    ?> 
      		<tr>
		        <td><?php echo ++$i; ?></td>
		        <td><?php echo $data->emp_code;?></td>
		        <td><?php echo $data->firstname." ".$data->lastname;?></td>
		        <td class="text-center"><a href="<?php echo base_url().'admin/staff/generate_pay_slip/'.$data->staff_id?>"><i class="fa fa-file"></i></a></td>
		        <td class="text-center"><a href="<?php echo base_url().'admin/staff/all_pay_slip/'.$data->staff_id?>"><i class="fa fa-eye"></i></a></td>
		        <td class="text-center">
		        	<?php if($data->classname!='' && $data->sectionname!='') { ?>
		        	<?php echo $data->classname ?> - <?php echo $data->sectionname ?> (<a href="#" data-id="<?php echo $data->staff_id; ?>"  class="assign_class"><i class="fa fa-pencil"></i></a>)
		        	<?php }else{ ?>
		        		<a href="#"> class="assign_class">Assign Class</a>
		        	 <?php } ?>
		        </td>
		        <td class="text-center" width="100px">
		        	<a href="<?php echo admin_url();?>/staff/update_staff_member/<?php echo $data->staff_id;?>"><i class="fa fa-pencil"></i></a>
		        	<a href="<?php echo admin_url(); ?>staff/delete_staff_member/<?php echo $data->staff_id;?>" onclick='return confirm("Are you sure?");'><i class="fa fa-trash-o"></i></a>
		    	</td>
      		</tr>
		    <?php
		       } 
		       }
	        else
	        {
	            echo "<tr><td colspan='3'> No Data Found</td></tr>";
	        }
      		?>
			</tbody>
        </table>
    </div><!-- row -->
</div><!-- contentpanel -->

                    
                       