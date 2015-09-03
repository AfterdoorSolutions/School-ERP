<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Fee Collection</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	

<div class="contentpanel">
    <div class="col-md-12 ">
        <?php
          $attributes = array('class' => 'form-horizontal', 'id' => 'menu_form');
          echo form_open('', $attributes);
        ?>
        <div class="col-md-4">
            
            <table class="table table-bordered">
                <tr><td>Receipt No.</td><td></td><td>Adm No.</td><td><input type="hidden" value="<?php echo $student->student_admission_id; ?>" name="student_admission_id"><?php echo $student->adm_number; ?></td></tr>
                <tr><th class="text-center" colspan="4">Bank Copy</th></tr>
                <tr><th class="text-center" colspan="4">Indian Overseas Bank, GMN College</th><tr>
                <tr><th class="text-center" colspan="4">AMBALA CANTT.</th></tr>
                <tr><td colspan="4">Please Credit ARMY PUBLIC SCHOOL,AMBALA CANTT,</td></tr>
                <tr><td colspan="4">CBSE Affiliation No-580002</td></tr>
                <tr><td colspan="4">Saving A/c No- 6842010000011500</td></tr>
                <tr><td colspan="2">Pupil's Name</td><td colspan="2"><?php echo ucfirst($student->first_name)." ".ucfirst($student->middle_name)." ".ucfirst($student->last_name); ?></td></tr>
                <tr><td colspan="2">Father's Name</td><td colspan="2"><?php echo ucfirst($student->father_name); ?></td></tr>
                <tr><td colspan="2">Student Category</td><td colspan="2"><?php echo ucfirst($student->student_category_name); ?></td></tr>
                <tr><td>Class</td><td><?php echo ucfirst($student->class_name); ?></td><td>Section</td><td><?php echo ucfirst($student->section_name); ?></td></tr>
                <tr><th colspan="4">New Adm Only</th></tr>
                
                <?php 
                $i=1;
                $last_id=0;
                $total='0';
                foreach ($student->fee_type_id as $data)
                {
                    if($last_id==$data->category)
                    {
                        $last_id=$data->category;
                    }
                    else
                    {
                        $last_id=$data->category;
                        ?>
                        <input type="hidden" value="<?php echo $data->fee_type_id; ?>" name="fee_type_id[]">
                        <tr><th colspan="4"><?php if($data->category==1){ echo "Annual Charges"; } else { echo "Quaterly Charges For QE."; } ?></th></tr>
                    <?php
                    }
                ?>
                    <tr>
                        <td colspan="1"><?php echo $i; ?></td><td colspan="2"><input type="hidden" value="<?php echo $data->fee_type_name; ?>" name="fee_type_name[]"><?php echo $data->fee_type_name; ?></td><td colspan="1"><input type="hidden" value="<?php echo $data->fee_type_value; ?>" name="fee_type_value[]"><?php echo $data->fee_type_value; $total=$total+$data->fee_type_value; ?></td>
                    </tr>
                <?php
                $i++;
                }
                ?>
                <tr><th colspan="3" class="text-right">Total</th><td colspan="1"><?php echo $total; ?></td></tr>
                <tr style="height:70px;vertical-align:bottom"><th >Cheque No.</th><th>Date</th><th colspan="2">Name of bank</th></tr>
            </table>
        </div>

        <div class="col-md-4">
            <label class="control-label">Amount</label>
            <input type="text" class="form-control" value="<?php echo $total; ?>" name="amount">

            <label class="control-label">Date</label>
            <input type="text" class="form-control datepickeronly" name="date">
            <?php echo form_error('date'); ?>

            <label class="control-label">Cheque No.</label>
            <input type="text" class="form-control" name="cheque_no">

            <label class="control-label">Name of Bank</label>
            <input type="text" class="form-control" name="bank_name">

            <label class="control-label">Receipt</label>
            <input type="text" class="form-control" name="receipt">
            <?php echo form_error('receipt'); ?>
        </div>

        <div class="col-md-4">
            <label class="control-label">Select One</label><br/>
            <?php echo form_submit('cash', 'By Cash','class="btn btn-primary"');?>
            <?php echo form_submit('cheque', 'By Cheque','class="btn btn-primary"');?>  
        </div>
        
    </div><!-- col-md-12 -->
    <?php echo form_close();?>
</div><!-- contentpanel -->
