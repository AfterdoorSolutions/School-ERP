<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Fee Collection</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12 ">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Admission Number</label>
            		<input type="text" id="change_href_by_adm_no" class="form-control" name="adm_no">
                </div>
            </div>
        </div>
        <a href="<?php echo admin_url();?>fee/get_fee_collection/" id="print_f" class="btn btn-primary">Submit</a>
    </div><!-- col-md-12 -->

</div><!-- contentpanel -->