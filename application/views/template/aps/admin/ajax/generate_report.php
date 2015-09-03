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
    <div class="col-sm-6">
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
            foreach ($class as $key => $value) {
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
   <div class="col-sm-6">
        <table id="basicTable" class="table table-striped table-bordered responsive datatable">
      
            <tr>
                <th colspan="4" class="text-center">Subject wise toppers</th>
            </tr>
            <tr>
                <th>S.No.</th>
                <th>Subject</th>
                <th>Student</th>
                <th>Marks</th>
            </tr>
         <?php 
         $i=1;
            foreach ($subject as $key => $value) {
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value->subject_name;?></td>
                <td><?php echo $value->name;?></td>
                <td><?php echo $value->marks;?></td>
            </tr>
            <?php
            $i++;
            }
         ?>  
        </table>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <table id="basicTable" class="table table-striped table-bordered responsive datatable">
      
            <tr>
                <th colspan="2" class="text-center">OVERALL ANALYSIS</th>
            </tr>
            <tr>
                <th>Grade</th>
                <th>Student</th>
            </tr>
         
            <tr>
                <td>90% and Above</td>
                <td><?php echo $all['first'];?></td>
            </tr>

            <tr>
                <td>80% - 80.99%</td>
                <td><?php echo $all['second'];?></td>
            </tr>
            <tr>
                <td>70% - 79.99%</td>
                <td><?php echo $all['third'];?></td>
            </tr>
            <tr>
                <td>60% - 69.99%</td>
                <td><?php echo $all['fourth'];?></td>
            </tr>
            <tr>
                <td>50% - 59.99%</td>
                <td><?php echo $all['fifth'];?></td>
            </tr>
            <tr>
                <td>40% - 49.99%</td>
                <td><?php echo $all['sixth'];?></td>
            </tr>
            <tr>
                <td>33% - 39.99%</td>
                <td><?php echo $all['seventh'];?></td>
            </tr>
            <tr>
                <td>Below 33%</td>
                <td><?php echo $all['eight'];?></td>
            </tr>
            
            
        </table>
    </div>
    <div class="col-sm-6">
        <table id="basicTable" class="table table-striped table-bordered responsive datatable">
      
            <tr>
                <th colspan="<?php $count=1;
                    foreach ($sub_array as $key => $value) {
                        $count++;
                    } echo $count;
                ?>" class="text-center">SUBJECTWISE ANALYSIS</th>

            </tr>
            <!-- <tr><td colspan="5"><pre><?php //var_dump($sub_array) ?></pre></td></tr> -->
            <tr>
                <th>Grade</th>
                <?php 
                    foreach ($sub_name as $key => $value) {
                        echo '<th>'.$value.'</th>';
                    }
                ?>
            </tr>
         
            <tr>
                <td>90% and Above</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['first'].'</td>';
                    }
                ?>
            </tr>

            <tr>
                <td>80% - 80.99%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['second'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>70% - 79.99%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['third'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>60% - 69.99%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['fourth'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>50% - 59.99%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['fifth'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>40% - 49.99%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['sixth'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>33% - 39.99%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['seventh'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>Below 33%</td>
                <?php 
                    foreach ($new_total_sub as $key => $value) {
                        echo '<td>'.$value['eight'].'</td>';
                    }
                ?>
            </tr>
            
            
        </table>
    </div>    
</div>
</div>
<input onclick="PrintDiv();" type="button" value="Print" class="btn btn-primary">

