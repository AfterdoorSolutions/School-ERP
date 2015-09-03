<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Student Category</li>
                </ul>
                <h4>All Student Category</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
 <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Category</p>
	        <div class="panel-body">
		  <div class="">   
		  <div class="col-md-12">
  <?php
  //var_dump($query);
  $attributes = array('class' => 'form-horizontal', 'id' => 'account_type');
			echo form_open('', $attributes);
  ?>

		<?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
        <div class="form-group">
       		<label> Name</label>
     		<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" >
     		<?php echo form_error('name'); ?>
        </div>

      </div>
</div>
<br>
     <div class="btn-toolbar list-toolbar">
     <?php
		echo form_submit('account_type', 'Submit','class="btn btn-primary"');
	?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
	</div>
	</div>
    <div class="col-md-12">
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead class="">
	            <tr>
					<th>S.No.</th>
					<th>Student Category Name</th>
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
		        <td><?php echo $data->name;?></td>
		        <td class="text-center" width="100px">
		        	<a href="<?php echo admin_url();?>accounts/account_type_actions/update/<?php echo $data->account_type_id;?>"><i class="fa fa-pencil"></i></a>
		        	<a href="<?php echo admin_url();?>accounts/account_type_actions/delete/<?php echo $data->account_type_id;?>" onclick='return confirm("Are you sure?");'><i class="fa fa-trash-o"></i></a>
		    	</td>
      		</tr>
		    <?php
		       } 
		       }
	        else
	        {
	            echo "<tr><td colspan='4'> No Data Found</td></tr>";
	        }
      		?>
			</tbody>
        </table>
    </div><!-- row -->
</div><!-- contentpanel -->

                    
                       