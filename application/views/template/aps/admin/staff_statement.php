<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-user"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-user"></i></a></li>
                    <li>Staff Salary Statement</li>
                </ul>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->	
					
 <div class="contentpanel">
    <div class="col-md-12 ">
<?php //var_dump($query);?>
<div class="row">
    
        <?php 
            $attributes = array('class' => 'form-horizontal', 'id' => 'fee_form');
            echo form_open('', $attributes);
        ?>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-6">Select month</label>
                <div class="col-md-6"><input type="text" autocomplete="off" class="datepicker_my form-control" name="month"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12"><input type="submit" class="btn btn-primary" name="submit" value="Generate"></div>
            </div>
        </div>
        <?php echo form_close(); ?>
    
</div>
<?php if(isset($generated_salary_slip)) { 
?>
<div id="generated_salary_slip">
<table class="table table-bordered">
<tr>
    <th>Sno</th>
    <th>Name of Employee</th>
    <th>Design.</th>
    <th>DOJ</th>
    <th>Pay</th>
    <?php foreach ($salary_element_add as $key => $value) {
        ?>
        <th><?php echo $value->name;?></th>
        <?php
    }
    ?>
    <?php foreach ($salary_element_sub as $key => $value) {
        ?>
        <th><?php echo $value->name;?></th>
        <?php
    }
    ?>
    <th>Total</th>
    <th>Account No</th>
    <th>Remarks</th>
    <th>Signature</th>
</tr>
<?php 
$i=1;
$total=array();
$t_basic_pay='';
$t_total='';
if($query!=NULL)
{

foreach($query as $value1){?>
<?php $content=$value1->content; $content=unserialize($content);    
?>
<tr>
    <td><?php echo $i++;?>    </td>
    <td><?php echo $value1->staff_detail->firstname." ".$value1->staff_detail->lastname; ?></td>
    <td><?php echo $value1->staff_detail->staff_category_id; ?></td>
    <td><?php echo $value1->staff_detail->time; ?></td>
    <td><?php echo $value1->basic_pay; $t_basic_pay=$t_basic_pay+$value1->basic_pay; ?></td>
    <?php foreach ($salary_element_add as $key => $value) {
        echo "<td>";
            foreach ($content['add'] as $key2 => $value2) {
         if($value->salary_element_id==$value2['salary_element'])
                    {
                        $element_id=$value2['salary_element'];

                        echo $value2['salary_value'];
                       if(isset($total[$element_id])){ $total[$element_id]= $total[$element_id]+$value2['salary_value']; } else { $total[$element_id] = $value2['salary_value'];} 
                    }
            }
            echo "</td>";
        }
    ?>
    <?php foreach ($salary_element_sub as $key => $value) {
         echo "<td>";
            foreach ($content['sub'] as $key2 => $value2) {
            if($value->salary_element_id==$value2['salary_element'])
                    {
                        $element_id=$value2['salary_element'];
                        echo $value2['salary_value'];
                       if(isset($total[$element_id])){ $total[$element_id]= $total[$element_id]+$value2['salary_value']; } else { $total[$element_id] = $value2['salary_value'];} 
                       
                    }
        
            }
             echo "</td>";
        }
    ?>
    <td><?php echo round($value1->total); $t_total=$t_total+round($value1->total); ?></td>
    <td><?php echo $value1->staff_detail->accno; ?></td>
    <td></td>
    <td></td>
</tr>
<?php } ?>
<tr>
    <td><b>Total</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b><?php echo $t_basic_pay; ?></b></td>
   <?php foreach ($total as $key => $value) {
       echo "<td><b>".$value."</b></td>";
   }
   ?>
    <td><b><?php echo $t_total ?></b></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<?php
} 
else
{
?>
<tr><td colspan="15">No data found</td></tr>
<?php
}
?>
</table>
</div>
<?php } 

?>
</div><!-- col-md-12 -->

</div><!-- contentpanel -->

                    
                       