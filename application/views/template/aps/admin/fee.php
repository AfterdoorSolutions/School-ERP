<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Fee Type</li>
              </ul>
              <h4>Fee Type</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'fee_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Fee Type</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-6">
                <label class="control-label">Fee Category</label>
                <?php
                    $options = array(
                    ''=>'Please Select',
                        '0'         => 'New Admission',
                        '1'         => 'Annual Charges',
                        '2'         => 'Quarterly Charges'
                  );
                  echo form_dropdown('category', $options, set_value('category'),'class="form-control " ');
                  ?>
                  <?php echo form_error('category'); ?>
            </div><!-- col-md-6 -->

            <div class="col-md-6">
                <label class="control-label">Fee Type</label>
                <input type="text" name="type" class="form-control" value="<?php echo set_value('type'); ?>" >
                <?php echo form_error('type'); ?>
            </div><!-- col-md-6 -->
          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('fee', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->