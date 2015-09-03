<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Fee Setup</li>
              </ul>
              <h4>Fee Setup</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <div class="col-md-12">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'fee_scheme_form');
      echo form_open_multipart('', $attributes);
      //var_dump($error);
    ?>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">
          
          <div class="col-md-7">
            <div class="form-group text-left">
              <label class="col-md-4 control-label">Class</label>
              <div class="col-md-8">
                <?php
                  $options= array(''=>"Select Class");
                  foreach ($query as $row)
                  {
                    $options[$row->class_id]=$row->name;
                  }
                  echo form_dropdown('class_id', $options, set_value('class_id'),'class="form-control" id="get_section_class_change"s');
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-4 control-label">Section</label>
              <div class="col-md-8 show_sections_class_change">
                <h6>Please Select Class First.</h6>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-4 control-label">Batch</label>
              <div class="col-md-8 show_batch_section_change">
                <h6>Please Select Section First.</h6>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-4 control-label">Student Category</label>
              <div class="col-md-8">
                <?php
                  $options=array(''=>"Select Student Category");
                  foreach ($query3 as $key)
                  {
                    $options[$key->student_category_id]=$key->name;
                  }
                  echo form_dropdown('student_category_id', $options, set_value('student_category_id'),'class="form-control"');
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-md-4 control-label">Fee Type</label>
              <div class="col-md-8">
                <h4>NEW ADM. ONLY</h4>
                <?php
                  //var_dump($query4);
                  $list=array();
                  $i=0;
                  foreach ($query4 as $key)
                  {
                    $list[]='<div class="row"><div class="form-group"><div class="col-md-5"><label class="control-label"><input type="hidden" value="'.$key['fee_type_id'].'" name="newadd_id_'.$i.'">'.$key["type"].'</label></div>'.'<div class="col-md-7">'."<input type='text' class='form-control' name='newadd_".$i."'>".'</div></div></div>';
                    $i++;
                  }
                  $attributes= array(
                    'class' => 'boldlist'
                    );
                  echo  ul($list,$attributes);
                ?>
                <input type="hidden" value="<?php echo $i;?>" name="newadd_num">

                <h4>Annual Charges</h4>
                <?php
                  $list1=array();
                  $j=0;
                  foreach ($query5 as $key)
                  {
                    $list1[]='<div class="row"><div class="form-group"><div class="col-md-5"><label class="control-label"><input type="hidden" value="'.$key['fee_type_id'].'" name="annual_id_'.$j.'">'.$key["type"].'</label></div>'.'<div class="col-md-7">'."<input type='text' class='form-control' name='annual_".$j."'>".'</div></div></div>';
                    $j++;
                  }
                  $attributes= array(
                    'class' => 'boldlist'
                    );
                  echo  ul($list1,$attributes);
                ?>
                <input type="hidden" value="<?php echo $j;?>" name="annual_num">

                <h4>Quartely Charges</h4>
                <?php
                  $list2=array();
                  $k=0;
                  foreach ($query6 as $key)
                  {
                    $list2[]='<div class="row"><div class="form-group"><div class="col-md-5"><label class="control-label"><input type="hidden" value="'.$key['fee_type_id'].'" name="quartely_id_'.$k.'">'.$key["type"].'</label></div>'.'<div class="col-md-7">'."<input type='text' class='form-control' name='quartely_".$k."'>".'</div></div></div>';
                    $k++;
                  }
                  $attributes= array(
                    'class' => 'boldlist'
                    );
                  echo ul($list2,$attributes);
                ?>
                <input type="hidden" value="<?php echo $k;?>" name="quartely_num">
              </div>
            </div>
          </div><!-- col-md-7 -->
        </div><!-- panel-body -->

        <?php echo form_submit('fee_scheme', 'Submit','class="btn btn-primary"');?>

    <?php echo form_close();?>  
  </div><!-- col-md-12 -->
  </div><!-- row -->

</div><!-- contentpanel -->