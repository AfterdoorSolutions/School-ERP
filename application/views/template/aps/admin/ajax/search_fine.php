<table class="table table-striped table-bordered responsive datatable" >
  <thead class="">
    <tr>
      <th>Student Adm No</th>
      <th>Student Name</th>
      <th>Accession No.</th>
      <th>Book Name</th>
      <th>Issued Date</th>
      <th>Due Date</th>
      <th>Return Date</th>
      <th>Paid</th>
      <th>Fine</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  if($query!=NULL)
  {
    foreach ($query as $key => $query) 
    {
      
  ?> 
  <tr>
    <td><?php echo $query->adm_no; ?></td>
    <td><?php echo $query->name;?></a></td>
    <td><?php echo $query->accession_no;?></a></td>
    <td><?php echo $query->title;?></td>
    <td><?php echo $query->issue_date;?></td>
    <td><?php echo $query->due_date;?></td>
    <td><?php if($query->return_date==0){ echo "Not retuned"; } else{ echo $query->return_date; } ?></td>
    <td><?php if($query->paid==0){ echo "-";} else{ echo "$query->paid"; }?></td>
    <td><?php echo $query->fine;?></td>
  </tr>
  <?php
    } 
  }
  else
  {
    echo "<tr><td colspan='8'> No Data Found</td></tr>";
  }
  ?>
  </tbody>
</table>
