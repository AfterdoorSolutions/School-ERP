<?php
		      //var_dump($query);
		      $i=1;
		      if($query!=NULL)
		      {
		      	foreach ($query as $data) 
		      {  
		      	if($data->photo==''){
		      		$photo='uploads/student/default.jpg';
		      	}
		      	else{
		      		$photo=$data->photo;
		      	}
			      	$data=array(        
					    $i,
					    $data->adm_number,
					    $data->first_name." ".$data->middle_name." ".$data->last_name,
					    $data->father_name,
					    date('d M Y',strtotime($data->timestamp)),
					    date('d M Y',strtotime($data->dob)),
					    $data->roll_no,
					    '<img src="'.base_url().$photo.'" width="100px">',
					    '<a href="'.admin_url().'student/tc/'.$data->student_admission_id.'"><i class="fa fa-sign-out"></i></a>',
			        	'<a href="'.admin_url().'student/student_update/'.$data->student_admission_id.'"><i class="fa fa-pencil"></i></a>
			        	 <a href="#"><i class="fa fa-trash-o"></i></a>'
			    	) ;
				    $students['data'][]=$data;
					$i++;
		       } 
		       }
	        else
	        {
	            $students="<tr><td colspan='5'> No Data Found</td></tr>";
	        }
	        		echo json_encode($students);
      		?>