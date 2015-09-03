<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse"> All Menus</p>
	        <div class="panel-body">
  <div class="">
  <div class="col-md-12">
    <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }
     $attributes = array('class' => 'form-horizontal', 'id' => 'menu-update_form');
			echo form_open('', $attributes);
  ?>
        <div class="form-group">
        <label>Menu Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $result['name'];
?>">
       
        </div>
      
        <div class="form-group">
        <label>Parent</label>
          <?php
                $query =$this->db->query("SELECT menu_id,name FROM menu where menu_id!='".$result['menu_id']."'"); 
                $options= array('0'=>'Self');
                foreach ($query->result() as $row)
                {
                  $options[$row->menu_id]=$row->name;
                }
                $menu_id=$result['parent'];
                echo form_dropdown('parent', $options, $menu_id,'class="form-control"');
                ?>
        </div>
           <div class="form-group">
        <label>Menu Link</label>
        <input type="text" name="link" class="form-control" value="<?php echo $result['link'];
?>">
       
        </div>
        <div class="form-group">
        <label>Sort Order</label>
        <input type="text" name="sort" class="form-control" value="<?php echo $result['sort'];
?>">
       
        </div>
        </div>
        
      </div>
</div>
<br>
    <div class="btn-toolbar list-toolbar">
    <div class="col-md-12">
     <?php
					echo form_submit('menu', 'Submit','class="btn btn-primary"');
					?>
          </div>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
  </div>
  </div>
  </div>
  