<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Subjects</li>
              </ul>
              <h4>Subjects</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'subjects_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Add Subjects</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">
            <div class="col-md-6">
              
                   <label class="control-label">Class</label>
                <?php
                  $options=array(''=>"Select Class");
                  foreach ($query3 as $key)
                  {
                    $options[$key->class_id]=$key->name;
                  }
                  echo form_dropdown('class_id', $options, set_value('class_id'),'class="form-control" id="get_section_class_change"');
                ?>
             
            </div>
            <div class="col-md-6">
                
                    <label class="control-label">Section</label>
                    <div class="show_sections_class_change">
                     <h6>Please Select Class First.</h6>
                    </div>
                
            </div>

          <div class="row">
            <div class="col-md-6">
               
                    <label class="control-label">Batch</label>
                    <div class="show_batch_section_change">
                        <h6>Please Select Section First.</h6>
                    
                </div>
            </div>
             <div class="col-md-6">
              
                <label class="">Subject Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" >
                <?php echo form_error('name'); ?>
             
            </div><!-- col-md-6 -->
          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('subject', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->