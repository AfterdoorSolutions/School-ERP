<?php
class Setting_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
  

	
	public function index()
	{
		$data = array(
		'name' => $this->input->post('name'),
		'logo' => $this->input->post('logo'),	
        'student_time_period' => $this->input->post('student_time_period'),
        'staff_time_period'=> $this->input->post('staff_time_period'),
        'book_issue_no'=> $this->input->post('book_issue_no'),
         'tan'=> $this->input->post('tan'),
         'pan'=> $this->input->post('pan'),
         'address'=> $this->input->post('address'),
        
        );
        $this->db->where('setting_id', '1');
		$res=$this->db->update('settings', $data); 
		if($res)
        {
			$message='Successfully Update';
			return $message;
		}
	}

	public function get_setting($id)
	{
		$query = $this->db->query("select * from settings where setting_id='$id'");
        return $query->row();
	}
}
