<div class="content">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse">View Profile</p>
   
        <div class="panel-body">
       
<table id="basicTable"  class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="basicTable-info">
	<tbody>
	<?php
	//var_dump($query);
    
      if($query!=NULL)
      {
          foreach ($query as $data) 
          {
          ?> 
			
		<tr><td align="center"><h4>Name: </h4></td><td align="center"><?php echo $data['name'];?></td></tr>
		<tr><td align="center"><h4>Email: </h4></td><td align="center"><?php echo $data['email'];?></td></tr>
		<tr><td align="center"><h4>Profile For: </h4></td><td align="center"><?php echo $data['profile_for'];?></td></tr>
		<tr><td align="center"><h4>Height: </h4></td><td align="center"><?php echo $data['height'];?></td></tr>
		<tr><td align="center"><h4>Gender: </h4></td><td align="center"><?php echo $data['gender'];?></td></tr>
		<tr><td align="center"><h4>Date Of Birth: </h4></td><td align="center"><?php echo $data['dob'];?></td></tr>
		<tr><td align="center"><h4>Country: </h4></td><td align="center"><?php  echo $data['country_id']; ?></td></tr>
		<tr><td align="center"><h4>City: </h4></td><td align="center"><?php echo $data['city_id'];?></td></tr>
	    <tr><td align="center"><h4>Religion: </h4></td><td align="center"><?php echo $data['religion_id'];?></td></tr>
	    <tr><td align="center"><h4>Caste: </h4></td><td align="center"><?php echo $data['caste_id'];?></td></tr>
	    <tr><td align="center"><h4>Mother tongue: </h4></td><td align="center"><?php echo $data['mtongue'];?></td></tr>
        <tr><td align="center"><h4>Photo: </h4></td><td align="center"><?php echo  $data['image'];?></td></tr>


	</tbody>
	<?php
		}
 }
     else
     {
        echo "<tr><td colspan='5'> No Data Found</td></tr>";
     }
	?>

</table>
 <center><a href="<?php echo base_url()."admin/user/main/".$data['user_id']; ?>" class="btn btn-info">BACK</a></center>
</div>
</div>
</div>
