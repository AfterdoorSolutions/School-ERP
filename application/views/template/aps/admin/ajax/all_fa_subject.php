<table class="table table-bordred">
	<thead>
		<td>Sno</td>
		<td>Subject</td>
		<!-- <td>Subject Exam</td>
		<td>Maximum Marks</td> -->
		<td>Add Marks</td>
		<td>Submit Marks</td>
	</thead>
	<tbody>
		<?php $i=1; foreach ($subject as $key => $value) {	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo ucfirst($value->subject_name); ?></td>
			<!-- <td><?php echo ucfirst($value->sub_name); ?></td>
			<td><?php echo $value->sub_marks; ?></td> -->
			<td><a href="#" class="btn btn-primary add_marks" data-subject-id="<?php echo $value->subject_id; ?>" data-exam-marking-id="<?php echo $value->exam_marking_id; ?>"><?php if($value->submit==0){echo "Add Marks";} else { echo "View Marks"; }?></a></td>
			<td><a href="#" class="btn btn-primary submit_marks" data-subject-id="<?php echo $value->subject_id; ?>" data-exam-marking-id="<?php echo $value->exam_marking_id; ?>"><?php if($value->submit==0){echo "Submit";} else { echo "Submitted"; }?></a></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
		