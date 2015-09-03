<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Add FA</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12 ">
        <div class="panel panel-default">
                <div class="panel-heading no-collapse"><h4 class="panel-title">Add new FA</h4></div>
            <div class="panel-body">
    <div class="col-md-12 ">
        <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'class_form');
      echo form_open('', $attributes);
    ?>
        <div class="row">
            <div class="form-group">
            <div class="col-md-6">
                
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
            
            <div class="col-md-6">
                
                    <label class="control-label">Section</label>
                    <div class="show_sections_class_change">
            	       <h6>Please Select Class First.</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            <div class="col-md-4">
                
                    <label class="control-label">Batch</label>
                    <div class="show_batch_section_change get_sub">
                        <h6>Please Select Section First.</h6>
                    </div>
                </div>
            
            <div class="col-md-4">
                
                    <label class="control-label">Subject</label>
                    <div class="show_subject_section_change">
                        <h6>Please Select Batch First.</h6>
                    </div>
                </div>
                <div class="col-md-4">
                
                <label class="control-label">Exam Type</label>
                <?php
                $options=array(''=>'Select Exam Type');
                foreach ($exam as $row)
                {
                  $options[$row->exam_type_id]=$row->name;
                }
                echo form_dropdown('exam_type_id', $options, '','class="form-control"');
                ?>
            </div>
            </div>
        </div>
        <div class="row">
            <input type="hidden" name="count" value="1" />
            <div class="control-group" id="fields">
                <label class="control-label" for="field1">Add Rows for subject marks distribution</label>
                <div class="controls" id="profs"> 
                    
                        <div id="field">
                            <div class="input" id="field1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="sub_name[]" value="" class="form-control" placeholder="Subject Division">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" name="sub_marks[]" value="" class="form-control" placeholder="Maximum Marks">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" name="sub_dist[]" value="" class="form-control" placeholder="Distribution Percentage">
                                    </div>
                                </div>
                            </div>
                            <button id="b1" class="btn add-more" type="button">+</button>
                        </div>
                    
                </div>
            </div>
        </div>


    </div>
    </div>
        <div class="panel-footer"><?php echo form_submit('class', 'Submit','class="btn btn-primary"');?></div>
    
    </div>
    <?php echo form_close();?>  
    </div><!-- col-md-12 -->

</div><!-- contentpanel -->

                    
                       