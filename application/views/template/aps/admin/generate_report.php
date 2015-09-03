<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Generate Report</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12 ">
        <div class="panel panel-default">
                <div class="panel-heading no-collapse"><h4 class="panel-title">Generate Report</h4></div>
            <div class="panel-body">
    <div class="col-md-12 ">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'class_form');
      echo form_open('', $attributes);
    ?>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Academic Year</label>
                    <?php
                    $options=array(''=>'Select Academic Year');
                    foreach ($batch as $row)
                    {
                      $options[$row->batch_id]=$row->start_date."-".$row->end_date;
                    }
                    echo form_dropdown('batch_id', $options, '','class="form-control" id="batch_id_2"');
                    ?>
                </div>
            
                           
                <div class="col-md-3">
                    <label class="control-label">Class</label>
                    <?php
                    $options=array(''=>'Select Class');
                    if($this->config->item('admin_type')!='staff'){
                    foreach ($classes as $row)
                    {
                      $options[$row->class_id]=$row->name;
                    }
                    }
                    else{
                    $options=array(''=>'Select Class');
                    foreach ($class_staff as $row)
                    {
                      $options[$row->class_id]=$row->name;
                    }
                    }
                    echo form_dropdown('class_id', $options, '','class="form-control class_ac" id="get_section_class_change"');
                    ?>
                </div>
            
            <div class="col-md-3">
                
                    <label class="control-label">Section</label>
                    <?php if($this->config->item('admin_type')!='staff'){
                    ?>
                    <div class="show_sections_class_change_2">
                       <h6>Please Select Class First.</h6>
                    </div>
                    <?php
                    }
                    else{
                        $options=array(''=>'Select Section');
                    foreach ($section_staff as $row)
                    {
                      $options[$row->section_id]=$row->name;
                    }
                    }
                    echo form_dropdown('section_id', $options, '','class="form-control" id="get_batch_section_change"');
                    ?>
                    
                </div>

                <div class="col-md-2">
                
                    <label class="control-label">Exam Type</label>
                        <?php
                        $options=array(''=>'Select Exam Type');
                        foreach ($exam as $row)
                        {
                          $options[$row->exam_type_id]=$row->name;
                        }
                        echo form_dropdown('exam_type_id', $options, '','class="form-control" id="exam_type_id"');
                        ?>
                </div>
            
            <div class="col-md-1">
                <label class="control-label" style="color:#fff">Click</label><br>
                <a href="#" class="generate_report btn btn-primary">GO</a>
            </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <div id="show_report"></div>
                </div>
            </div>
        </div>

    </div>
    </div>
        <div class="panel-footer"></div>
    
    </div>
    <?php echo form_close();?>  
    </div><!-- col-md-12 -->

</div><!-- contentpanel -->

                    
                       