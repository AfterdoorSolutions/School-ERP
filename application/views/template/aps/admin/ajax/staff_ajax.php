<div class="contentpanel">
    <div class="col-md-12">

        <table class="table table-striped table-bordered responsive datatable" >
            <thead class="">
	            <tr>
		  <th>Staff Id.</th>&nbsp;
          <th>Name</th>
          </tr>
            </thead>
            <tbody>
			<?php
		      //var_dump($query);
		      
		      if($query!=NULL)
		      {
		      	          
		    ?> 
      		<tr>
		    <td><?php echo $query->staff_id; ?></td>
            <td><?php echo $query->firstname;?></a></td>
            </tr>
		    <?php
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
