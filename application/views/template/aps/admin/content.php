<div class="content">
	    <div class="panel panel-default">
	        <p class="panel-heading no-collapse">Add New Page</p>
	        <div class="panel-body">
          <?php
          if(isset($message)) { echo $message; }
      $attributes = array('class' => 'form-horizontal', 'id' => 'language_form');
      echo form_open('', $attributes);
  ?>
      <div class="col-md-12">
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; }?>
        <div class="form-group">
        <label>Title</label>
        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
        <?php echo form_error('name'); ?>
        </div>
        <div class="form-group">
        <label>Url Masking</label>
        <input type="text" name="slug" class="form-control" value="<?php echo set_value('slug'); ?>">
        <?php echo form_error('slug'); ?>
        </div>
        <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control editors" id="editor1"><?php echo set_value('content'); ?></textarea>
        <?php echo form_error('content'); ?>
        </div>
        <div class="form-group">
        <label>SEO Content</label>
        <textarea name="seo_content" class="form-control editors" id="editor2"><?php echo set_value('seo_content'); ?></textarea>
        <?php echo form_error('seo_content'); ?>
        </div>
      </div>

    <br>
    <div class="btn-toolbar list-toolbar">
     <?php
					echo form_submit('language', 'Submit','class="btn btn-primary"');
			?>
          </div>
       </div><!-- row -->
       <?php echo form_close();?>
	</div>
	</div>
	</div>

    