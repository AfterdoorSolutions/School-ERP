<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Issue Books</li>
              </ul>
              <h4>Issue Books</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php

      $attributes = array('class' => 'form-horizontal', 'id' => 'issue_book');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Issue Books</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } else { ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-6"> 
            <label>Accession No</label>
            <input type="text" name="accession_no" class="form-control" id='book' value="<?php echo $query->accession_no; ?>" readonly>
           
            </div><!-- col-md-6 -->

            <div class="col-md-6"> 
            <label>Search by Admission no./employee no.</label>
            <input type="text" name="adm_number/employee no" class="form-control" id="student"  value="<?php echo set_value('adm_number/employee no'); ?>">
           
             <?php
                
                $data = array(
                        'name'            => 'issue_to',
                        'id'         => 'issue_to',
                        'value'         => 'student',
                        'checked'       => TRUE,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." student </label>";
                
                //if(set_value('adm_number/employee no.')=='employee') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'            => 'issue_to',
                        'id'         => 'issue_to',
                        'value'         => 'employee',
                        'checked'       => false,
                        'style'         => 'margin:10px'
                );
                echo "<label>".form_radio($data)." employee </label>";
                ?>
                
            </div><!-- col-md-6 -->
  

              </div><!-- row -->

           <div class="row">
           <div class="col-md-6"> 
            <label>Book Title</label>
            <input type="text" name="title" class="form-control" id="book" value="<?php echo $query->title; ?>" readonly>
             <div class="row">
            <div class="col-md-12"> 
            <label>Name</label>
            <input type="text" id='name' name="name" class="form-control"  readonly>
    
            </div><!-- col-md-6 -->

               </div><!-- row -->

           <div class="row">
           <div class="col-md-12"> 
            <label>Admission/Employe Number</label>
            <input type="text" id='adm_number' name="adm_number" class="form-control"  readonly>
          <?php echo form_error('adm_number'); ?>
            </div><!-- col-md-6 -->
               </div><!-- row -->

            <div class="row">
            <div class="col-md-12"> 
            <label>Issue Date</label>
            <input type="text" name="issue_date" class="form-control datepicker" value="<?php echo date('d-m-Y');?>">
           
            </div><!-- col-md-6 -->
               </div><!-- row -->

            <div class="row">
            <div class="col-md-12"> 
            <label>Due Date</label>
            <input type="text" name="due_date" class="form-control datepicker"  value="<?php echo date('d-m-Y', strtotime($settings->student_time_period ."days"));?>">
         
            </div><!-- col-md-6 -->

          </div><!-- row -->
            </div><!-- col-md-6 -->

            <div class="col-md-6"> 
              <button id="get_student" class="btn btn-primary">Search</button>
             </div><!-- col-md-6 -->
              <div class="col-md-6">
             <div class="student_name">
                </div>
              </div>
               </div><!-- row -->
        </div><!-- panel-body -->
        <input type="hidden" id="issue_to_id" name="issue_to_id">
        <input type="hidden" id="issue_to_selected" name="issue_to">
        <div class="panel-footer"><?php echo form_submit('issue', ' Issue','class="btn btn-primary"');?></div>

       

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();
  } //else closed
    ?>  

  </div><!-- row -->

</div><!-- contentpanel -->