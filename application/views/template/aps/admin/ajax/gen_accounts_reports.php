<script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=650');
           popupWin.document.open();
           popupWin.document.write('<html><link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" /><body onload="window.print()" style="font-size:13px"><style>tr, td, th {  font-size: 12px;padding: 4px !important;}</style><h2 class="text-center">Report</h2>' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
<div  id="divToPrint">
<div class="row">
    <div class="col-sm-12">
            <table id="basicTable" class="table table-striped table-bordered responsive datatable">
          
                <tr>
                    <th colspan="3" class="text-center">Class Toppers</th>
                </tr>
                <tr>
                    <th>S.No.</th>
                    <th>Student</th>
                    <th>Marks</th>
                </tr>
             <?php 
             $i=1;
                foreach ($query as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value->name;?></td>
                    <td><?php echo $value->mm;?></td>
                </tr>
                <?php
                $i++;
                }
             ?>  
            </table>
        </div>
   
    </div>

</div>
<input onclick="PrintDiv();" type="button" value="Print" class="btn btn-primary">

