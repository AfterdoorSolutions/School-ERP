<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Partner</p>
	        <div class="panel-body">
		  <div class="row">   
		  <div class="col-md-8">
        <?php echo form_open_multipart('');?>
        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" >
 <br>
<input type="file" name="image" size="20" />
<br>
        <textarea type="text" name="description" class="form-control" value="<?php echo set_value('decription'); ?>" ></textarea>
 
<br /><br />
 
<input type="submit" value="upload" name="upload" />
 
</form>
  <?php
  //var_dump($query);

	?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
	</div>
	</div>

	</div>
    