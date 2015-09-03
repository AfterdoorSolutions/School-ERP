 <div class="content">
	<div class="header">
        <h1 class="page-title">All Users</h1>
    </div>
  <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'user_form');
	echo form_open('', $attributes);
  ?>

    
      <?php if(isset($message)) { echo $message; }?>
     
    <table class="table">
	  	<thead>
		    <tr>
		      <th>S.No</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Profile</th>
		      <th style="width: 3.5em;">Delete</th>
		    </tr>
	  	</thead>
	  	<tbody>
	        <?php
	        // var_dump($results);
	        foreach($results as $data) 
	        {
	        ?> 
	        <tr>
	            <td><?php echo $data->user_id;?></td>
	            <td><?php echo $data->name; ?></td>
	            <td><?php echo $data->email; ?></td>
	            <td><a href="<?php echo base_url()."admin/user/profile/".$data->user_id; ?>"><i class="fa fa-pencil"></i></a></td>
	          	<td><a href="<?php echo base_url()."admin/user/delete/".$data->user_id; ?>"><i class="fa fa-trash-o"></i></a></td>
	        </tr>
	        <?php
	        }
	        ?>
	    </tbody>
    </table>
</div>

                           
