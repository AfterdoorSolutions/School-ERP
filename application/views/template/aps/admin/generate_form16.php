<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Generate</li>
              </ul>
              <h4>Generate Form-16</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel" >
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'books_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
              <label class="control-label">Select Staff Member</label>
              <?php
                $options=array('Select Staff Member');
                foreach ($query as $key => $value) 
                {
                  $options[$value->staff_id]=$value->firstname." (".$value->staff_id.")";
                }
                echo form_dropdown('staff_id', $options,'','class="form-control" id="staff_id"');
              ?>
            </div>
            <div class="col-md-4">
              <label class="control-label">Year</label>
              <?php
                $options=array('Select Year');
                foreach ($batch as $key => $value) 
                {
                  $options[$value->batch_id]=$value->start_date." - ".$value->end_date;
                }
                echo form_dropdown('year_id', $options,'','class="form-control" id="batch_id"');
              ?>
            </div>
            <div class="col-md-4">
              <label class="control-label" style="color:#fff">Generate</label><br/>
              <a href="#" class="generate_form16_for_staff btn btn-primary">Generate</a>
            </div>
          </div>

          <div class="row">
            <div id="show_form16">
            </div>
          </div>

        </div><!-- panel-body -->
        
       
    <?php echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->
</div><!-- contentpanel -->