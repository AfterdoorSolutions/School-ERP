<?php
      $attributes = array('class' => 'form-horizontal', 'id' => 'marks');
      echo form_open_multipart(admin_url().'fa/add_all_marks', $attributes);
    ?>
<p class="main_btn"><b>Subject: </b><?php echo $subject->name; ?>
	&nbsp; <a data-subject-id="<?php echo $subject->subject_id; ?>" class="btn btn-primary add_marks" href="#">Reload</a>
	&nbsp; <?php echo form_submit('student_marks', 'Save','class="btn btn-primary"');?>
</p>
<input type="hidden" value="<?php echo $subject->subject_id; ?>" name="subject_id2">
<input type="hidden" value="<?php echo $subject->class_id; ?>" name="class_id2">
<input type="hidden" value="<?php echo $subject->batch_id; ?>" name="batch_id2">
<input type="hidden" value="<?php echo $subject->section_id; ?>" name="section_id2">
<input type="hidden" value="<?php echo $exam_type_id; ?>" name="exam_type_id">
<table class="table table-bordred">
	<thead>
		<td style="width:40px;">Sno</td>
		<td>Admission No</td>
		<td>Student</td>
		<?php 
		$subject_max_marks='';
		$max_marks='0';
foreach ($subject_distribution as $key => $value) {
	$max_marks=$max_marks+$value->sub_marks;
	echo "<td>".$value->sub_name."(MM.:".$value->sub_marks.")"."</td>";
	$subject_max_marks=$subject_max_marks+$value->sub_marks;
}
?>
		<td>Total Marks(MM.:<?php echo $subject_max_marks;?>)</td>
		<td>Out of 10</td>
	</thead>
	<tbody>
		<?php $i=1; foreach ($student as $key => $value) {	?>
		<tr>
			<td style="width:40px;"><?php echo $i; ?></td>
			<td><?php echo $value->adm_number; ?></td>
			<td><?php echo ucfirst($value->name); ?></td>
			<?php 
			$total='';
			$out_of_10='';
foreach ($value->marks as $key2 => $value2) {
	$total=$value2+$total;
	?>
	<td>
		<div class="input-group">
			<?php //var_dump($value->exam_marking_id); ?>
			<input type="hidden" name="exam_marking_id[]" value="<?php echo $value->exam_marking_id[$key2]; ?>" >	
			<input type="hidden" name="student_id[]" value="<?php echo $value->student_admission_id; ?>" >	
			<input name="marks[]" id="marks_<?php echo $value->student_admission_id; ?>" data-id='<?php echo $value->student_admission_id; ?>' class="form-control cal_grade marks_<?php echo $value->student_admission_id; ?>" type="text" data-maxmarks="<?php echo $value->sub_marks[$key2]; ?>" value="<?php echo $value2; ?>" >
			<span class="input-group-addon"><?php if($value->marks[$key2]!='') {echo get_grade($value->sub_marks[$key2],$value->marks[$key2]);} else {echo "-";} ?></span>
		<?php $out_of_10=$out_of_10 + ($value2*$value->sub_dist[$key2])/$value->sub_marks[$key2]; ?>
		</div>
	</td>
<?php }
?>
			<td>
				<div class="input-group">
					<input type="hidden" name="student_id2[]" value="<?php echo $value->student_admission_id; ?>" >	
					<input name="total[]" class="form-control cal_grade" type="text" data-maxmarks="<?php echo $max_marks; ?>" readonly value="<?php echo $total; ?>" >
					<span class="input-group-addon"><?php echo get_grade($max_marks, $total); ?></span>
				</div>
			</td>
			<td>
				<div class="input-group">
					<input  class="form-control cal_grade" type="text" data-maxmarks="10" readonly value="<?php echo $out_of_10/10; ?>" >
					<span class="input-group-addon"><?php echo get_grade(10, $out_of_10/10); ?></span>
				</div>
			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>


    <?php echo form_close();?>