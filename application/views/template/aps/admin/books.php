<div class="mainpanel">
  <div class="pageheader">
      <div class="media">
          <div class="pageicon pull-left">
              <i class="fa fa-home"></i>
          </div>
          <div class="media-body">
              <ul class="breadcrumb">
                  <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Add Books</li>
              </ul>
              <h4>Add Books</h4>
          </div>
      </div><!-- media -->
  </div><!-- pageheader -->
  
<div class="contentpanel">
  <div class="row row-stat">
    <?php
      //var_dump($query);
      $attributes = array('class' => 'form-horizontal', 'id' => 'books_form');
      echo form_open('', $attributes);
    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading no-collapse"><h4 class="panel-title">Add Books</h4></div>
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>

        <div class="panel-body">

          <div class="row">

              <div class="col-md-2"> 
                  
                  <label class="">Accession No.</label>
                  <input type="text" class="form-control" name="accession_no" value="<?php echo ($gifted_no->accession_no)+'1'; ?>" readonly>
                  
               
              </div><!-- col-md-2-->

              <div class="col-md-2"> 
                  
                  <label class="" >Acs. No. For Gifted</label>
                  <input type="text" class="form-control" name="accession_no_gifted" value="<?php echo ($gifted_yes->accession_no)+'1'."/G"; ?>" readonly>
                  
               
              </div><!-- col-md-2-->

              <div class="col-md-4"> 
                <label class="">Title <em>*<em></label>
                <div class="suggestion">
                  <input type="text" name="title" class="form-control title_suggest" value="<?php echo set_value('title'); ?>" id="show_title_suggestion" data-what="title" data-table="book">
                  <div class="suggestion_result">
                  </div>
                </div>
                <?php echo form_error('title'); ?>
              </div><!-- col-md-4-->

               <div class="col-md-4"> 
                
                <label class="">Author</label>
                <input type="text" name="author" class="form-control title_suggest" value="<?php echo set_value('author'); ?>" data-what="author" data-table="book">
                <?php echo form_error('author'); ?>
              
            </div><!-- col-md-4 -->
           
           
              </div><!-- row -->

               <div class="row">

                <div class="col-md-4"> 
               
                  <label class="">Language</label>
                  <input type="text" name="language" class="form-control title_suggest" value="<?php echo set_value('language'); ?>" data-table="book" data-what="language">
                  <?php echo form_error('language'); ?>
              
                </div><!-- col-md-4 -->

                <div class="col-md-4"> 
                    
                    <label class="">Subject</label>
                    <input type="text" name="subject" class="form-control title_suggest" value="<?php echo set_value('subject'); ?>" data-table="book" data-what="subject">
                    <?php echo form_error('subject'); ?>
                  
                </div><!-- col-md-4 -->

                <div class="col-md-4"> 
                   
                    <label class="">Publication Year</label>
                    <input type="text" name="pub_yr" class="form-control" value="<?php echo set_value('pub_yr'); ?>" >
                    <?php echo form_error('pub_yr'); ?>
                 
                </div><!-- col-md-4 -->
          </div><!-- row -->

          <div class="row">

            <div class="col-md-4"> 
               
                <label class="">Publisher</label>
                <input type="text" name="publisher" class="form-control title_suggest" value="<?php echo set_value('publisher'); ?>" data-table="book" data-what="publisher">
                <?php echo form_error('publisher'); ?>
              
            </div><!-- col-md-4-->

            <div class="col-md-4"> 
         
              <label class="">Edition</label>
              <input type="text" name="edition" class="form-control title_suggest" value="<?php echo set_value('edition'); ?>" data-table="book" data-what="edition">
              <?php echo form_error('edition'); ?>
           
            </div><!-- col-md-4 -->
          
            <div class="col-md-4"> 
           
              <label class="">No of Pages</label>
              <input type="text" name="pages" class="form-control" value="<?php echo set_value('pages'); ?>" >
              <?php echo form_error('pages'); ?>
           
            </div><!-- col-md-4 -->
          
          </div><!-- row -->

          <div class="row">

            <div class="col-md-1"> 
         
              <label class="">MRP</label>
              <input type="text" name="mrp" class="form-control" value="0" id="mrp">
              <?php echo form_error('mrp'); ?>
              
            </div><!-- col-md-2 -->

            <div class="col-md-2"> 
         
              <label class="">Discount (in %)</label>
              <input type="text" name="discount" class="form-control" value="0" id="discount">
              
            </div><!-- col-md-2 -->

            <div class="col-md-1"> 
         
              <label class="">Amount</label>
              <input type="text" name="amount" class="form-control" id="amount" readonly>
              
            </div><!-- col-md-2 -->

            <div class="col-md-4"> 
            
              <label class="">Invoice No</label>
              <input type="text" name="invoice_no" class="form-control" value="<?php echo set_value('invoice_no'); ?>" >
              <?php echo form_error('invoice_no'); ?>
           
            </div><!-- col-md-4 -->
          
            <div class="col-md-4"> 
            
              <label class="">Vendor</label>
              <input type="text" name="vendor" class="form-control title_suggest" value="<?php echo set_value('vendor'); ?>" data-table="book" data-what="vendor">
              <?php echo form_error('vendor'); ?>
           
            </div><!-- col-md-4 -->

         
           </div><!-- row -->

           <div class="row">

            <div class="col-md-4"> 
          
              <label class="">Location</label>
              <input type="text" name="location" class="form-control title_suggest" value="<?php echo set_value('location'); ?>" data-table="book" data-what="location">
              <?php echo form_error('location'); ?>
             
            </div><!-- col-md-4 -->


             <div class="col-md-4"> 
            
              <label class="">Purchase Date</label>
              <input type="text" name="purchase_date" class="form-control datepicker" value="<?php echo set_value('purchase_date'); ?>" >
              <?php echo form_error('purchase_date'); ?>
            
              </div><!-- col-md-4 -->

            <div class="col-md-4"> 
          
              <label class="">Quantity</label>
              <input type="text" name="quantity" class="form-control" value="<?php echo set_value('quantity'); ?>" >
              <?php echo form_error('quantity'); ?>
          
            </div><!-- col-md-4 -->

          </div><!-- row -->

        <div class="row">
          <div class="col-md-4"> 
            <label>Gifted <em>*<em></label>
            <div class="form-group">
           
             <?php
                if(set_value('gifted')=='Yes') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gifted',
                        'id'            => 'gifted',
                        'value'         => 'yes',
                        'checked'       => $checked,
                        'style'         => 'margin:10px',
                        'required'      => 'required'
                );
                echo "<label>".form_radio($data)." Yes </label>";
                
                if(set_value('gifted')=='No') { $checked=TRUE;  } else { $checked=false; }
                $data = array(
                        'name'          => 'gifted',
                        'id'            => 'gifted',
                        'value'         => 'no',
                        'checked'       => $checked,
                        'style'         => 'margin:10px',
                        'required'      => 'required'
                );
                echo "<label>".form_radio($data)." No </label>";
                ?>
                <?php echo form_error('gifted'); ?>
              </div>
          </div><!-- col-md-4 -->

          <div class="col-md-4"> 
            <label>Reference Book</label>
            <div class="form-group">
           
             <?php
                $data = array(
                        'name'          => 'reference',
                        'id'            => 'reference',
                        'value'         => 'yes',
                        'checked'       => false,
                        'style'         => 'margin:10px',
                        'required'      => 'required'
                );
                echo "<label>".form_radio($data)." Yes </label>";
                $data = array(
                        'name'          => 'reference',
                        'id'            => 'reference',
                        'value'         => 'no',
                        'checked'       => TRUE,
                        'style'         => 'margin:10px',
                        'required'      => 'required'
                );
                echo "<label>".form_radio($data)." No </label>";
                ?>
              </div>
          </div><!-- col-md-4 -->
  
          </div><!-- row -->

        </div><!-- panel-body -->

         <div class="panel-footer"><?php echo form_submit('book', 'Submit','class="btn btn-primary"');?></div>

      </div><!-- panel panel-default -->
    </div><!-- col-md-12 -->
    <?php echo form_close();?>  
  </div><!-- row -->

</div><!-- contentpanel -->