<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Print Fee Slip</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12 ">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Class</label>
            		<?php
                    $options=array(''=>'Select Class');
                    foreach ($classes as $row)
                    {
                      $options[$row->class_id]=$row->name;
                    }
                    echo form_dropdown('class_id', $options, '','class="form-control" id="get_section_class_change"');
                    ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Section</label>
                    <div class="show_sections_class_change">
            	       <h6>Please Select Class First.</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Batch</label>
                    <div class="show_batch_section_change">
                        <h6>Please Select Section First.</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Student Name</label>
                    <div class="show_get_student">
                        <h6>Please Select Class, Batch First.</h6>
                    </div>
                </div>
            </div>
        </div><!-- row -->

        <a href="<?php echo admin_url();?>fee/print_slip/" id="print" class="btn btn-primary">Print Slip</a>
    </div><!-- col-md-12 -->

</div><!-- contentpanel -->

                    
                       