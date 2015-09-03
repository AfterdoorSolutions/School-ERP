<div class="content">
	<div class="header">
        <h1 class="page-title">All Languages</h1>
    </div>
  <?php
  $attributes = array('class' => 'form-horizontal', 'id' => 'alllanguage_form');
			echo form_open('', $attributes);
  ?>

    
      <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
     
                  <table id="basicTable"  class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="basicTable-info">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Overview</th>
      <th>Course Content</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
                    <?php
                 $i=0;
                 //var_dump($query);
                 if($query!=NULL){
      foreach ($query as $data) 
      {
         $content=unserialize($data['content']);
      ?>  
                                    <tr>
                                        <td><?php  echo ++$i; ?></td>
                                         <td><?php echo $data['name'];?></td>
                                         <td><?php echo $data['slug'];?></td>
                                         <td><?php echo substr(strip_tags($content['overview']), 0,200)."..";?></td>
                                         <td><?php echo substr(strip_tags($content['course_content']), 0,200)."..";?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url()."admin/course/update/".$data['content_id'];?>"><i class="fa fa-pencil"></i></a>  
                                            <a href="<?php echo base_url()."admin/course/delete/".$data['content_id'];?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                       
                                        
                                    </tr>
                                       <?php
                                   }
                                 }
                                 else
                                  {
                                    echo "<tr><td colspan='6'> No Data Found</td></tr>";
                                  }

                                   ?>
                                 
                                </tbody>
                                
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>

                           
