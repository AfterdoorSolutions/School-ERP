<div class="row">
    <div class="col-md-12">
		<?php
        $options=array(''=>'Select Subject');
        foreach ($query as $row)
        {
          $options[$row->subject_id]=$row->name;
        }
        echo form_dropdown('subject_id', $options, '','class="form-control" id="subject_id"');
        ?>
    </div>
</div>
