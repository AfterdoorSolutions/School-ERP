<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Barcode</li>
                </ul>
                <h4>Barcode</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12">
        <form action="<?php echo admin_url();?>/library/print_barcode_page/" method="post">
        <input type="submit" name="print_barcode" value="Print" class='btn btn-primary'>

        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>
        <table id="allbookslistreverted" class="table table-striped table-bordered responsive">
            <thead class="">
	            <tr>
                <th>Select</th>
                <th>S.No.</th>
      			<th>Accession No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Subject</th>
                <th>Publication Year</th>
                <th>Publisher</th>
                <th>Edition</th>
                <th>No. Of Pages</th>
                <th>Location</th>
      			<th>Status</th>
	            </tr>
            </thead>
            <tbody></tbody>
        </table>
         </form>
    </div><!-- row -->
</div><!-- contentpanel -->

                    
                       