<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Search Fine</li>
              </ul>
              <h4>Search Fine</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'search_fine');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Search Fine</h4></div>
        <?php //if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-4"> 
              <label class="control-label">Student Admission No</label>
              <input type="text" name="adm_number" class="form-control" id="adm_no" value="<?php echo set_value('adm_number'); ?>">
              <?php echo form_error('adm_number'); ?>
            </div><!-- col-md-6 -->

            <div class="col-md-4">
              <label class="control-label">View Details</label>
              <?php
              $options = array(
                  ''  => 'Select One',
                  '0' => 'Pending Fine',
                  '1'  => 'All Fine',
                  '2'   => 'Pending Books',
                  '3'    => 'Books History'
                );
              echo form_dropdown('details', $options, '','class="form-control" id="status"');
              ?>
            </div>

            <!-- <div class="col-md-4">
              <label class="control-label" style="color:#fff">Select</label><br/>
              <a href="#" id="get_student_status1" class="btn btn-primary">Search</a>
            </div> -->
           
          </div><!-- row -->

          <div class="row">
            <div class="show_student_fine">
            </div>
          </div>
        </div><!-- panel-body -->

        <div class="panel-footer"></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->