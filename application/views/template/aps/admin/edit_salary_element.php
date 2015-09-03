<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Add Salary Element</li>
              </ul>
              <h4>Add Salary Element</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <div class="col-md-12">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'fee_form');
      echo form_open_multipart('', $attributes);
      //var_dump($error);
    ?>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">
          <h5>Fields marked with <em>*</em> must be filled.</h5>
               
          <div class="col-md-7">
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Name <em>*</em></label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'name',
                        'id'    => 'name',
                        'value' => $query['name'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('name'); ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-md-3 control-label">Type <em>*</em></label>
              <div class="col-md-9">
                <?php
                if(set_value('type')=='percentage' || $query['type']=='percentage') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'type',
                        'id'            => 'type_percentage',
                        'value'         => 'percentage',
                        'checked'       => $checked,
                        'class'         =>'select_type',
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Percentage </label>";
                
                if(set_value('type')=='fixed' || $query['type']=='fixed') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'type',
                        'id'            => 'type_fixed',
                        'value'         => 'fixed',
                        'checked'       => $checked,
                        'class'=>'select_type',
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." Fixed </label>";
                ?>
                <?php echo form_error('type'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Amount</label>
              <div class="col-md-9">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'amount',
                        'id'    => 'amount',
                        'value' => $query['amount'],
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left pp_of">
              <label class="col-md-3 control-label">Percentage of</label>
              <div class="col-md-9">
                <?php
                $options=array(""=>'Select Element');
                foreach ($query as $row)
                {
                  $options[$row->salary_element_id]=$row->name;
                }
                echo form_dropdown('salary_element_id', $options, set_value('salary_element_id'),'id="salary_element_id" class="form-control"');
                ?>
                <?php echo form_error('salary_element_id'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-3 control-label">Action <em>*</em></label>
              <div class="col-md-9">
                <?php
                $options=array("add"=>'Add in Salary',"sub"=>'Deduct from Salary');
                echo form_dropdown('action', $options, set_value('action'),'class="form-control"');
                ?>
                <?php echo form_error('action'); ?>
              </div>
            </div>

            
          </div><!-- col-md-6 -->


        </div><!-- panel-body -->

        <?php echo form_submit('salary_elemnet', 'Update','class="btn btn-primary"');?>

    <?php echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->

</div><!-- contentpanel -->