<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Pay Slip</li>
              </ul>
              <h4>Pay Slip</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'menu_form');
      echo form_open('', $attributes);
    ?>
    
    
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-body">

          <div class="form-group">
            <div class="col-md-6">
              <div class="">
                <div class="col-md-5">
                  <label class="">Name</label>
                </div>
                <div class="col-md-7">
                  <input type="hidden" name="staff_id" value="<?php echo $query->staff_id; ?>" >
                    <input type="text" readonly name="name" class="form-control" value="<?php echo $query->firstname." ".$query->lastname ; ?>" >
          
                </div>
                <?php echo form_error('name'); ?>
              </div>
            </div><!-- col-md-6 -->
            </div>
          <div class="form-group">
            <div class="col-md-6">
              <div class="">
                <div class="col-md-5">
                  <label class="">Salary Month</label>
                </div>
                <div class="col-md-7">
                   <div class="input-group">
                      <input type="text" name="month" class="form-control datepicker_my" value="<?php echo date('M Y'); ?>" >
                    <div class="input-group-addon">-/-/--</div>
                  </div>
                </div>
                <?php echo form_error('name'); ?>
              </div>
            </div><!-- col-md-6 -->
            </div>
            <div class="form-group">
            <div class="col-md-6">
              <div class="">
                <div class="col-md-5">
                  <label class="control-label">Basic Pay</label>
                </div>
                <div class="col-md-7 ">
                  <div class="input-group">
                  <input type="text" readonly data-action="add" name="basic_pay" class="form-control salary_elem_sum" value="<?php echo $query->basic_pay; ?>" >
                  <div class="input-group-addon">+</div>
                </div>
              </div>
                <?php echo form_error('short_name'); ?>
              </div>
            </div><!-- col-md-6 -->
          </div><!-- row -->
            <?php //var_dump($salary_element); ?>
            <?php  
            $i=0;
            foreach ($salary_element as $key => $value) {
             ?>
             <div class="form-group">
            <div class="col-md-6">
              <div class="">
                <?php if($value->p_f=='percentage'){ ?>
                <div class="col-md-5">
                   <label class="control-label"><?php echo  $value->name; ?></label>
                </div>
                <div class="col-md-7">
                   <div class="input-group">
                    <input type="hidden" value="<?php echo  $value->salary_element_id; ?>" name="salary_element[]" >
                    <input type="hidden" value="<?php echo  $value->name; ?>" name="salary_name[]" >
                    <input type="hidden" value="<?php echo  $value->action; ?>" name="salary_action[]" >
                    <input type="text" data-action="<?php echo $value->action; ?>" readonly name="salary_value[]" class="form-control salary_elem_sum" value="<?php echo round(($value->amount)*($query->basic_pay)/'100'); ?>" >
                    <div class="input-group-addon"><?php if($value->action=="add"){echo "+";}else{echo "-";} ?></div>
                  </div>
                </div>
                <?php }else{ ?>
                <div class="col-md-5">
                  <label class="control-label"><?php echo $value->name; ?></label>
                </div>
                <div class="col-md-7">
                  <div class="input-group">
                    <input type="hidden" value="<?php echo  $value->salary_element_id; ?>" name="salary_element[]" >
                    <input type="hidden" value="<?php echo  $value->name; ?>" name="salary_name[]" >
                    <input type="hidden" value="<?php echo  $value->action; ?>" name="salary_action[]" >
                    <input type="text" data-action="<?php echo $value->action; ?>" name="salary_value[]" class="form-control salary_elem_sum" value="<?php echo $value->amount; ?>" >
                    <div class="input-group-addon"><?php if($value->action=="add"){echo "+";}else{echo "-";} ?></div>
                </div>
                </div>
                <?php } ?>
                <?php echo form_error('short_name'); ?>
              </div>
            </div><!-- col-md-6 -->
          </div><!-- row -->

             <?php
           $i++; } ?>
          <input type="hidden" value="<?php echo  $i; ?>" name="total_elements" >
          <div class="form-group">
            <div class="col-md-6">
              <div class="col-md-5">
                  <label class="control-label">Total Salary</label>
                </div>
                <div class="col-md-7">
                  <div class="input-group">
                  <input type="text" class="form-control" id="salary_elem_sum" name="total"/>
                  <div class="input-group-addon">=</div>
                </div>
                </div>
            </div>
          </div>
        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('menu', 'Submit','class="btn btn-primary"');?></div>
        <?php echo form_close();?>  
      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
  </div><!-- row -->

</div><!-- contentpanel -->