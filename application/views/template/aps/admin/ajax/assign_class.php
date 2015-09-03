<div class="row">
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
                    foreach ($classes as $row)
                    {
                      $options[$row->class_id]=$row->name;
                    }
                    echo form_dropdown('class_id', $options, '','class="form-control class_ac" id="get_section_class_change"');
                    ?>
                </div>
            
            <div class="col-md-3">
                
                    <label class="control-label">Section</label>
                    <div class="show_sections_class_change_2">
            	       <h6>Please Select Class First.</h6>
                    </div>
            </div>
            <div class="col-md-3">
                <label class="control-label" style="color:transparent">Assign</label><br>
            	<a href="#" data-id="<?php echo $id; ?>" class="btn btn-primary assign_class_id">Assign</a>
            </div>
</div>