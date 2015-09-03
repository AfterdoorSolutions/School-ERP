<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse"> Category Update</p>
	        <div class="panel-body">
  <div class="">
  <div class="col-md-12">
    <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }
     $attributes = array('class' => 'form-horizontal', 'id' => 'category-update_form');
			echo form_open('', $attributes);
  ?>
        <div class="form-group">
        <label> Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $result['name'];
?>">
       
        </div>
      
        <div class="form-group">
        <label>Parent</label>
          <?php
                $query =$this->db->query("SELECT category_id,name FROM category where category_id!='".$result['category_id']."'"); 
                $options= array('0'=>'Self');
                foreach ($query->result() as $row)
                {
                  $options[$row->category_id]=$row->name;
                }
                $category_id=$result['parent'];
                echo form_dropdown('parent', $options, $category_id,'class="form-control"');
                ?>
        </div>
          </div>
        
      </div>
</div>
<br>
    <div class="btn-toolbar list-toolbar">
    <div class="col-md-12">
     <?php
					echo form_submit('category', 'Submit','class="btn btn-primary"');
					?>
          </div>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
  </div>
  </div>
  </div>
  