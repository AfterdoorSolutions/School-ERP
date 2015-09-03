<div class="contentpanel">
    <div class="col-md-12">

        <table class="table table-striped table-bordered responsive datatable" >
            <thead class="">
	            <tr>
				  <th>Searched Id</th>
		          <th>Name</th>
		          <th>Issue</th>
          		</tr>
            </thead>
            <tbody>
			<?php
		      //var_dump($query);
		      
		    if($query!=NULL)
		      {               
		    ?> 
      		<tr>
		    <td><?php echo $query->adm_number; ?></td>
            <td><?php echo $query->name;?></td>
            <td><a href="#" class="student_book_issue" data-issueto="<?php echo $query->issue_to;?>" data-admno='<?php echo $query->adm_number; ?>' data-name='<?php echo $query->name; ?>' data-id='<?php echo $query->id; ?>'>Issue Book</a></td>
            </tr>
		    <?php
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
