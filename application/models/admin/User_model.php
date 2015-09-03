<?php
class User_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function main()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'profile_for' => $this->input->post('profile_for'),
        'dob' => $this->input->post('dob'),
        'gender' => $this->input->post('gender'),
        'height' => $this->input->post('height'),
        'country_id' => $this->input->post('country_id'),
        'city_id' => $this->input->post('city_id'),
        'marital' => $this->input->post('marital'),
        'mtongue' => $this->input->post('mtongue'),
        'religion_id' => $this->input->post('religion_id'),
        'caste_id' => $this->input->post('caste_id'),
        'mob_prefix' => $this->input->post('mob_prefix'),
        'mob_num' => $this->input->post('mob_num'),
        'mob_shown_to' => $this->input->post('mob_shown_to'),
        'landline_prefix' => $this->input->post('landline_prefix'),
        'landline_num' => $this->input->post('landline_num'),
        'landline_shown_to' => $this->input->post('landline_shown_to'),
		);
		$res=$this->db->insert('user', $data); 
		if($res)
        {
			$message='Successfully Added';
			return $message;
		}
	}

    public function user()
	{
         
       $query = $this->db->query('select * from user ');
       return $query->result_array();
       $data='';
       foreach ($query->result() as $key=>$value) 
       {
			$data[] = $value;
        	$query=$this->db->query("select * from user_image where user_id='$value->user_id'order by user_image_id desc limit 1 ");
        	$query=$query->row();
        	$data[$key]->image=$query->image;
       }
       return $data;
	}

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $res=$this->db->delete('user');
        if($res)
        {
            $message='Successfully Deleted';
            return $message;
        }
    }

    public function view($id)
    {
        $this->db->where('user_id' , $id);
        $res = $this->db->get('user');
        return $res->result_array();

    }
    
}