<?php	
	$data=array();
	foreach ($query as $key) 
	{
		$data[]=$key->$what;
	}
	echo json_encode($data);
?>