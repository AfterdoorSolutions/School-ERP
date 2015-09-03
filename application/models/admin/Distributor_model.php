<?php
class Distributor_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$data = array(
        'name' => $this->input->post('name'),
        'address'=> $this->input->post('address'),
        'phone'=> $this->input->post('phone_no'),
        'email'=> $this->input->post('email'),
        'type'=> "distributor",
        'password'=> md5($this->input->post('password'))
        );
		$res=$this->db->insert('user_portal', $data); 
		if($res)
        {
			$message='Successfully Added';
			return $message;
		}
	}
	public function main($id="")
	{
		$data = array(
        'name' => $this->input->post('name'),
        'address'=> $this->input->post('address'),
        'phone'=> $this->input->post('phone_no'),
        'email'=> $this->input->post('email'),
        'type'=> "distributor",
        'password'=> md5($this->input->post('password'))
        );
        $this->db->where('user_portal_id', $id);
		$res=$this->db->update('user_portal', $data); 
		if($res)
        {
			$message='Successfully updated';
			return $message;
		}
	}
	public function get_details($id){
     $query = $this->db->get_where('user_portal',array('user_portal_id'=>$id));
     return $query->row_array();
	}

  public function delete($id)
  {
       
      $this->db->where('user_portal_id', $id);
      $this->db->where('type', 'distributor');
      $res=$this->db->delete('user_portal');
      if($res)
        {
			$message='Successfully Deleted';
			return $message; 

  }
}
  public function distributor()
	{
        $query = $this->db->query('select * from user_portal where type="distributor" ');
        return $query->result_array();
	}

}