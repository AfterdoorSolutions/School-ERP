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
<?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'staff_salary');
      echo form_open('', $attributes);
?>
            <div class="row">
            <div class="col-md-6">
              
                <div class="col-md-5">
                  <label class="">Select Month</label>
                </div>
                <div class="col-md-7">
                  <input type="text" name="month" class="form-control datepicker_my" >
                </div>
            </div><!-- col-md-6 -->

            <div class="col-md-3">
                <div class="col-md-5">
                </div>
                <div class="col-md-7">
                  <input type="submit" name="submit_search" class="btn btn-primary" value="Go">
                </div>
              </div>
            </div>
             <?php echo form_close();?>  

<?php
if(!isset($query->selectmonth))
{
?>    
<h4 class="text-center">Details of Salary: <?php echo $query[0]->month;?></h4>
<table class="table table-bordered">
<tr>
    <th>Sno</th>
    <th>Name</th>
    <th>Account No</th>
    <th>Net Amount</th>
    <th>Remarks</th>
</tr>
<?php 
$i=1;
$total="";
foreach($query as $value){?>
<tr>
    <td><?php echo $i++;?>    </td>
    <td><?php echo $value->staff_detail->firstname." ".$value->staff_detail->lastname; ?></td>
    <td><?php echo $value->staff_detail->accno; ?></td>
    <td><?php echo round($value->total); $total=$total+round($value->total);?></td>
    <td>&nbsp;</td>
</tr>
<?php } ?>
<tr>
    <th colspan="3" class="text-right">Total</th>
    <th><?php echo $total;?></th>
    <th></th>
</tr>
</table>
<?php
}
?>
</div><!-- col-md-12 -->

</div><!-- contentpanel -->

                    
                       