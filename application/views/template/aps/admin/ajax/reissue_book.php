<div class="contentpanel">
    <div class="col-md-12">

        <table  class="table table-striped table-bordered responsive datatable">
            <thead class="">
	            <tr>
		  <th>Book No.</th>
          <th>Title</th>
          <th>Author</th>
          <th>Status</th>
          <th>Issued To</th>
          <th>Issued On</th>
          <th>Due Date</th>
          <th>Fine</th>
          <th>Return</th>
          <th>Reissue</th>
          </tr>
            </thead>
            <tbody>
			<?php
		      //var_dump($query);
		      
		      if($query!=NULL)
		      {
		      	      
					    ?> 
			      		<tr>
						    <td><?php echo $query->book_id; ?></td>
				            <td>
				            	<?php 
				            	if(!isset($query->issue_date))
				            	{ ?>

				            	<a href="<?php echo admin_url().'library/show_book/'.$query->book_id; ?>"><?php echo $query->title;?></a>
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
				            	if(!isset($query->issue_date))
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
							<a class="check_full_details" data-id='<?php echo $query->issue_to_id;?>' data-type="student"><?php echo $query->first_name;?> (<?php echo $query->adm_number;?>)</button>
                            
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
				            <td><?php echo $query->fine;?></td>
				            <td class="return_book_insert_show"><a href="" data-studentid='<?php echo $query->issue_to_id;?>' data-issueid="<?php echo $query->books_issued_id;?>" data-fine="<?php echo $query->fine;?>" class="return_book_insert">Return </a></td>
				            <td class="student_book_issue"><a href="" data-studentid='<?php echo $query->issue_to_id;?>' data-issueid="<?php echo $query->books_issued_id;?>" class="student_book_issue">Reissue</td>
				    		
			            </tr>
		    		   <?php
		    		  
			}
	        else
	        {
	            echo "<tr><td colspan='4'> No Data Found for returning the book</td></tr>";
	        }
      		?>
			</tbody>
        </table>

    </div><!-- row -->
</div><!-- contentpanel -->
