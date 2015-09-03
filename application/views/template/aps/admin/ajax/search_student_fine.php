<div class="contentpanel">
    <div class="col-md-12">

        <table  class="table table-striped table-bordered responsive datatable">
            <thead class="">
	            <tr>
		
          <th>Student</th>
          <th>Admission NO</th>
          <th>Type of Fine</th>
          <th>Fine Amount</th>
          <th>Fine Date</th>
          </tr>
            </thead>
            <tbody>
			<?php
		      //var_dump($query);
		      
		      if($query!=NULL)
		      {
		      	      
					    ?> 
			      		<tr>
		
                <td><?php echo $value->first_name; ?></td>
                <td><?php echo $value->adm_number; ?></td>
                <td><?php echo $value->type; ?></td>
                <td><?php echo $value->fine; ?></td>
                <td><?php echo date('d M Y',strtotime($value->time)); ?></td>
              </tr>
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
