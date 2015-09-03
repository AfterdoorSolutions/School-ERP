<?php
class Test extends MY_Controller{

	public function __construct()
	{
		parent::__construct();

		if($this->is_admin_logged_in()==false)
		{
			redirect('admin/login ');
		}
		ini_set('max_execution_time', 3000001111);
	}
	
	public function index(){
		 echo $file = base_url()."uploads/libbk.csv";
		 $handle = fopen($file, "r");
		 $c = 0;
		 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		 {
		 	/*$data = array(
		 		'class_id' =>$filesop[1] , 
		 		'section_id' => $filesop[2], 
		 		'batch_id' => '1', 
		 		'name' => $filesop[4], 
		 		'first_name' => $filesop[4], 
		 		'adm_number' => $filesop[5], 
		 		'roll_no' => $filesop[6], 
		 		'email' => $filesop[7], 
		 		'dob' => date('Y-m-d',strtotime($filesop[8])), 
		 		'mobile' => $filesop[9], 
		 		'father_name' => $filesop[10], 
		 		'mother_name' => $filesop[11], 
		 		'gender' => $filesop[12], 
		 		'house' => $filesop[13], 
		 		'father_phone' => $filesop[14], 
		 		'biometric_id' => $filesop[15], 
		 		'mother_phone' => $filesop[16], 
		 		'status' => $filesop[18], 
		 		'father_email' => $filesop[26], 
		 		);*/
				$accession_no=$filesop[1];
				if(strpos($accession_no, '/G')!==false)
				{ 
					$gifted='yes'; 
				}
				else
				{
					$gifted='no';
				}
				$accession_no=trim($accession_no,'/G');
				$data=array(
					'accession_no' =>$accession_no ,
					'title'=> $filesop[2],
					'author'=> $filesop[4],
					'language'=> $filesop[7],
					'subject'=> $filesop[6],
					'pub_yr'=> $filesop[11],
					'publisher'=> $filesop[8],
					'edition'=> $filesop[10],
					'pages'=> $filesop[12],
					'mrp'=> $filesop[13],
					'invoice_no'=> $filesop[15],
					'location'=> $filesop[16],
					'purchase_date'=> $filesop[14],
					'gifted'=> $gifted,
					'status'=> 'active',
					);

		 
		 $sql = $this->db->insert("book",$data);
		 }
		 
		 if($sql){
		 echo "You database has imported successfully";
		 }else{
		 echo "Sorry! There is some problem.";
		 }

	}
}
?>