<div class="content">
      <div class="panel panel-default">
          <p class="panel-heading no-collapse">Partner Update</p>
          <div class="panel-body">
  <div class="">
  <div class="col-md-8">
    <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }
     $attributes = array('class' => 'form-horizontal', 'id' => 'menu-update_form');
      echo form_open('', $attributes);
  ?>
        <div class="form-group">
        <label> Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $result['name'];
?>">
       
        </div>
      
        <div class="input-group">
          <label>Image</label>
        <input type="file" name="image" class="form-control" value="<?php echo $result['image'];?>" >
       
        </div>
       

        <div class="input-group">
          <label>Description</label>
        <textarea type="text" name="description" class="form-control" value="<?php echo $result['description']; ?>" ></textarea>
       
        </div>
       
        </div>
        </div>
        
      </div>
</div>
<br>
    <div class="btn-toolbar list-toolbar">
    <div class="col-md-12">
     <?php
          echo form_submit('partner', 'Submit','class="btn btn-primary"');
          ?>
          </div>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
  </div>
  </div>
  </div>
  