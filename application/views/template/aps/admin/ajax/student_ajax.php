<div class="row">
    <div class="col-md-12">
		<?php
        //var_dump($sql);
        $options=array(''=>'Select Student');
        foreach ($sql as $row)
        {
          $options[$row->student_admission_id]=$row->first_name." ".$row->middle_name." ".$row->last_name." (".$row->adm_number.")";
        }
        echo form_dropdown('student_name', $options, '','class="form-control" id="change_href_by_id"');
        ?>
    </div>
</div>
