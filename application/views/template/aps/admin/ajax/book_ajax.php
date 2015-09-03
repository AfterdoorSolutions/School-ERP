<div class="contentpanel">
    <div class="col-md-12">

        <table  class="table table-striped table-bordered responsive datatable">
            <thead class="">
	            <tr>
		  <th>Accession No.</th>
          <th>Title</th>
          <th>Author</th>
          <th>Status</th>
          <th>Issued To</th>
          <th>Issued On</th>
          <th>Due Date</th>
          <th>Reference Book</th>

          </tr>
            </thead>
            <tbody>
			<?php
		      //var_dump($query);
		      
		      if($query_a!=NULL)
		      {
		      	foreach ($query_a as $query) {
		      	      	    
					    ?> 
			      		<tr>
						    <td><?php echo $query->accession_no; ?></td>
				            <td>
				            	<?php 
				            	if(!isset($query->issue_date) and $query->reference=='no')
				            	{ ?>

				            	<a href="<?php echo admin_url().'library/show_book/'.$query->accession_no; ?>"><?php echo $query->title;?></a>
				            	<?php }
				            	else
				            	{ ?>
				            	<?php echo $query->title;?>
				            	<?php }
				            	?>
				            </td>
				            <td><?php echo $query->author; ?></td>
				            
				            <td>
				            	<?php 
				            	if(!isset($query->issue_date) and $query->reference=='no')
				            	{
				            		echo "<i class='fa fa-check'></i>";
				            	}
				            	else
				            	{	
				            		echo "<i class='fa fa-times'></i>";
				            	}
				            	?>
				            </td>
				            <td>
				            	<?php 
				            	if(!isset($query->issue_date))
				            	{
				            		echo "--";
				            	}
				            	else
				            	{
				            		?>
							<a class="check_full_details" data-id='<?php echo $query->issue_to_id;?>' data-type="<?php echo $query->issue_to;?>"><?php echo $query->first_name;?> (<?php echo $query->adm_number;?>)</button>
                            
				            		<?php
				            		
				            	}
				            	?>
				            </td>
				            <td>
				            	<?php 
				            	if(!isset($query->issue_date))
				            	{
				            		echo "--";
				            	}
				            	else
				            	{
				            		echo date("d-m-Y", strtotime($query->issue_date));
				            	}
				            	?>
				            </td>
				            <td>
				            	<?php 
				            	if(!isset($query->issue_date))
				            	{
				            		echo "--";
				            	}
				            	else
				            	{
				            		echo date("d-m-Y", strtotime($query->due_date));
				            	}
				            	?>
				            </td>

				            <td><?php if($query->reference=='no'){ echo "No"; } else{ echo "Yes"; } ?></td>
				            
				    		
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
