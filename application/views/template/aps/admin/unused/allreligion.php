<div class="content">
	<div class="header">
        <h1 class="page-title">All Religions</h1>
    </div>
  <?php
  $attributes = array('class' => 'form-horizontal', 'id' => 'allreligion_form');
			echo form_open('', $attributes);
  ?>

    
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
     
                 <table id="basicTable"  class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="basicTable-info">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Name</th>
      <th>Update</th>
      <th style="width: 3.5em;">Delete</th>
    </tr>
  </thead>
  <tbody>
                    <?php
                         $i=0; 
                         if($query!=NULL){     
                         foreach ($query as $data) 
                         {
                     ?>  
                                    <tr>
                                        <td><?php  echo ++$i; ?></td>
                                         <td><?php echo $data['name'];?></td>
                                        <td>
          <a href="<?php echo base_url()."admin/religion/update/".$data['religion_id']; ?>"><i class="fa fa-pencil"></i></a></td>
          <td><a href="<?php echo base_url()."admin/religion/delete/".$data['religion_id']; ?>"><i class="fa fa-trash-o"></i></a>
      </td>
                                       
                                        
                                    </tr>
                                       <?php
                                   }
                                   }
                                 else
                                  {
                                    echo "<tr><td colspan=4''> No Data Found</td></tr>";
                                  }
                                   ?>
                                </tbody>
                                
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>

                           
