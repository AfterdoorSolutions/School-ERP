<script type="text/javascript">     
  function PrintDiv() {    
     var divToPrint = document.getElementById('divToPrint');
     var popupWin = window.open('', '_blank', 'scrollbars=yes');
     popupWin.document.open();
     popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><body onload="window.print()"><style>.control-label{font-weight:normal !important;font-size:13px !important}input {  font-size:13px !important;background: rgba(0, 0, 0, 0) none repeat scroll 0 0 !important;  border: 0 none !important;  border-radius: 0 !important;  box-shadow: 0 0 0 !important;  position: relative !important;  pointer-event:none !important;} label::after { content: ":" !important;  position: absolute !important;  right: 0 !important;}</style><h4 class="text-center">Transfer Certificate</h4>' + divToPrint.innerHTML + '</html>');
     popupWin.document.close();
   }
</script>
<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Generate Tranfer Certificate</li>
              </ul>
              <h4>Generate Tranfer Certificate</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <div class="col-md-12" id="divToPrint">
        <div class="panel-body">
          <div class="col-md-12">
          <div class="col-md-12"><h5>Sno: <span class="pull-right">Admission No: <?php echo $student->adm_number; ?></span></h5></div>
            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Name of Pupil</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'name',
                        'id'    => 'name',
                        'value' => $student->first_name." ".$student->last_name,
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly'=>'readonly'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('name'); ?>
              </div>
            </div>
            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Mother Name</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'mother_name',
                        'id'    => 'mother_name',
                        'value' => $student->mother_name,
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly'=>'readonly'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Father Name</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'father_name',
                        'id'    => 'father_name',
                        'value' => $student->father_name,
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly'=>'readonly'
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            
            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Nationality</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'nationality',
                        'id'    => 'nationality',
                        'value' => $student->nationality,
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly'=>'readonly'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Whether the candidate belongs to SC/ST</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'category_belongs_to',
                        'id'    => 'category_belongs_to',
                        'value' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off'
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Date of first admission in School with class</label>
              <div class="col-xs-6">
                <?php
                $first_admission=date('d.m.Y',strtotime($student->timestamp))." (".get_data('class',$student->class_id,'class_id','name').")";
                $data = array(
                        'type'  => 'text',
                        'name'  => 'first_admission',
                        'id'    => 'first_admission',
                        'value' => $first_admission,
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                        'readonly'=>'readonly'
                );

                echo form_input($data);
                ?>
              </div>
            </div>


            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Date of Birth according to Admission Register</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'dob',
                        'id'    => 'dob',
                        'value' => date('d.m.Y',strtotime($student->dob)),
                        'class' => 'form-control',
                        'autocomplete'=>'off',
                        'readonly'=>'readonly'
                );

                echo form_input($data);
                ?>
                <?php echo form_error('dob'); ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Class in which the pupil last studied/Studing</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_current_class',
                        'id'    => 'student_current_class',
                        'value' => '',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">School Annual exam last taken with Result</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_last_exam',
                        'id'    => 'student_last_exam',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Whether failed, if so once/twice in the same class</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_failed',
                        'id'    => 'student_failed',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Subject Studied</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_last_exam',
                        'id'    => 'student_last_exam',
                        'value' => 'As per CBSE Syllabus',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Whether qualified for promotion</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_last_exam',
                        'id'    => 'student_last_exam',
                        'value' => 'YES',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Any Fee concession availed</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_last_exam',
                        'id'    => 'student_last_exam',
                        'value' => 'NO',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Total No. of Working Days</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_last_exam',
                        'id'    => 'student_last_exam',
                        'value' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Total No. of Working Days Present</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'student_last_exam',
                        'id'    => 'student_last_exam',
                        'value' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Whether NCC Cadet/Boy Scout/Girl Guide</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'ncc',
                        'id'    => 'ncc',
                        'value' => 'NO',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Games played and other Co-Curricular activities</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'games',
                        'id'    => 'games',
                        'value' => 'NO',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">General Conduct</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'g_conduct',
                        'id'    => 'g_conduct',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Date of Application for this certificate</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'g_conduct',
                        'id'    => 'g_conduct',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>

            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Date of issue of certificate</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'g_conduct',
                        'id'    => 'g_conduct',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            
            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Reason for leaving school</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'g_conduct',
                        'id'    => 'g_conduct',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            
            <div class="form-group text-left">
              <label class="col-xs-6 control-label">Health Record Card Issued</label>
              <div class="col-xs-6">
                <?php
                $data = array(
                        'type'  => 'text',
                        'name'  => 'g_conduct',
                        'id'    => 'g_conduct',
                        'placeholder' => '-',
                        'class' => 'form-control ',
                        'autocomplete'=>'off',
                );

                echo form_input($data);
                ?>
              </div>
            </div>
            

          </div><!-- col-md-10 -->
        </div><!-- panel-body -->
  </div><!-- col-md-12 -->
  <div class="col-md-12"><input onclick="PrintDiv();" class="btn btn-primary" type="button" value="Print"></div>
  </div><!-- row -->

</div><!-- contentpanel -->