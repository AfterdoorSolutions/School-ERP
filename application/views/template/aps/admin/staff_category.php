<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Staff Category</li>
              </ul>
              <h4>Staff Category</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'menu_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Staff Category</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">
            <div class="col-md-6">
              <div class="">
                <label class="">Staff Category Name</label>
                <input type="text" name="name" placeholder="eg: Teaching Staff" class="form-control" value="<?php echo set_value('name'); ?>" >
                <?php echo form_error('name'); ?>
              </div>
            </div><!-- col-md-6 -->
            <div class="col-md-6">
              <div class="">
                <label class="">Short Name</label>
                <input type="text" name="short_name" placeholder="eg: (TS)" class="form-control" value="<?php echo set_value('short_name'); ?>" >
                <?php echo form_error('short_name'); ?>
              </div>
            </div><!-- col-md-6 -->
          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('menu', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->