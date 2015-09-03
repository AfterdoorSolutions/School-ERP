<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Newspaper Detail</li>
              </ul>
              <h4>Newspaper Detail</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'fee_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Newspaper Detail</h4></div>
        

        <div class="panel-body">
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>
          <div class="row">

            <div class="col-md-6">
                <label class="control-label">Newspaper Title</label>
                <?php
                    $query =$this->db->query("SELECT newspaper_id,name FROM newspaper"); 
                foreach ($query->result() as $row)
                {
                  $options[$row->newspaper_id]=$row->name;
                }
                $newspaper_id=$result['newspaper_id'];
                echo form_dropdown('newspaper_id', $options, $newspaper_id,'class="form-control" id="newspaper_id"');
                  ?>
                 
            </div><!-- col-md-6 -->
              <div class="col-md-6"> 
                <label class="control-label">Volume</label>
                <input type="text" name="volume" class="form-control" value="<?php echo $result['volume']; ?>" placeholder="Enter Volume">
                <?php echo form_error('volume'); ?>
              
            </div><!-- col-md-6 -->
          </div><!-- row -->
          <div class="row">           
               <div class="col-md-6"> 
                <label class="control-label">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $result['price']; ?>" placeholder="Enter Price">
                <?php echo form_error('price'); ?>
              `
            </div><!-- col-md-6 -->
            <div class="col-md-6"> 
                
                <label class="control-label">Date</label>
                <input type="text" name="date" class="form-control datepicker" value="<?php echo $result['date']; ?>" placeholder="Enter Date">
                <?php echo form_error('date'); ?>
             
            </div><!-- col-md-6-->

          </div><!-- row -->
        </div><!-- panel-body -->

        <div class="panel-footer"><?php echo form_submit('newspaper', 'Update','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->