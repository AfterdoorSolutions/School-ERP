<div class="content">
	<div class="header">
    <h1 class="page-title">All Castes</h1>
  </div>
		  
  <?php
  $attributes = array('class' => 'form-horizontal', 'id' => 'allcaste_form');
			echo form_open('', $attributes);
  ?>
 
    
      <?php if(isset($message)) { echo $message; }?>
     
  <table id="basicTable"  class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="basicTable-info">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Religion</th>
        <th>Update</th>
        <th style="width:3.5em;">Delete</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if(isset($message)) { echo $message; }
      //var_dump($query);
      foreach ($query as $data) 
      {
      ?> 

      <tr>
          <td><?php echo $data['caste_id'];?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['religion_id']; ?></td>
          <td><a href="<?php echo base_url()."admin/caste/update/".$data['caste_id']; ?>"><i class="fa fa-pencil"></i></a></td>
          <td><a href="<?php echo base_url()."admin/caste/delete/".$data['caste_id']; ?>"><i class="fa fa-trash-o"></i></a></td>
          
      </tr>

      <?php
       }
      ?>
    
    </tbody>
  </table>
</div>