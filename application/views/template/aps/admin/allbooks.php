<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Books</li>
                </ul>
                <h4>All Books</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12">
        <?php if(isset($message)) { echo '<div class="alert alert-success" role="alert">'.$message.'</div>'; } ?>
        <table id="allbookslist" class="table table-striped table-bordered responsive">
            <thead class="">
	            <tr>
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
      			<th>Actions</th>
	            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- row -->
</div><!-- contentpanel -->

                    
                       