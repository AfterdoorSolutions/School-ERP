<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Fee Types</li>
                </ul>
                <h4>All Fee Types</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12">
        <table id="basicTable" class="table table-striped table-bordered responsive">
            <thead class="">
	            <tr>
					<th>S.No.</th>
					<th>Fee Category</th>
					<th>Fee Types</th>
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
		        <td><?php if($data->category==0){ echo "New Admission"; } else if($data->category==1){ echo "Annual Charges"; } else{ echo "Quartely Charges"; } ?></td>
		        <td><?php echo $data->type;?></td>
		        <td class="text-center" width="100px">
		        	<a href="#"><i class="fa fa-pencil"></i></a>
		        	<a href="#"><i class="fa fa-trash-o"></i></a>
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

                    
                       