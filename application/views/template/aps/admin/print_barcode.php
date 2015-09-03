<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Print Barcode</li>
              </ul>
              <h4>Print Barcode</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'issue_book');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Print Barcode</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

            <div class="col-md-6"> 
            <label>Accession No/ Student Admission Number</label>
            <input type="text" name="book_id" class="form-control" id="book" value="<?php echo set_value('book_id'); ?>">
            <?php echo form_error('book_id'); ?>
            </div><!-- col-md-6 -->
          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><button id="print_barcode" class="btn btn-primary">Print</button></div>

        <div class="row">
          <div class="show_book">
          </div>
        </div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->