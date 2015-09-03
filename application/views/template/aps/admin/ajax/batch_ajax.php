<div class="row">
    <div class="col-md-12">
		<?php
        $options=array(''=>'Select Batches');
        foreach ($query as $row)
        {
          $options[$row->batch]=$row->start_date."-".$row->end_date;
        }
        echo form_dropdown('batch_id', $options,'','class="form-control" id="batch_id"');
        ?>

    </div>
</div>
