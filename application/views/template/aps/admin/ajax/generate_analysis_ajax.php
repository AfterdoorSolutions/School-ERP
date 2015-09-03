<div style="overflow:scroll;max-height:500px;"> 
<!-- <pre><?php //var_dump($subject_distribution) ?></pre>
 -->
<div class="front_page" id="divToPrint">
    <table class="table table-bordred">
     
    <tr>

        <td class="text-center" style="width:40px;vertical-align:middle;" rowspan="2">Sno</td>
        <td class="text-center" style="vertical-align:middle;" rowspan="2">Admission No</td>
        <td class="text-center" style="vertical-align:middle;" rowspan="2">Student</td>
        <?php
        $i=0;
        foreach ($subject_distribution as $key => $value) {  
            ?>
            <td class="text-center" colspan="<?php echo count($value)+3;?>"><?php echo $subject[$i]->subject_name;?></td>
            <?php
            $i++;
                }
            ?>
        <td colspan="3" style="vertical-align:middle;">Total Marks</td>    
    </tr>
     <tr>
       
        <?php
        $total_total='';
        foreach ($subject_distribution as $key => $value) {  
            $total='';
                foreach ($value as $key2 => $value2) {  
                    $total=$total+$value2->sub_marks;
                    ?>


                        <td class="text-center"><?php echo $value2->sub_name." (".$value2->sub_marks.")";?></td>
        <?php
                }
                ?>
                <td>Total (<?php echo $total; ?>)</td>
                <td>Out of 10</td>
                <td>Grade</td>
                <?php
                $total_total=$total_total+$total;
        }
        ?>
                <td>Total Marks</td>
                <td>Out of</td>
                <td>Grade</td>
        
    </tr>
    <tbody>
        <?php $i=1; 
        foreach ($student as $key => $value) {  ?>
        
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value->adm_number ;?></td>
            <td><?php echo $value->name ;?></td>
            <?php 
            $total_marks='';
            foreach ($value->new_marks as $key2 => $value2)
            {
              /*  foreach ($value2 as $key3 => $value3)
                {*/
                    //echo "<pre>";var_dump($value2);echo "</pre>";
                    $total='';
                    $dis='';
                    foreach ($value2->marks as $key4 => $value4)
                    {
                         $total=$total+$value4;
                         $dis=$dis+(($value4*$value2->sub_dist[$key4])/$value2->sub_marks[$key4]);
             ?>
                    <td class="text-center"><?php echo $value4;?></td>
             <?php   
                    }
                 ?>
                <td><?php echo $total; ?></td>
                <td style="color:red"><?php echo $dis/10; ?></td>
                <td class="text-center" style="color:#00f"><?php echo get_grade('10',$dis/10); ?></td>
                <?php
                $total_marks=$total_marks+$total;
            }
            ?>
                <td><?php echo $total_marks; ?></td>
                <td><?php echo $total_total; ?></td>
                <td style="color:red"><?php echo get_grade($total_total,$total_marks); ?></td>
        </tr>

        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
</div>
</div>
<input onclick="PrintDiv();" type="button" value="Print Sheet" class="btn btn-primary">
