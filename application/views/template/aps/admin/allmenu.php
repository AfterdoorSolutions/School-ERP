<div class="content">
	<div class="header">
    <h1 class="page-title">All Menus</h1>
  </div>
		  
  <?php
  //$attributes = array('class' => 'form-horizontal', 'id' => 'allcaste_form');
			//echo form_open('', $attributes);
  ?>
 
    
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
     
  <table id="basicTable"  class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="basicTable-info">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Link</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $i=0;
      if($query!=NULL)
      {
          foreach ($query as $data) 
          {

          ?>
    
          <tr>
              <td><?php echo ++$i;?></td>
              <td><?php echo $data->name; ?></td>
              <td><?php if($data->parent=='0'){ echo "Main Menu(SELF)"; }else {$query =$this->db->query("SELECT menu_id,name FROM menu where menu_id='".$data->parent."'"); echo $query->row()->name;} ?></td>
              <td><?php echo $data->link; ?></td>
              <td><a href="<?php echo base_url()."admin/menu/update/".$data->menu_id; ?>"><i class="fa fa-pencil"></i></a></td>
        <td><a href="<?php echo base_url()."admin/menu/delete/".$data->menu_id; ?>"><i class="fa fa-trash-o"></i></a></td>
          </tr>
    
          <?php
           }
     }
     else
     {
        echo "<tr><td colspan='5'> No Data Found</td></tr>";
     }
    ?>
    </tbody>
  </table>
</div>
