<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Add Expense</li>
              </ul>
              <h4>Add Expense</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'add_expense');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Add Expense</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-6">
                <label class="control-label">Fee Account</label>
                  <?php
                    $query =$this->db->query("SELECT account_type_id,name FROM account_type"); 
                    $options= array(''=>"Select Any");
                    foreach ($query->result() as $row)
                    {
                      $options[$row->account_type_id]=$row->name;
                    }
                    
                    echo form_dropdown('account_type', $options, set_value('account_type'),'class="form-control"');
                    ?>
                <?php echo form_error('account_type'); ?>
            </div><!-- col-md-6 -->

            <div class="col-md-6">
                <label class="control-label">Voucher Number</label>
                <input type="text" name="voucher" class="form-control" value="<?php echo set_value('voucher'); ?>" >
                <?php echo form_error('voucher'); ?>
            </div><!-- col-md-6 -->
          </div><!-- row -->
          <div class="row">

            <div class="col-md-6">
                <label class="control-label">Amount</label>
                <input type="text" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>" >
                <?php echo form_error('amount'); ?>
            </div><!-- col-md-6 -->

            <div class="col-md-6">
                <label class="control-label">Date</label>
                <input type="text" name="date" class="form-control datepicker" value="<?php echo set_value('date'); ?>" >
                <?php echo form_error('date'); ?>
            </div><!-- col-md-6 -->
          </div><!-- row -->
          <div class="row">

            <div class="col-md-12">
                <label class="control-label">Remarks</label>
                <textarea name="remarks" class="form-control"><?php echo set_value('type'); ?></textarea>
                <?php echo form_error('type'); ?>
            </div><!-- col-md-6 -->

            
          </div><!-- row -->

        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('add_expense', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->