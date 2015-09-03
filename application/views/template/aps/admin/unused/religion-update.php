<div class="dialog">
      <div class="panel panel-default">
          <p class="panel-heading no-collapse">Religion</p>
          <div class="panel-body">
           <?php if(isset($message)) { echo '<div class="alert alert-info" role="alert">'.$message.'</div>'; }
      $attributes = array('class' => 'form-horizontal', 'id' => 'religion-update_form');
      echo form_open('', $attributes);
  ?>
  <div class="row">
  <div class="col-md-8">
        <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $result['name'];?> ">
       
        </div>
        
      </div>
</div>
    <br>
    <div class="btn-toolbar list-toolbar">
     <?php
          echo form_submit('religion', 'Submit','class="btn btn-primary"');
      ?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
  </div>
  </div>
  </div>

    