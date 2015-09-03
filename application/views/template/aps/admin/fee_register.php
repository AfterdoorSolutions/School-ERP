<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Fee Registration</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12 ">
<?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'student_admission_id');
      echo form_open('', $attributes);
?>
            <div class="row">
            <div class="col-md-6">
              
                <div class="col-md-5">
                  <label class="">Admission Number</label>
                </div>
                <div class="col-md-7">
                  <input type="text" name="adm_number" value="<?php echo set_value('adm_number');?>" class="form-control" >
                </div>
            </div><!-- col-md-6 -->

            <div class="col-md-3">
                <div class="col-md-5">
                </div>
                <div class="col-md-7">
                  <input type="submit" name="submit_search" class="btn btn-primary" id="registration" value="Go">
                </div>
              </div>
            </div>
             <?php echo form_close();?>  


</div><!-- col-md-12 -->

</div><!-- contentpanel -->

                    
                       