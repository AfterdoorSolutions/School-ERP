<?php //var_dump($student); ?>
<table class="table table-bordred">
	<thead>
		<td>Sno</td>
		<td>Student</td>
		<td>Admission No</td>
		<td>Roll No</td>
		<td>Subject</td>
		<td>Marks For</td>
		<td>Maximum Marks</td>
		<td>Got Marks</td>
		<td>Grade</td>
	</thead>
	<tbody>
		<?php $i=1; foreach ($student as $key => $value) {	
			
			foreach ($value->students as $key2 => $value2) {
			?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo ucfirst($value2['name']); ?></td>
			<td><?php echo $value2['adm_number']; ?></td>
			<td><?php echo $value2['roll_no']; ?></td>
			<td><?php echo $value->subject_id; ?></td>
			<td><?php echo $value->sub_name; ?></td>
			<td><?php echo $value->sub_marks; ?></td>
			<td><?php echo $value->marks[$key2]['marks']; ?></td>
			<td><?php echo get_grade($value->sub_marks,$value->marks[$key2]['marks'])?></td>
		</tr>
		<?php $i++; } } ?>
	</tbody>
</table>
