<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Batches</li>
              </ul>
              <h4>Batches</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'batch_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Batches</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">
          </div>

          <div class="row">
            <div class="col-md-4">
              <label class="control-label">Class</label>
                <?php
                  $options=array(''=>"Select Class");
                  foreach ($query3 as $key)
                  {
                    $options[$key->class_id]=$key->name;
                  }
                  echo form_dropdown('class_id', $options, set_value('class_id'),'class="form-control" id="get_section_class_change"');
                ?>
             </div><!-- col-md-4 -->

            <div class="col-md-4 ">
              <label class="control-label">Section</label>
              <div class="show_sections_class_change">
                <h6>Please Select Class First.</h6>
              </div>
            </div><!-- col-md-4 -->

            <div class="col-md-4">
              <label class="control-label">Batch</label>
                <?php
                  $options=array(''=>"Select Batch");
                  foreach ($query as $key)
                  {
                    $options[$key->batch_id]=$key->start_date."-".$key->end_date;
                  }
                  echo form_dropdown('batch_id', $options, set_value('batch_id'),'class="form-control"');
                ?>
             </div><!-- col-md-4 -->
          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('batches', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->