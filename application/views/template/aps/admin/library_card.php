<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Library Card</li>
              </ul>
              <h4>Library Card</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'issue_book');
     // echo form_open(admin_url()."/library/print_barcode_page/", $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Print Library Card</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-6"> 
            <label>Admission Number</label>
            <input type="text" name="adm_number" class="form-control" id="adm_number" value="<?php echo set_value('selected[]'); ?>">
            <?php echo form_error('selected[]'); ?>
            </div><!-- col-md-6 -->

           
          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><button type="" class="btn btn-primary print_library_card">Print</button></div>

        <div class="row">
          <div id="show_library_card_l">
          </div>
        </div>

      </div><!-- panel panel-default -->
      <div id="show_library_card">
          </div>
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
    
<input onclick="PrintDiv();" type="button" value="Print" class="btn btn-primary">
  </div><!-- row -->

</div><!-- contentpanel -->