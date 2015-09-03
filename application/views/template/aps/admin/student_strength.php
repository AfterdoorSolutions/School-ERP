<?php
$total_class="";

?>


<div class="mainpanel">
	<div class="header">
        <h1 class="page-title">Student Strength</h1>
    </div>
     
<div class="contentpanel">
       <table class="table table-bordered">
        <tr>
          <th>Class</th>
          <?php foreach($category_list as $data2) {?>
            <th><?php echo $data2['name'];?></th>
          <?php } ?>
          <th>Total</th>
        </tr>
        <?php foreach($class_list as $data) {?>
        <tr>
          <td><?php echo $data->name;?></td>
        <?php foreach($category_list as $data2) {?>
                <td>
                <?php 
                 echo $cal_strength[$data2['student_category_id']][$data->class_id]['count(*)'];
                 $total_class=$total_class+$cal_strength[$data2['student_category_id']][$data->class_id]['count(*)'];?>
                </td>
          <?php } ?>
          <td><?php echo $total_class;?></td>
        </tr>
          <?php 
          $total_class="";
        }?>
        <tr>
          <th>Total</th>
          <?php foreach ($total_strength_category as $key => $value) {
            ?>
              <td><?php echo $value->total; ?></td>
            <?php
          } ?>
          <td><?php echo $total_student->total;?></td>
        </tr>
      </table>

       </div>
      </div>
    </div>
  </div>
</div>                       
