        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/flot/jquery.flot.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery-ui-1.10.3.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/bootstrap.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/modernizr.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/pace.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/retina.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.cookies.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.datetimepicker.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/bootstrap-wizard.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.validate.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_THEME_PATH;?>js/jquery.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.dataTables.min.js"></script>
        <script src="<?php echo ADMIN_THEME_PATH;?>js/custom.js"></script>
        <script src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="http://cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
	
		
		 <script>
            jQuery(document).ready(function(){
              
				jQuery()
                // This will empty first option in select to enable placeholder
               // jQuery('select option:first-child').text('');
                
                 // Select2
               // jQuery(".select-basic, #select-multi").select2();
                jQuery('.select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
                //jQuery('select option:first-child').text('');
                
                jQuery("#select-templating").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
             
                
               
                // Wizard With Form Validation
                jQuery('#valWizard').bootstrapWizard({
                    onTabShow: function(tab, navigation, index) {
                        tab.prevAll().addClass('done');
                        tab.nextAll().removeClass('done');
                        tab.removeClass('done');
                        
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        
                        if($current >= $total) {
                            $('#valWizard').find('.wizard .next').addClass('hide');
                            $('#valWizard').find('.wizard .finish').removeClass('hide');
                        } else {
                            $('#valWizard').find('.wizard .next').removeClass('hide');
                            $('#valWizard').find('.wizard .finish').addClass('hide');
                        }
                    },
                    onTabClick: function(tab, navigation, index) {
                        return false;
                    },
                    onNext: function(tab, navigation, index) {
                        var $valid = jQuery('#valWizard').valid();
                        if (!$valid) {
                            $validator.focusInvalid();
                            return false;
                        }
                    }
                });
                
                // Wizard With Form Validation
                var $validator = jQuery("#valWizard").validate({
                    highlight: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success: function(element) {
                        jQuery(element).closest('.form-group').removeClass('has-error');
                    }
                });
                
                
               
				
                jQuery('.basicTable').DataTable({
                    responsive: true
                });
                
                var shTable = jQuery('#shTable').DataTable({
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                    },
                    responsive: true
                });
                
                // Show/Hide Columns Dropdown
                jQuery('#shCol').click(function(event){
                    event.stopPropagation();
                });
                
                jQuery('#shCol input').on('click', function() {

                    // Get the column API object
                    var column = shTable.column($(this).val());
 
                    // Toggle the visibility
                    if ($(this).is(':checked'))
                        column.visible(true);
                    else
                        column.visible(false);
                });
                
                var exRowTable = jQuery('#exRowTable').DataTable({
                    responsive: true,
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                    },
                    "ajax": "ajax/objects.txt",
                    "columns": [
                        {
                            "class":          'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { "data": "name" },
                        { "data": "position" },
                        { "data": "office" },
                        { "data": "salary" }
                    ],
                    "order": [[1, 'asc']] 
                });
                
                // Add event listener for opening and closing details
                jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = exRowTable.row( tr );
             
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                });
               
                
                // DataTables Length to Select2
                jQuery('div.dataTables_length select').removeClass('form-control input-sm');
                jQuery('div.dataTables_length select').css({width: '60px'});
                jQuery('div.dataTables_length select').select2({
                    minimumResultsForSearch: -1
                });

                // Select2
                jQuery(".select-basic, .select-multi,#select-basic,#select-multi").select2();
    
            });
            
            function format (d) {
                // `d` is the original data object for the row
                return '<table class="table table-bordered nomargin">'+
                    '<tr>'+
                        '<td>Full name:</td>'+
                        '<td>'+d.name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extension number:</td>'+
                        '<td>'+d.extn+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extra info:</td>'+
                        '<td>And any further details here (images etc)...</td>'+
                    '</tr>'+
                '</table>';
            }
        </script>
		
 <script>
 jQuery('.mydatepicker').datepicker();

</script>
<script type="text/javascript">
tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "mytexteditor"
});
</script>

<!-- Attribute list custom js -->
 <script type="text/javascript">
    jQuery(document).ready(function($){
changebatchlist
      $('body').on('click','.changebatchlist',function(e){
        var val=$(this).val();
        $('.attribute-list-table').html('<center><img class="align-center" src="<?php echo THEME_PATH; ?>/images/loaders/ajax-loader.gif" alt="Loading..."></center>');
      $.ajax({
        url:"<?php echo INSTALL_PATH.ADMIN_PATH; ?>",
        method:'get',
        data: {value:val,param:'ajax/courses/showbatchlist.php',module:'ajax',file:'1'},
        success: function(response){
                $('.showbatchlist').html(response);
        }
      });
      });
////////////////////////////Check_data///////////////////////////////
var check_data=function(val,condition){
var request=$.ajax({
        url:'',
        dataTpe:'',
        type:'',
        data:{condition:condition,val:val},
        success:function(response){
            
        }
    });
return request;
}
var request = false;
$('.check_data').keypress(function(){
    var data=$(this).val();
    var condition=$(this).data('id');
    if(request && request.readyState !== 4){
        request.abort();
    }
    request=check_data(data,condition); 
});
////////////////////////////Check_data_finish//////////////////////////	  
	  
	  
	  
    });
</script>
<?php if($varient=='Products'){ ?>
<script src="<?php echo ADMIN_THEME_PATH;?>js/vendor/jquery.ui.widget.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/tmpl.min.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/load-image.all.min.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/canvas-to-blob.min.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.blueimp-gallery.min.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.iframe-transport.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload-process.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload-image.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload-audio.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload-video.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload-validate.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/jquery.fileupload-ui.js"></script>
		<script src="<?php echo ADMIN_THEME_PATH;?>js/main.js"></script> 
<?php } ?>
		<?php if($varient=='Orders'){ ?>
		<script type="text/javascript" src="js/ajax-search-suggest.js"></script>
		<?php } ?>
    </body>
</html>
