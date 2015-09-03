<div class="row">
    <div class="col-md-12">
		<?php
        $options=array(''=>'Select Section');
        foreach ($query as $row)
        {
          $options[$row->section_id]=$row->name;
        }
        echo form_dropdown('section_id', $options, '','class="form-control" id="get_batch_section_change"');
        ?>
    </div>
</div>


<!-- $('body').on('click','.search_books',function(){
    var batch_id=$('#batch_id_2').val();
    var class_id=$('#get_section_class_change').val();
    var section_id=$('#get_batch_section_change').val();
    var exam_type_id=$('#exam_type_id').val();

    $('#result').html(loader);
    $.ajax({
        url:'',
        type:'get',

    });

}); -->


<!--
var new_fun=function func_1(){
    var request=$.ajax({});
    return request;
}

var request=false;
$('body').on('keypress','.class',function(){
    if(request && request.readyState!==4){
        request.abort();
    }

    request=new_fun();
}); -->