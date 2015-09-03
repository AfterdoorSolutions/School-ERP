<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Accounts Reports</li>
                </ul>
                <h4>Accounts Reports</h4>
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
        <div class="panel-heading no-collapse"><h4 class="panel-title">Accounts Reports</h4></div>
        <?php //if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-4"> 
              <label class="control-label">From</label>
              <input type="text" id="from" name="from" class="form-control datepicker" id="from" value="<?php echo set_value('from'); ?>">
              <?php echo form_error('from'); ?>
            </div><!-- col-md-6 -->
            <div class="col-md-4"> 
              <label class="control-label">To</label>
              <input type="text" id="to" name="to" class="form-control datepicker" id="to" value="<?php echo set_value('to'); ?>">
              <?php echo form_error('to'); ?>
            </div><!-- col-md-6 -->

            <div class="col-md-3">
              <label class="control-label">Report Type</label>
              <?php
              $options = array(
                  ''  => 'Select One',
                  '0' => 'Income Reports',
                  '1'  => 'Expense Reports',
                  '2'   => 'Income/Expense Summary',
                  '3'    => 'Books History'
                );
              echo form_dropdown('report_type', $options, '','class="form-control " id="report_type"');
              ?>
            </div>

             <div class="col-md-1">
                <label class="control-label" style="color:#fff">Click</label><br>
                <a href="#" class="generate_account_report btn btn-primary">GO</a>
            </div>

            <!-- <div class="col-md-4">
              <label class="control-label" style="color:#fff">Select</label><br/>
              <a href="#" id="get_student_status1" class="btn btn-primary">Search</a>
            </div> -->
           
          </div><!-- row -->

          <div class="row">
            <div id="show_account_report">
            </div>
          </div>
        </div><!-- panel-body -->

        <div class="panel-footer"></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->


</div><!-- contentpanel -->

                    
                       