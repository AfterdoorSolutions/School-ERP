<script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('show_library_card');
           var popupWin = window.open('', '_blank', 'width=650');
           popupWin.document.open();
           popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><body onload="window.print()" style="font-size:13px"><style>tr, td, th {  font-size: 12px;padding: 4px !important;}</style>' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
<div class="col-sm-6">
	<table class="table">
		<tr >
			<td colspan="3">
				<div class="school_title text-center">
		            <img src="http://localhost:8/aps_s/assets/images/logo.png" style="width:40px">
		            <span style="color:#000;font-size:15px">ARMY PUBLIC SCHOOL</span>
		            <img src="http://localhost:8/aps_s/assets/images/logo.png" style="width:40px">
		    	</div>
	    	</td>
		</tr>
		<tr>
			<td>Name:</td>
			<td><?php echo $query->name; ?></td>

			<td rowspan="3"><?php 
				if($query->photo==NULL)
				{
				
					$photo='uploads/student/default.jpg';
				} 
				else 
				{
					$photo=$query->photo;
				}
				?>
				<img src="<?php echo base_url(); ?><?php echo $photo; ?>" width="100px">
			</td>
		</tr>
		<tr>
			<td>Father's Name:</td>
			<td><?php echo $query->father_name; ?></td>
		</tr>
		<tr>
			<td>Class:</td>
			<td ><?php echo $class_name['name']." ".$section_name->name; ?></td>
		</tr>
		<tr>
			<td>Admission No:</td>
			<td colspan="2"><img src="<?php echo admin_url();?>library/print_barcode/<?php echo $query->adm_number; ?>"</td>
		</tr>
		<tr>
			<td colspan="2">Student Signature</td><td class='text-right'>Librarian Signature</td>
		</tr>
	</table>
<?php //var_dump($query); ?>
</div>