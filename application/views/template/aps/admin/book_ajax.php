<div class="contentpanel">
    <div class="col-md-12">

        <table id="basicTable" class="table table-striped table-bordered responsive datatable">
            <thead class="">
	            <tr>
		  <th>Book No.</th>
          <th>Title</th>
          <th>Author</th>
          </tr>
            </thead>
            <tbody>
			<?php
		      var_dump($query);
		      $i=0;
		      if($query!=NULL)
		      {
		      	foreach ($query as $data) 
		      {           
		    ?> 
      		<tr>
		    <td><?php echo ++$i; ?></td>
            <td><?php echo $data->title;?></td>
            <td><?php echo $data->author;?></td>
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
